<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    public function index()
    {
        return view('registeration');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | regex:/^[\pL\s\-]+$/u',
            'phone_number' => 'required | digits:9 | numeric | unique:App\Models\Customer,phone_number'
        ]);
        $ip =  $_SERVER['REMOTE_ADDR'];
        $mac_address = trim(shell_exec("arp -n " . $ip . "| cut -f 4 -d ' ' "));
        $customer = Customer::where('mac_address', $mac_address)->first();
        if (isset($customer)) {
            return back()->withErrors(["error" => "لا يمكنك التسجيل بنفس الجهاز"]);
        }
        $new_customer = Customer::create(['name' => $request->name, 'phone_number' => $request->phone_number, 'mac_address' => $mac_address]);
        session(['id' => $new_customer->id]);
        return redirect()->route('win');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required | numeric '
        ]);
        $customer = Customer::where('phone_number', $request->phone_number)->first();
        $ip =  $_SERVER['REMOTE_ADDR'];
        $mac_address = trim(shell_exec("arp -n " . $ip . "| cut -f 4 -d ' ' "));
        if (isset($customer)) {
            if ($customer->mac_address != $mac_address) {
                return back()->withErrors(["error" => "لا يمكنك الدخول بهذا الرقم على هذا الجوال"]);
            } else {
                session(['id' => $customer->id]);
                return redirect()->route('win');
            }
        } else {
            return back()->withErrors(["error" => "هذا الرقم ليس مسجل بعد .. قم بالتسجيل لأول مرة"]);
        }
    }
}
