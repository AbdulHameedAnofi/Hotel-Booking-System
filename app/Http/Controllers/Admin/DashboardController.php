<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;

class DashboardController extends Controller
{   
    /**
     * View Dashboard
     * 
     * @return Illuminate\Support\Facades\View
     */
    public function index()
    {   
        $payment = Invoice::selectRaw(
                            'year(created_at) as year, 
                            monthname(created_at) as month, 
                            sum(total_price) as total'
                        )
                        ->groupBy('year','month')
                        ->orderByRaw('min(created_at) desc')
                        ->get();

        return view('admin.dashboard',compact('payment'));
    }
}
