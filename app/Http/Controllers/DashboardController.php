<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Prize;
use App\Models\PrizeType;
use App\Models\Winner;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $customers_count = Customer::count();
        $winners_count = Winner::join('prizes','prizes.id','=','prize_id')->where('prize_type_status',true)->distinct('customer_id')->count('customer_id');
        $prize_types_count = PrizeType::count();
        $prizes_count = Winner::join('prizes','prizes.id','=','prize_id')->where('prize_type_status',true)->count();
        $all_prizes = Prize::count();
        $all_prizes_taken = Prize::where('redeemed',true)->count();
        $prizes = PrizeType::all();
        $prizes_details =Prize::select('prize_type_id', DB::raw('COUNT(*) as total , sum(case when redeemed = true then 1 else 0 end) AS totals'))->groupBy('prize_type_id')->get();
        $prizes_delivered =  Winner::join('prizes','prizes.id','=','prize_id')->where('prize_type_status',true)->where('delivered',false)->count();
        return view('dashboard.home', [
            'customers_count' => $customers_count,
            'winners_count' => $winners_count,
            'prize_types_count' => $prize_types_count,
            'prizes_count' => $prizes_count,
            'all_prizes' => $all_prizes,
            'all_prizes_taken' => $all_prizes_taken,
            'prizes' => $prizes,
            'prizes_details' => $prizes_details,
            'prizes_delivered' => $prizes_delivered
        ]);
    }
}
