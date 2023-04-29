<?php

namespace App\Models;

use App\Helpers\Imageable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, Imageable;
    
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class,'room_facilities');
    }

    public function type()
    {
        return $this->belongsTo(RoomType::class,'room_type_id');
    }

    public function getRoom()
    {
        return $this::with([
            'createdBy:id,name',
            'updatedBy:id,name',
            'facilities:id,name'
        ]);
    }
    
    public function getAllRoom() : Collection
    {
        return $this::with('facilities:id,name','type:id,name')->get();
    }

    public function storeRoom($request) : Room
    {   
        $this->room_type_id = $request->room_type_id;
        $this->number = $request->number;
        $this->price = $request->price;
        $this->capacity = $request->capacity;
        $this->status = $request->status ? $request->status : 0;
        $this->created_by = auth()->id();
        $this->save();

        if($request->has('facility_id')){
            $this->facilities()->sync($request->facility_id);
        }

        if($request->has('image')){
            $this->saveImage($request);
        }

        return $this;
    }

    public function updateRoom($room, $request) : Room
    {
        $room->update([
            'room_type_id' => $request->room_type_id,
            'number' => $request->number,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'status' => $request->status ? $request->status : 0,
            'updated_by' => auth()->id()
        ]);

        if($request->has('facility_id')){
            $this->facilities()->sync($request->facility_id);
        }

        if($request->has('image')){
            $this->saveImage($request);
        }

        return $this;
    }

    public function allRoomWithSpecificType($roomTypeId)
    {
        return $this::with('type')->where('room_type_id',$roomTypeId)->get();
    }
}
