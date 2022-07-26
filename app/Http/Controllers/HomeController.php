<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id = Auth::id();
        $today= Carbon::now();
        // echo $today->year;
        $invlm= DB::table('APB_invoice')
        ->select('APB_invoice.netamt','APB_invoice.elec_usage','APB_invoice.water_usage')
         ->join('users','users.unitid','=','APB_invoice.unitid')
        ->where('users.id',$id)
        ->whereMonth('APB_invoice.trdate',$today->month-1)
        ->whereYear('APB_invoice.trdate',$today->year)->get();
        $card1=$invlm->first();
        $inv= DB::table('APB_invoice')
        ->select('APB_invoice.*')
         ->join('users','users.unitid','=','APB_invoice.unitid')
        ->where('users.id',$id)
        ->whereMonth('APB_invoice.trdate',$today->month)
        ->whereYear('APB_invoice.trdate',$today->year)->get();
        $card2=$inv->first();
        //$arr=$inv->firstOrFail();
       return view('dashboard',compact('inv','invlm','card1','card2'));
        //return compact('obj','inv');
        //dd( $inv);
    }
}
