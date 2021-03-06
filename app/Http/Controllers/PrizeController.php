<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\PrizeType;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prizes.index', ['prizes' => Prize::all()->sortBy('prize_type_id')->sortBy('redeemed'), 'prizeTypes' => PrizeType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prizes.create', ['prizeTypes' =>  PrizeType::where('active',true)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prize_type_id' => 'numeric | required',
            'no_of_prizes' => 'numeric'
        ]);
        $no_of_prizes = (int) $request->input('no_of_prizes');
        $prize_type_status = PrizeType::where('id',$request->input('prize_type_id'))->value('status');
        // if($prize_type_status == '1') {
        //     $prize_type_status = true;
        // }
        // else if($prize_type_status == '0') {
        //     $prize_type_status = false;
        // }
        for ($i = 0; $i < $no_of_prizes; $i++) {
            // $data[] = [
            //     'prize_types_id' => $request->input('prize_type_id'),
            // ];
            //    dd($request->all());
            $prize = new Prize();
            $prize->prize_no = $this->generatePrizesNumber();
            $prize->prize_type_id = $request->input('prize_type_id');
            $prize->prize_type_status = $prize_type_status;
            $prize->save();
        }
        //    Prizes::insert($data);
        $request->session()->flash('status', 'لقد تم إضافة الجوائز');
        return redirect()->route('prizes.index');
    }
    function generatePrizesNumber() {
        $is_unique = false;
    $num = false;
    $times_run = 0;
    while (!$is_unique)
    {
        if($times_run > 100)
        {
            echo "تم الانتهاء من إنتاج الارقام العشوائية";
            die();
        }
        $num = mt_rand(10000, 99999);
        if(!$this->prizeNumberExists($num)) {
            $is_unique = true;
        }
        $times_run++;
    }
    return $num;
        // $num= mt_rand(1, 9);
        // $i = 0;

        // // call the same function if the id exists already
        // if ($this->prizeNumberExists($num)) {
        //     return $this->generatePrizesNumber();
        // }

        // // otherwise, it's valid and can be used
        // return $num;
    }

    function prizeNumberExists($num) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Prize::where('prize_no', $num)->exists();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('prizes.delete', ['prizeTypes' =>  PrizeType::where('active',true)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        return view('prizes.delete', ['prizeTypes' =>  PrizeType::where('active',true)->get()]);
    }
    public function deletePrizes(Request $request)
    {
        $validated = $request->validate([
            'prize_type_id' => 'numeric | required',
        ]);
        $prizes = Prize::where('redeemed', false)->where('prize_type_id', $request->prize_type_id)->delete();
        session()->flash('status', 'تم حذف الجوائز');
        return redirect()->route('prizes.index');
    }
    public function destroy($id)
    {
        //
    }
}
