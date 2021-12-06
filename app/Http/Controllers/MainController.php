<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //GetRejected

        $DTDailyOrders=$DailyOrders=DB::select('call ShowDailyOrder()');
        $DailyRejectedOrders=DB::select('call GetRejected()');
        $DailySuccessOrders=DB::select('call getsuccessorder()');

        $GetPendingOrderOfMainLab=DB::select('call GetPendingOrderOfMainLab()');


        switch($request->type){
            case '1':$DTDailyOrders=$DailyOrders;break;
            case '2':$DTDailyOrders=$DailyRejectedOrders;break;
            case '4':$DTDailyOrders=$DailySuccessOrders;break;
            case '5':$DTDailyOrders=$GetPendingOrderOfMainLab;break;
        }


        $CurrentOrders=[];
        $infromationArray=Array(
            "NewOrder"=>sizeof($DailyOrders),
            "DailyRejectedOrders"=>sizeof($DailyRejectedOrders),
            "GetPendingOrderOfMainLab"=>sizeof($GetPendingOrderOfMainLab),
            "DailySuccessOrders"=>sizeof($DailySuccessOrders),
            "CurrentOrders"=>$CurrentOrders,
            "DailyOrders"=>$DTDailyOrders
        );
        return view("welcome",$infromationArray);
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

    public function Information()
    {


        $Information=Information::all();
      //  dd($Information);
        $infromationArray=Array(
            "Information"=>$Information
        );
        return view("Information",$infromationArray);
    }


    public function StoreInformation(Request $request)
    {

        Information::create([
            'title'=>$request["title"],
            'description'=>$request["Description"],
            'type'=>'others'
        ]);


        return redirect()->back();

    }
}
