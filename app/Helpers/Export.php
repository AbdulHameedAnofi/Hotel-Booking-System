<?php 

namespace App\Helpers;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;
use ZipArchive;

class Export
{
    protected Builder $query;
    protected array $data;
    protected string $zipFileName;
    protected string $fileName;
    public int $chunkSize;
    protected Filesystem $storage;
    protected string $processId;
    protected int $oldFilesDueDays = 1;
    public array $headers;
    protected mixed $file;

    public function __construct()
    {
        $this->processId = Str::uuid()->toString();
    }

    public function exportFromQuery(?Builder $query = null): StreamedResponse
    {
        $this->query = $query;
        throw_if(!$this->query, new \Exception('Query has not been set.'));
        throw_if(empty($this->headers), new \Exception('Headers cannot be empty.'));

        $this->setDefaults();

        $this->openFile();

        $this->query->chunk($this->chunkSize, fn ($records) => $this->putToCSV($records));

        return $this->compressFilesAndGetDownloadStream();
    }

    public function exportFromArray(?array $data = []): StreamedResponse
    {
        $this->data = $data;
        throw_if(empty($this->data), new \Exception('Data cannot be empty.'));
        throw_if(empty($this->headers), new \Exception('Headers cannot be empty.'));

        $this->setDefaults();

        $this->openFile();
      
        $this->putToCSV($this->data);

        return $this->compressFilesAndGetDownloadStream();
    }

    protected function putToCSV($iterableData)
    {
        foreach ($iterableData as $row) {
            $toArray = json_decode(json_encode($row), true);
            $res     = [];
            foreach ($this->headers as $key => $value) {
                $res[$key] = data_get($toArray, $value);
            }
            $res = array_filter($res, fn ($item) => !is_array($item));
            
            fputcsv($this->file, $res);
        }
    }

    protected function compressFilesAndGetDownloadStream()
    {
        fclose($this->file);
        $this->deleteOldZipFiles();

        $zip = new ZipArchive();
        $zip->open($this->storage->path($this->zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);
        foreach ($this->storage->allFiles($this->processId) as $filePath) {
            if (strpos('.zip', $filePath)) continue;
            $zip->addFile($this->storage->path($filePath), substr($filePath, strlen($this->processId) + 1));
        }
        $zip->close();

        // Delete processId dir with all of its files
        $this->storage->deleteDirectory($this->processId);

        return $this->storage->download($this->zipFileName);
    }

    protected function deleteOldZipFiles()
    {
        // Delete old files that longer than x day
        // For not deleting old files, -1 can be set to $oldFilesDueDays
        if ($this->oldFilesDueDays === -1) return;

        foreach ($this->storage->allFiles() as $old_file) {
            $fileCreatedAtDaysDiff = Carbon::now()->diffInDays(Carbon::parse($this->storage->lastModified($old_file)));
            if ($fileCreatedAtDaysDiff > abs($this->oldFilesDueDays)) {
                $this->storage->delete($old_file);
            }
        }
    }

    protected function setDefaults()
    {
        $this->zipFileName = time() . '.zip';
        $this->fileName = time() . '.csv';
        $this->chunkSize = 500;
        $this->storage = $this->storage ?? app('filesystem')->disk(config('filesystems.default'));
    }

    protected function openFile()
    {
        $this->storage->makeDirectory($this->processId);
        $this->file = fopen($this->storage->path("$this->processId/$this->fileName"), 'a+');
        fputcsv($this->file, $this->headers);
        return $this->file;
    }

    public function setQuery(Builder $query)
    {
        $this->query = $query;
        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function setChunkSize(int $chunkSize)
    {
        $this->chunkSize = $chunkSize;
        return $this;
    }

    public function setOldFilesDueDays(int $oldFilesDueDays)
    {
        $this->oldFilesDueDays = $oldFilesDueDays;
        return $this;
    }
}