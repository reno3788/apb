<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InvoiceImport;
use App\Imports\PaymentImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('invoiceimport');
    }
    public function payment()
    {
        //
        return view('paymentimport');
    }
    public function importinvoice(Request $request)
    {
        //
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        try {
            //code...
            Excel::import(new InvoiceImport, $request->file('file')->store('temp'));
            return back()->with('status','Success');//buat kasih keterangan flash
            // return back();
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error',$ex->getPrevious()->getMessage());
        }

    }
    public function importpayment(Request $request)
    {
        //
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        try {
            //code...
            Excel::import(new PaymentImport, $request->file('file')->store('temp'));
            return back()->with('status','Success');//buat kasih keterangan flash
            // return back();
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error',$ex->getPrevious()->getMessage());
        }

    }
    public function history()
    {
        //
        $id = Auth::id();
        $today= Carbon::now();
        $inv= DB::table('APB_invoice')
        ->select('APB_invoice.id','APB_invoice.unitid','APB_invoice.unitiddesc','APB_invoice.trdate','APB_invoice.space_unit','APB_invoice.paymentsch','APB_invoice.netamt',
        'APB_invoice.elec_usage','APB_invoice.water_usage','APB_invoice.elec_pju','APB_invoice.elec_amt','APB_invoice.water_sub','APB_invoice.water_adv_amt','APB_invoice.water_amt','APB_invoice.water_maint',
        'APB_invoice.svc_amt','APB_invoice.sink_amt','APB_invoice.ret_amt')
        ->selectRaw("(select fAPB_getpayment(APB_invoice.id)) as status")
        ->join('users','users.unitid','=','APB_invoice.unitid')
        ->where('users.id',$id)
        ->whereYear('APB_invoice.trdate',$today->year)->get();
        return view('invoicelist',compact('inv'));
        // dd($inv);
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
    public function show($id,$trdate)
    {
        //
        $userid = Auth::id();
        $m = \DateTime::createFromFormat('Y-m-d', $trdate)->format("m");
        $y = \DateTime::createFromFormat('Y-m-d', $trdate)->format("Y");
        // echo $today->year;
        $invlm= DB::table('APB_invoice')
        ->select('APB_invoice.netamt','APB_invoice.elec_usage','APB_invoice.water_usage')
         ->join('users','users.unitid','=','APB_invoice.unitid')
        ->where('users.id',$userid)
        ->whereMonth('APB_invoice.trdate',$m-1)
        ->whereYear('APB_invoice.trdate',$y)->get();
        $card1=$invlm->first();
        $inv= DB::table('APB_invoice')
        ->select('APB_invoice.*')
         ->join('users','users.unitid','=','APB_invoice.unitid')
        ->where('APB_invoice.id',$id)
        ->where('users.id',$userid)->get();
        $card2=$inv->first();
        //$arr=$inv->firstOrFail();
       return view('history',compact('inv','invlm','card1','card2'));
    //    dd(compact('inv','invlm','card1','card2'));
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
