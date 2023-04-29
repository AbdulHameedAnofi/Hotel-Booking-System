<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Yajra\DataTables\Facades\DataTables;

class TypeController extends Controller
{
    /**
     * Showing user list
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index(RoomType $type, Request $request)
    {   
        if ($request->ajax()) {
            $data = $type->roomRoomTypeList();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $editLink = route('type.edit',$row->id);
                        $deleteLink = route('type.delete',$row->id);
                    return listModalButton($editLink, $deleteLink);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.system.room_type.index');
    }
    
    public function store(RoomType $type, Request $request)
    {
        $type->storeRoomType($request);
        
        return $this->success('type.index','Room type created successfully!');
    }

    public function edit(RoomType $roomType)
    {   
        return view('admin.system.room_type.modal._edit',compact('roomType'))->render();
    }
   
    public function update(RoomType $roomType, Request $request)
    {   
        $roomType->updateRoomType($roomType, $request);

        return $this->success('type.index','Room type updated successfully!');
    }

    public function delete(RoomType $roomType)
    {
        $roomType->delete();

        return $this->success('type.index','Room type deleted successfully!');
    }
}
