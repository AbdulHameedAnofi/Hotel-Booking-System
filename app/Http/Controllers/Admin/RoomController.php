<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    public function index(Room $room, Request $request)
    {   
        if ($request->ajax()) {
            $data = $room->getRoom();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $editLink = route('room.edit',$row->id);
                        $deleteLink = route('room.delete',$row->id);
                        return listModalButton($editLink, $deleteLink);
                    })
                    ->addColumn('facility', function($room){ 
                        return implode(",",$room->facilities->pluck('name')->toArray());
                    })
                    ->addColumn('type', function($room){ 
                        return $room->type->name;
                    })
                    ->addColumn('created_by', function($room){ 
                        return $room->createdBy->name;
                    })
                    ->addColumn('updated_by', function($room){ 
                        return $room->updatedBy->name ?? '';
                    })
                    ->editColumn('created_at', function($facility){ 
                        return Carbon::parse($facility->created_at)->toDayDateTimeString();
                    })
                    ->editColumn('status', function($facility){ 
                        if($facility->status == 1){
                            return "<span class='badge bg-label-success'>Active</span>";
                        }
                        if($facility->status == 0){
                            return "<span class='badge bg-label-warning'>Inactive</span>";
                        }
                    })
                    ->escapeColumns('status')
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.system.room.index');
    }

    public function store(Room $room, Request $request)
    {   
        $room->storeRoom($request);

        return $this->success('room.index','Room created successfully');
    }

    public function edit(Room $room)
    {   
        return view('admin.system.room.modal._edit',compact('room'))->render();
    }

    public function update(Room $room, Request $request)
    {
       $room->updateRoom($room,$request);

       return $this->success('room.index','Room updated successfully');
    }

    public function delete(Room $room)
    {
        $room->delete();

        return $this->success('room.index','Room deleted successfully');
    }
}
