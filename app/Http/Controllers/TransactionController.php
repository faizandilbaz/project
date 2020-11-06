<?php

namespace App\Http\Controllers;

use App\Helpers\TransactionHelper;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transactions = Transaction::all();
        // $debitTotal = 0;
        // $creditTotal = 0;
        
        // $obj = new stdClass();

        // foreach(Transaction::all() as $data){
        //     $debitTotal +=$data->debit;
        //     $creditTotal +=$data->credit;
        // }
        // $obj->debitTotal = $debitTotal;
        // $obj->creditTotal = $creditTotal;
       
        // return view('ledger.general')->with('obj',$obj);
    }


    public function general_datefilter(Request $request){
        $start = Carbon::parse($request->start)->startOfDay();
        $end= Carbon::parse($request->end)->endOfDay();
        $obj = new stdClass();

        $obj->transactions=Transaction::whereBetween('created_at', [$start , $end])->get(); 

        $debitTotal = 0;
        $creditTotal = 0;
        
        

        foreach(Transaction::all() as $data){
            $debitTotal +=$data->debit;
            $creditTotal +=$data->credit;
        }
        $obj->debitTotal = $debitTotal;
        $obj->creditTotal = $creditTotal;
        
        // dd($products);
        return view('ledger.general')->with('obj',$obj);
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
        // dd($request);
        
        TransactionHelper::add($request);
        
        
        return redirect()->back(); 

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




    public function payview(){
        return view('payment.pay');
    }
    public function receiveview(){
        return view('payment.receive');
    } 


    public function showcredit(Request $request){

        $start = Carbon::parse($request->start)->startOfDay();
        $end= Carbon::parse($request->end)->endOfDay();
        $obj = new stdClass;
        $obj->transactions=Transaction::whereBetween('created_at', [$start , $end])->get(); 
        $ct = 0;

       

       
        foreach(Transaction::whereBetween('created_at', [$start , $end])->get() as $data){
           
            $ct +=$data->credit;
        }
        $obj->creditTotal = $ct;
        return view('ledger.payment')->with('obj', $obj);
    }

    public function showdebit(Request $request){
        $start = Carbon::parse($request->start)->startOfDay();
        $end= Carbon::parse($request->end)->endOfDay();
        $obj = new stdClass;
        $obj->transactions=Transaction::whereBetween('created_at', [$start , $end])->get(); 
        $dt = 0;

        $obj->transactions = Transaction::all();

       
        foreach(Transaction::whereBetween('created_at', [$start , $end])->get() as $data){
           
            $dt +=$data->debit;
        }
        $obj->debitTotal = $dt;
        return view('ledger.receive')->with('obj', $obj);
    }
}
