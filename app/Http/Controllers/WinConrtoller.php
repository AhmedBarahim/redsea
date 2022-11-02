<?php

namespace App\Http\Controllers;

use App\Events\NewWinner;
use App\Helpers\MacAddress as HelpersMacAddress;
use App\Models\Customer;
use App\Models\Prize;
use App\Models\Winner;

use DateTime;
use MacAddress;

class WinConrtoller extends Controller
{
    public function index()
    {
        $mac_address = MacAddress::get();
        $customer = Customer::where('mac_address', $mac_address)->first();
        if(!isset($customer)) {
            return redirect()->route('registeration');
        }
        $date = $customer->last_time_scanned ?? '1997-01-23 00:00:00';
        $date = new DateTime($date);
        $date_after = date_add($date, date_interval_create_from_date_string('10 seconds'));
        $date_now = new DateTime(date("Y-m-d H:i:s"));
        $interval = date_diff($date_after, $date_now);
        $can_scan = $interval->format('%R');
        $time_remaining = $interval->format('%H ساعة %i دقيقة %s ثانية');
        if ($can_scan == '-') {
            return view('win', ['time_remaining' => $time_remaining]);
        } else if ($can_scan == '+') {

            $prize = Prize::inRandomOrder()->where('redeemed', false)->first();
            if (empty($prize)) {
                $prize = null;
            } else {
                $customer->last_time_scanned = date("Y-m-d H:i:s");
                $customer->no_of_scans++;
                $customer->save();
                $prize->redeemed = true;
                $prize->redeemed_at = $date_now;
                $prize->save();
                $winner = new Winner();
                $winner->customer_id = $customer->id;
                $winner->prize_id = $prize->id;
                $winner->save();
                // if($winner->prize->prize_type_status) {
                //     event(new NewWinner('Someone'));
                // }


            }
            return view('win', ['prize' => $prize]);
        }
    }
}
