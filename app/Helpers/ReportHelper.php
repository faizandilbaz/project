<?php


namespace App\Helpers;

use App\Preference;
use App\Product;
use App\Sales;
use App\Transaction;
use App\transactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;
use stdClass;

class ReportHelper
{
    public static function monthlySale($month,$year){

        $start = Carbon::createFromDate($year,$month)->startOfMonth();
        // dd($start);
        $end = Carbon::createFromDate($year,$month)->endOfMonth();
        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            // dd($clone);
            $obj->date = $start->day;
            
            $obj->amount = Sales::whereBetween('created_at', [$start, $clone->endOfDay()])->sum('amount');
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }
    public static function monthlypayment($month,$year){

        $start = Carbon::createFromDate($year,$month)->startOfMonth();
        // dd($start);
        $end = Carbon::createFromDate($year,$month)->endOfMonth();
        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->amount = Transaction::whereBetween('created_at', [$start, $clone->endOfDay()])->sum('credit');
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }

    public static function monthlyreceive($month,$year){

        $start = Carbon::createFromDate($year,$month)->startOfMonth();
        //dd($start);
        $end = Carbon::createFromDate($year,$month)->endOfMonth();
        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->day;
            $obj->amount = Transaction::whereBetween('created_at', [$start, $clone->endOfDay()])->sum('debit');
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }
    public static function yearlysale($year){

        $start = Carbon::createFromDate($year)->startOfYear();
        //dd($start);
        $end = Carbon::createFromDate($year)->endOfYear();
        $months = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            $obj->date = $start->month;
            $obj->amount = Transaction::whereBetween('created_at', [$start, $clone->endOfDay()])->sum('debit');
            $days[] = $obj;
            $start->addMonth();
        }
        return $months;
    }
}
