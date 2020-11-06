@extends('layout/layout')

@section('content')

<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">
    
    <div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <br>
                        <h4>Sale Detail</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" onclick="printDiv()">Print Invoice</button>
                        </div>
                    </div>
                </div>
                <!-- ./card -->

            </div>
        </div>
    </div>


    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="alter_pagination" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PRODUCT</th>
                                <th>CATEGORY</th>
                                <th>PRICE</th>
                                <th>QTY</th>
                                <th>AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->items as $list)
                            

                            <tr>
                                
                                <td>{{$list->id}}</td>
                                <td>{{$list->product->name}}</td>
                                <td>{{$list->product->category->name}}</td>
                                <td>{{$list->price}}</td>
                                <td>{{$list->qtys}}</td>
                                <td>{{$list->total}}</td>
                           </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>PRODUCT</th>
                                <th>CATEGORY</th>
                                <th>PRICE</th>
                                <th>QTY</th>
                                <th>AMOUNT</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    


   
    <div id='DivIdToPrint' class="container d-none">
       
        <div class="card">
    
            <div class="card-header">
    
            </div>
    
            <div class="card-body">
    
                <div class="row container">
                    <div class="col-sm-3">
                        <img src="https://lh3.googleusercontent.com/proxy/7QdBxZg4zMjXnNOf2o4yPxA5n-zN0O53QergwEj9Brl-KAIfFfBl1937hQTp2xTM4sdDX8HKZf4jMCO7G-a5NTLxPESLHoxBCMa_t0VT6ubuTYouwuOkDLsecA" style="width:65%;" alt="">
                    </div>
                    <div class="col-sm-6">
    
                    </div>
                    
                    <div class="col-sm-3 mt-4">
                        <div class="row">
                            <div class="col-sm-5">
                                <span>Date : </span>
                                <br>
                                <br>
                                <span>Invoice#: </span>
                            </div>
                            <div class="col-sm-7">
                                <span class="myFont">{{$sale->created_at}}</span><br>
                                <span class="myFont">INV-{{$sale->id}}</span><br>
                            </div>
                        </div>
                    </div>
                </div>
    
                <br>
    
                <div class="table-responsive-sm">
                    <table class="table table-striped table-bordered">
                        <thead class="card-header">
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
    
                                <th class="right">Qty</th>
                                <th class="center">Unit Cost</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($sale->items as $list)
                            <tr>
                                <td class="center">{{$list->id}}</td>
                                <td class="left"> {{$list->product->category->name}}</td>
                                <td class="right"> {{$list->qtys}}</td>
                                <td class="center"> {{$list->price}}</td>
                                <td class="right"> {{$list->total}}</td>
                            
                            </tr>
                            @endforeach
                           
                        </tbody>
                        <tfoot class="card-header">
                            <tr>
                                <th class="center">#</th>
                                <th>Total</th>
    
                                <th class="right">{{$sale->qty}}</th>
                                <th class="center">{{$sale->price}}</th>
                                <th class="right">{{$sale->amount}}/-</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    
                <div class="row container">
                    <div class="col-sm-4">
    
                    </div>
    
                    <div class="col-sm-5">
    
                    </div>
    
                    <div class="col-sm-3 text-center">
                        <br>
                        <hr>
                        <h6>Signature</h6>
                    </div>
    
                </div>
    
                <p>This is a system generated sale.Errors and omissions are expected. </p>
    
    
            </div>
    
        </div>
        
    </div>
    



</div>





@endsection


@section('scripts')
<script>
    printDiv();
    
    function printDiv() {
    
        var divToPrint=document.getElementById('DivIdToPrint');
    
        var newWin=window.open('','Print-Window');
    
        newWin.document.open();
    
        newWin.document.write('<html><head><link rel="stylesheet" href="http://epos.tritec.online/print/bootstrap.min.css"><link rel="stylesheet" href="http://epos.tritec.online/print/style.css"></head><body>'+divToPrint.innerHTML+'</body></html>');
    
    
        setTimeout(function(){
            newWin.print();
            newWin.close();
            window.history.back();
        },1500);  
    }

    
</script>

<script>
    $(document).ready(function() {
        $('#alter_pagination').DataTable( {
            "pagingType": "full_numbers",
            "oLanguage": {
                "oPaginate": { 
                    "sFirst": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                    "sLast": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    } );
</script>

@endsection