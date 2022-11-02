<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Browser;
use MacAddress;

class RegisterationController extends Controller
{
    public function index()
    {
        $platform_name = Browser::platformFamily();
        $device_family = Browser::deviceFamily();
        $device_model = Browser::deviceModel();
        return view('registeration',['platform_name' => $platform_name,
        'device_family' => $device_family,
        'device_model' => $device_model
    ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | regex:/^[\pL\s\-]+$/u',
            'phone_number' => 'required | digits:9 | numeric | unique:App\Models\Customer,phone_number'
        ]);
        $mac_address = MacAddress::get();
        $customer = Customer::where('mac_address', $mac_address)->first();
        if (isset($customer)) {
            return back()->withErrors(["error" => "لا يمكنك التسجيل بنفس الجهاز"]);
        }
        // dd($request->all());
        $new_customer = Customer::create(['name' => $request->name, 'phone_number' => $request->phone_number, 'mac_address' => $mac_address, 'platform_name' => $request->platform_name,
        'device_family' => $request->device_family, 'device_model' => $request->device_model]);
        // dd($new_customer);
        session(['id' => $new_customer->id]);
        return redirect()->route('win');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required | numeric '
        ]);
        $customer = Customer::where('phone_number', $request->phone_number)->first();
        $mac_address = MacAddress::get();
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
