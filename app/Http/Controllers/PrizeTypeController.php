<?php

namespace App\Http\Controllers;

use App\Models\PrizeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrizeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prize-types.index',['prizeTypes' => PrizeType::where('active',true)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prize-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PrizeType::create(['name' => $request->name]);
        $request->session()->flash('status', 'لقد تم إضافة الجائزة !');
        return redirect()->route('prize-types.index');

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
        return view('prize-types.edit',['prizeTypes' => PrizeType::findOrFail($id)]);

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
        $prize_type = PrizeType::findOrFail($id);
        $prize_type->name = $request->name;
        $prize_type->save();
        $request->session()->flash('status', 'لقد تم تعديل الجائزة !');
       return redirect()->route('prize-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $prize_type = PrizeType::findOrFail($id);
       $prize_type->name = $prize_type->name . ' (تم الحذف)';
       $prize_type->active = false;
       $prize_type->save();
       DB::table('prizes')->where('prize_type_id',$prize_type->id)->where('redeemed', false)->delete();
       session()->flash('status', 'تم حذف نوع الجائزة');
       return redirect()->route('prize-types.index');
    }
}
