<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{   
    /**
     * User activity log
     * @param Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $data =  userActivityLog();
        
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($data) {
                    return $data->user->name ?? '';
                })
                ->make(true);
        }

       return view('admin.activity.log');
    }
}
