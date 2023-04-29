<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    
    protected $table = 'facilties';

    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by'
    ];
    
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function getFacility() : Builder
    {
        return $this::with([
            'createdBy:id,name',
            'updatedBy:id,name'
        ]);
    }

    public function storeFacility($request) : Facility
    {
        $this->name = $request->name;
        $this->status = $request->status ? $request->status : 0;
        $this->created_by = auth()->id();
        $this->save();

        return $this;
    }

    public function updateFacility($facility, $request) : Facility
    {
        $facility->update([
            'name' => $request->name,
            'status' => $request->status ? $request->status : 0,
            'updated_by' => auth()->id()
        ]);

        return $this;
    }
}
