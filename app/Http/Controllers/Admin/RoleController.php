<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{   
    /**
     * Showing Role List
     * 
     * @param Illuminate\Http\Request
     * @return Illuminate\Support\Facades\View
     */
    public function index(Role $role, Request $request)
    {  
        if ($request->ajax()) {
            $data = $role->getRole();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editLink = route('role.edit',$row->id);
                    $deleteLink = route('role.delete',$row->id);
                    return listButton($editLink, $deleteLink);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('admin.settings.role.index');
    }
    
    /**
     * Create Role
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function create(Permission $permission)
    {
        $permissions = $permission->getPermission();

        return view('admin.settings.role.create',[
            'permissions' => $permissions
        ]);
    }
    
    /**
     * Store Role
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function store(Role $role, StoreRoleRequest $request)
    {   
        $role->saveRole($request);

        return $this->success('role',trans('sentence.role_created'));
    }
    
    /**
     * Edit Role
     * @return response Illuminate\Support\Facades\View
     */
    public function edit(Role $role, Permission $permission)
    {   
      $permissions  = $permission->getPermission();
      $userRolePermissions = userRolePermissions($role->id);

      $role_permission       = [];

      foreach($userRolePermissions as $r) {
         $role_permission[$r->permission_id] = 1;
      }

      return view('admin.settings.role.edit',[
        'permissions' => $permissions,
        'role' => $role, 
        'role_permission' => $role_permission
      ]);
    }
    
    /**
     * Update Role
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function update(Role $role, EditRoleRequest $request)
    {
        $role->updateRole($role, $request);

        return $this->success('role',trans('sentence.role_updated'));
    }
    
    /**
     * Delete Role
     * 
     * @param Role
     * @return redirect response
     */
    public function delete(Role $role)
    {
        $role->delete();

        return $this->success('role',trans('sentence.role_deleted'));
    }
}
