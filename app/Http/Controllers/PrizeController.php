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
        return view('prizes.index',['prizes' => Prize::all(),'prizeTypes' => PrizeType::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prizes.create',['prizeTypes' => PrizeType::all()]);
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
            'prize_type_id' =>'numeric | required',
            'no_of_prizes' => 'numeric'
        ]);
        $no_of_prizes = (int) $request->input('no_of_prizes');
        // dd($request->all());
        for($i = 0 ; $i < $no_of_prizes; $i++) {
            // $data[] = [
            //     'prize_types_id' => $request->input('prize_type_id'),
            // ];
        //    dd($request->all());
        $prize = new Prize();
        $prize->prize_no = rand(1000,9999);
        $prize->prize_type_id = $request->input('prize_type_id');
        $prize->save();
        }
        //    Prizes::insert($data);
        $request->session()->flash('status', 'لقد تم إضافة الجوائز');
        return redirect()->route('prizes.index',['prizes' => Prize::all(),'prizeTypes' => PrizeType::all()]);
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
        //
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
    public function destroy($id)
    {
        //
    }
}
