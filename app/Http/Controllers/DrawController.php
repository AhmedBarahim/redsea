<?php

namespace App\Http\Controllers;

use App\Models\Drawer;
use App\Models\Store;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function index() {
        return view('enter-draw', ['stores' => Store::all()]);
    }

    public function enterDraw(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required | string',
            'phone_number' => 'required | numeric | digits:9' ,
            'store_id' => 'required | numeric' ,
            'bill_no' => 'required | numeric' ,
            'bill_price' => 'required | numeric | gte:10000' ,
            'bill_img' => 'required | image',
        ]);
        $query = Drawer::where('store_id',$request->store_id)->where('bill_no',$request->bill_no)->count();
        // dd($query);
        if($query > 0) {
            session()->flash('status', 'لا يمكنك دخول السحب لتكرار البيانات');
            return redirect()->route('enter-draw');
        }
        else {
            $store_name = Store::findOrFail($request->store_id)->value('name');
            if ($request->hasFile('bill_img')) {
                // $path = $request->file('bill_img')->store('/uploads/invoices');
                $path = $request->file('bill_img')->storeAs('/public/invoices',$request->name . '_' . $store_name . '_' . $request->bill_no . '.' . $request->file('bill_img')->extension());
            }
            Drawer::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'store_id' => $request->store_id,
                'bill_no' => $request->bill_no,
                'bill_price' => $request->bill_price,
                'bill_img' => $path,
            ]);
            session()->flash('status', 'تم دخولك على السحب بنجاح');
            return redirect()->route('complete');
        }

    }

    public function compeleteRegisteration() {
        return view('complete');
    }

    public function showDrawers() {
        return view('drawers', ['drawers' => Drawer::where('winner',false)->where('active',true)->get()]);
    }

    public function showPickWinner() {
        $noOfDrawers = Drawer::where('winner',false)->where('active',true)->count();
        return view('pick-winner',['noOfDrawers' => $noOfDrawers]);
    }

    public function postPickWinner() {
        $winner = Drawer::inRandomOrder()->where('winner', false)->where('active',true)->first();
        if(!isset($winner)) {
            session()->flash('status', 'لا يوجد مشاركون بالسحب');
            return redirect()->route('showPickWinner');
        }
        else {
        $winner->winner = true;
        $winner->save();
        session()->flash('win', $winner);
        return view('pick-winner',['winner' => $winner]);

        }
    }
    public function acceptPickWinner() {
        session()->forget('win');
        return redirect()->route('showPickWinner');
    }
    public function rejectPickWinner(Request $requset) {
        $fakeWinner = Drawer::findOrFail($requset->id);
        $fakeWinner->winner = false;
        $fakeWinner->active = false;
        $fakeWinner->save();
        session()->flash('status', 'تم رفض الفائز');
        return redirect()->route('showPickWinner');
    }

    public function showWinners() {
        return view('winning-drawers', ['winners' => Drawer::where('winner',true)->where('active',true)->get()]);
    }
}
