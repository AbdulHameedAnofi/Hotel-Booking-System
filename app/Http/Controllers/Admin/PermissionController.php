<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdatePermissionRequest as UpdateRequest;

class PermissionController extends Controller
{   
    /**
     * Showing Permission List
     * 
     * @param Illuminate\Http\Request
     * @return Illuminate\Support\Facades\View
     */
    public function index(Permission $permission, Request $request)
    {   
        if ($request->ajax()) {
            $data = $permission->getPermission();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $editLink = route('permission.edit',$row->id);
                        $deleteLink = route('permission.delete',$row->id);
                    return listModalButton($editLink, $deleteLink);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.settings.permission.index');
    }
    
    /**
     * Store Permission
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function store(Permission $permission, PermissionRequest $request)
    {
        $permission->savePermission($request);

        return $this->success('permission',trans('sentence.permission_created'));
    }
    
    /**
     * Edit Permission
     * 
     * @param Permission 
     * @return response Illuminate\Support\Facades\View
     */
    public function edit(Permission $permission)
    {   
        return view('admin.settings.permission.modal._edit',compact('permission'))->render();
    }
    
    /**
     * Update Permission
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function update(Permission $permission, UpdateRequest $request)
    {  
        $permission->updatePerssion($permission, $request);

        return $this->success('permission',trans('sentence.permission_updated'));
    }
   
    /**
     * Delete Permission
     * 
     * @param Permission
     * @return redirect response
     */
    public function delete(Permission $permission)
    {
        $permission->delete();

        return $this->success('permission',trans('sentence.permission_deleted'));
    }
}
