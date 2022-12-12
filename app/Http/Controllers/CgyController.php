<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cgy;
use Illuminate\Http\Request;

class CgyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$cgies = Cgy::all();
      $cgies = Cgy::where('id','>',20)->get();
      //$cgies = Cgy::where('id','>',50)->where('id','<=',80)->orderBy('update_at','desc')->get();
      return $cgies;

      //此指令執行
      $date = Carbon::createFromFormat('Y-m-d h:i:s','2020-12-08 00:00:00');
      $cgies = Cgy::where('enabled_at','>',$date)->get();
      return $cgies;
        //
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
        //找到id為第幾筆的資料
        $cgy =Cgy::find($id);

        //
        //$cgy = Cgy::findOrFail($id);

        //此語法要與
        //$cgy = Cgy::where('id',201)->orderBy('created_at','asc');
        //dd($cgy);


        return $cgy;
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
      $cgies = Cgy::find($id);
      $cgies -> is_feature = $request['is_feature'];
      $cgies -> save();
      return redirect('/');

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
      $cgies = Cgy::find($id);
      $cgies -> delete();
      Cgy::destroy(1);
      //return redirect('/tasks');



        //
    }
}
