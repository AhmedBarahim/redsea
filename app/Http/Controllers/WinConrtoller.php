<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;

class WinConrtoller extends Controller
{
    public function index() {
        $prize = Prize::inRandomOrder()->where('redeemed',false)->first();
        if(empty($prize)) {
            $prize = null;
        }
        else {
            $prize->redeemed = true;
            $prize->save();
        }

        return view('win',['prize' => $prize]);
    }
}
