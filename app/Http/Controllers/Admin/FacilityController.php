<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FacilityController extends Controller
{
    public function index(Facility $facility, Request $request)
    {  
        if ($request->ajax()) {
            $data = $facility->getFacility();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $editLink = route('facility.edit',$row->id);
                        $deleteLink = route('facility.delete',$row->id);
                        return listModalButton($editLink, $deleteLink);
                    })
                    ->addColumn('created_by', function($facility){ 
                        return $facility->createdBy->name;
                    })
                    ->addColumn('updated_by', function($facility){ 
                        return $facility->updatedBy->name ?? '';
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
        return view('admin.system.facility.index');
    }

    public function store(Facility $facility, Request $request)
    {
        $facility->storeFacility($request);

        return $this->success('facility.index','Facility created successfully');
    }

    public function edit(Facility $facility)
    {
        return view('admin.system.facility.modal._edit',compact('facility'))->render();
    }

    public function update(Facility $facility, Request $request)
    {
       $facility->updateFacility($facility,$request);

       return $this->success('facility.index','Facility updated successfully');
    }

    public function delete(Facility $facility)
    {
        $facility->delete();

        return $this->success('facility.index','Facility deleted successfully');
    }
}
