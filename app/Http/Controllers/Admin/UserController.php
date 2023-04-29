<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreUserRequest as CreateUser;
use App\Http\Requests\UpdateUserRequest as UpdateUser;

class UserController extends Controller
{   
    /**
     * Showing user list
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index(User $user, Request $request)
    {   
        if ($request->ajax()) {
            $data = $user->userList();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $editLink = route('user.edit',$row->id);
                        $deleteLink = route('user.delete',$row->id);
                        $showLink = route('user.activity',$row->id);
                    return getButtonForEdiDeleteShowModal($editLink, $deleteLink, $showLink);
                    })
                    ->editColumn('created_at', function($user){ 
                        return Carbon::parse($user->created_at)->toDayDateTimeString();
                    })
                    ->editColumn('status', function($data){ 
                        if($data->status == 1){
                            return "<span class='badge bg-label-success'>Active</span>";
                        }
                        if($data->status == 2){
                            return "<span class='badge bg-label-warning'>Inactive</span>";
                        }
                        if($data->status == 3){
                            return "<span class='badge bg-label-secondary'>Pending</span>";
                        }
                    })
                    ->editColumn('name', function($user){ 
                        return '<span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span>'.$user->name.'</span>';
                    })
                    ->escapeColumns('status','name')
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.user.index');
    }
    
    /**
     * Store User
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function store(User $user, CreateUser $request)
    {
        $user->storeUser($request);
        
        return $this->success('user',trans('sentence.user_created_message'));
    }

    /**
     * Edit User
     */
    public function edit(User $user)
    {   
        $allRoles = Role::all();
        $user_role_data = DB::table('role_user')
                ->where('user_id',$user->id)
                ->get();
        $user_role = [];

        foreach($user_role_data as $r){
            $user_role[$r->role_id] = 1;
        }

        return view('admin.user.modal._edit',compact('user','user_role','allRoles'))->render();
    }
   
    /**
     * Update User
     * 
     * @param Illuminate\Http\Request
     * @return redirect response
     */
    public function update(User $user, UpdateUser $request)
    {   
        $user->updateUser($user, $request);

        return $this->success('user',trans('sentence.user_updated'));
    }

    /**
     * Delete User
     */
    public function delete(User $user)
    {   
        $user->delete();

        return $this->success('user',trans('sentence.user_deleted'));
    }

    /**
     * User wise activity
     */
    public function activity(User $user)
    {   
        $user = $user->load('activity');

        return view('admin.user.modal._user_activity',compact('user'))->render();
    }

}
