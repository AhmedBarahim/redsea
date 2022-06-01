<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;
use DateTime;
class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $winners = Winner::where('is_seen' , false)->get();
        foreach($winners as  $winner) {
            $winner->is_seen = true;
            $winner->save();
        }
       return view('winners.index',['winners' =>  Winner::join('prizes','prizes.id','=','prize_id')->where('prize_type_status',true)->select('winners.*')->orderBy('delivered','desc')->orderBy('delivered_at',
       'desc')->get()]);
    }
    public function newWinners()
    {
        $winners = Winner::where('is_seen' , false)->get();
        foreach($winners as  $winner) {
            $winner->is_seen = true;
            $winner->save();
        }
       return view('winners.new-winners',['winners' =>  Winner::join('prizes','prizes.id','=','prize_id')->where('prize_type_status',true)->where('delivered',false)->select('winners.*')->orderBy('created_at',
       'desc')->get()]);
    }

    public function winnersNotification()
   {
       # code...
       $winners = Winner::where('is_seen' , false)->count();
       return response()->json($winners, 200);
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // dd($id);
        // $winner_reedemed = Winner::where('id',$id)->value('delivered');
        $winner = Winner::find($id);
        $winner->delivered = !$winner->delivered;
        $winner->delivered_at = new DateTime(date("Y-m-d H:i:s"));
        // dd($winner);
        $winner->save();
        return redirect()->route('winners.index');
        // return("succses");
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
