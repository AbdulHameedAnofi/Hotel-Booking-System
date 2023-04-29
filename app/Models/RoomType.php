<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function roomRoomTypeList() : Builder
    {
        return $this::query();
    }

    public function storeRoomType($request) : RoomType
    {
        $this->name = $request->name;
        $this->save();

        return $this;
    }

    public function updateRoomType($roomType, $request) : RoomType
    {
        $roomType->update([
            'name' => $request->name,
        ]);

        return $this;
    }
}
