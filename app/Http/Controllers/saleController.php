<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Sales;
use App\SalesList;
use Carbon\Carbon;
use App\Helpers\TransactionHelper;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class saleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('sales.allsales',compact('products'));
    }

    
    public function datefilter(Request $request){
        
        
        $start = Carbon::parse($request->start)->startOfDay();
        $end= Carbon::parse($request->end)->endOfDay();
        $products=Sales::whereBetween('created_at', [$start , $end])->get(); 
        // dd($products);
        return view('sales.allsales',compact('products'));

          
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.addsales');
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
        $sale =Sales::create($request->all());
        TransactionHelper::add($request);


        foreach ($request->id as $key => $id){
            SalesList::create([
                'product_id'=>$id,
                'sales_id'=>$sale->id,
                'price'=>$request->price[$key],
                'qtys'=>$request->qtys[$key],
                'total'=>$request->total[$key]
            ]);
        }
        if($request ->save == "Save & Print"){
            return redirect()->route('printslip',$sale->id);
        }
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
        $sale  = Sales::find($id);
        // dd($sale -> items );
        // $sale  = SalesList::where('sales_id',$id)->get();
        return view('sales.saleDetail')->with('sale', $sale);
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

    public function fetchProductByCategory(Request $request){
        $id = $request->id;
        if($id != 'all'){
            $category = Category::find($request->id);
            $products = $category->product;
            return response()->json($products);
        }
        else{
        $product = Product::all();
        return response()->json($product);
        }   
    }
    
    public function fetchProduct(Request $request){
        $product = Product::find($request->id);
        // $products = $product->product;
        // $result = $product->product;
        return response()->json($product);
    }

    public function print($id){
        $sale  = Sales::find($id);
        
        
        return view('sales.printslip')->with('sale', $sale);
    }
}
