<?php

namespace App\Http\Controllers;

use App\Helpers\ReportHelper;
use App\Sales;
use App\transactions;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function monthly_sale(Request $request)
    {
        
        $month = $request->mmonth;
        $year = $request->myear;
        $report = ReportHelper::monthlySale($month, $year);
        // dd($report);
        //dd($report[16]->amount);
        return view('report.monthly.sale')->with('report', $report);
        // dd($month);

        // return redirect()->back();
    }
    public function monthly_payment(Request $request)
    {
        
        $month = $request->mmonth;
        $year = $request->myear;
        $report = ReportHelper::monthlypayment($month, $year);
        return view('report.monthly.payment')->with('report', $report);
    }
    public function monthly_receive(Request $request)
    {
        
        $month = $request->mmonth;
        $year = $request->myear;
        $report = ReportHelper::monthlyreceive($month, $year);
        return view('report.monthly.recovery')->with('report', $report);
    }
    public function yearly_sale(Request $request)
    {
        
        
        $year = $request->myear;
        $report = ReportHelper::yearlysale($year);
        // dd($report);
        //dd($report[16]->amount);
        return view('report.monthly.sale')->with('report', $report);
        // dd($month);

        // return redirect()->back();
    }

}
