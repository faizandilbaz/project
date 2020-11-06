
    <div id='DivIdToPrint' class="container d-none">
       
        <div class="card">
    
            <div class="card-header">
    
            </div>
    
            <div class="card-body">
    
                <div class="row container">
                    <div class="col-sm-3">
                        <img src="http://logok.org/wp-content/uploads/2014/08/YouTube-logo-play-icon.png" style="width:65%;" alt="">
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
                                <th class="center">{{$list->price}}</th>
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
