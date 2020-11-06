@extends('layout/layout')

<head>

</head>
@section('content')
<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">
    <div class="card-body">
        <form action="{{route('sale.store')}}" id="invoiceForm" method="post">
            @csrf
            <input type="hidden">
            <input type="hidden" name="_token">
            <div class="row">
                <div class="col-md-6">
                    <h3>Add Sales</h3>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-5">
                    <label>Category</label>
                    <select class="form-control " id="category" name="category_id" required="">
                        <option value="all">All</option>
                        @foreach (App\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label class="text-light"><br></label><br>
                    <input value="Save Invoice" name="save" type="submit" class="btn btn-primary">
                </div>

                <div class="form-group col-md-2">
                    <label class="text-light"><br></label><br>
                    <input value="Save & Print" name="save" type="submit" class="btn btn-success">
                </div>

                <a href="{{route('sale.index')}}" >
                <div class="form-group col-md-2">
                    <label class="text-light"><br></label><br>
                    <a href="{{route('datefilter')}}" class="btn btn-danger two-dates" data-toggle="modal"
                    data-target="#date_modal" >Go To
                        Sales</a>
                </div>
                </a>
                <!-- data-toggle="modal" data-target="#date_modal"   two-dates -->


            </div>

            <div class="row">

                <div class="form-group col-md-4">
                    <label>Barcode</label>
                    <select class="form-control basic select2-hidden-accessible" id="barcode" name="product_id"
                        required="" data-select2-id="barcode" tabindex="-1" aria-hidden="true">
                        <option selected="" disabled="" data-select2-id="2">Enter Barcode</option>
                        @foreach (App\Product::all() as $product)
                        <option value="{{$product->id}}">{{$product->barcode}}</option>
                        @endforeach

                    </select><span class="select2 select2-container mb-4 select2-container--default" dir="ltr"
                        data-select2-id="6" style="width: 220.226px;"><span class="selection"><span
                                class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                                aria-expanded="false" tabindex="0" aria-labelledby="select2-barcode-container"><span
                                    class="select2-selection__rendered" id="select2-barcode-container" role="textbox"
                                    aria-readonly="true" title="Enter Barcode"></span><span
                                    class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span>
                </div>

                <div class="form-group col-md-4">
                    <label>Select Product</label>
                    <select class="form-control basic select2-hidden-accessible" id="producti" name="product_id"
                        required="" data-select2-id="producti" tabindex="-1" aria-hidden="true">
                        <option selected disabled>Choose product</option>
                        @foreach (App\Product::all() as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select><span class="select2 select2-container mb-4 select2-container--default" dir="ltr"
                        data-select2-id="8" style="width: 220.226px;"><span class="selection"><span
                                class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                                aria-expanded="false" tabindex="0" aria-labelledby="select2-producti-container"><span
                                    class="select2-selection__rendered" id="select2-producti-container" role="textbox"
                                    aria-readonly="true" title="Choose product"></span><span
                                    class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span>
                </div>

                <div class="form-group col-md-4">
                    <label>Qty</label>
                    <input id="qty" type="number" class="form-control">
                </div>

            </div>

            <div class="row">
                <div class="form-group col-md-2">
                    <label>Stock</label>
                    <input id="stock" value="" type="number" class="form-control text-light" readonly="">
                </div>

                <div class="form-group col-md-2">
                    <label>Price</label>
                    <input id="price" type="number" step="0.1" class="form-control text-light" readonly="">
                </div>

                <div class="form-group col-md-2">
                    <label>Total</label>
                    <input id="total" type="number" class="form-control text-light" readonly="">
                </div>

                <div class="form-group col-md-3">
                    <label class="text-light"><br></label><br>
                    <button id="add-btn" class="btn btn-info">Add To invoice</button>
                </div>

                <div class="form-check col-md-1 mt-5">
                    <input class="form-check-input" type="radio" name="sale_type" id="cash" value="cash" checked="">
                    <label class="form-check-label" for="cash">Cash</label>
                </div>

                <div class="form-check col-md-1 mt-5">
                    <input class="form-check-input" type="radio" name="sale_type" id="card" value="card">
                    <label class="form-check-label" for="card">Card</label>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr class=" text-light">
                            <th>Total</th>
                            <th>.............</th>
                            <th id="totalQty">Total Qty</th>
                            <th id="totalAmount">Total Amount</th>
                            <th>.....................</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div id="inputs">
                <input type="hidden" id="total-amount" name="amount" step="0.1" value="">
                <input type="hidden" id="total-qty" name="qty" value="">
                <input type="hidden" name="type" value="sale">
            </div>
        </form>
    </div>


</div>
@endsection


@section('scripts')

<script>
    let id, percentage, stock,
                price, total=0, qty=1, abc=123,
        name, totalAmount=0, totalQty=0, ids=[], prices=[], qtys=[], totals=[], delay=false;


    $(document).ready(function (){


        $('#category').on('change', function() {
            
            id = this.value;
            fetchProductsByCategory(id);
        });
        $('#producti').on('change', function() {
            id = this.value;
            delay = true;
            
            $('#barcode').val(this.value);
            $('#barcode').change();
            
            fetchProduct();
            
        });
        $('#barcode').on('change', function() {
            if(delay){
                delay = false;
            } else {
                $('#producti').val(this.value);
                $('#producti').change();
                
                
            }
        });
        $('#qty').on('keyup change', function() {
            
            qty = parseInt(this.value);

            if(stock){
                if(qty > stock){
                    qty=stock;
                    $('#qty').val(qty);
                    $('#qty').change();
                }
            
                if(qty < 1){
                    qty=1;
                    $('#qty').val(qty);
                    $('#qty').change();
                }
            }
            total = parseFloat((price*qty).toFixed(2));
            refreshInputs();
          
        });

        $('#add-btn').click(function(e){
                e.preventDefault();
            if(!productExists() && stockAvailable()){
                addData();
                appendRow();
                clearFields();
            }
        });
        $('body').on('click','.remove-btn',function(e){
            e.preventDefault();
            removeRow(this);
            removeData();
        });




        
    



        function fetchProduct(){
            $.ajax({
                url: '{{route("fetchProduct")}}',
                method: 'POST',
                data: {
                    id: id,
                },
                success: function(result){
                    console.log(result);
                    name =  result.name;
                    console.log(name);
                    stock =  result.qty;
                    price =  result.price;
                    total = parseFloat((price*qty).toFixed(2));

                    refreshInputs();
                    $('#qty').val(1);
                    // $('#qty').change();
                    $('#stock').change();
                    

                }
            });
        }
        
        
        function fetchProductsByCategory(id){
            $.ajax({
                url: '{{route("fetchProductByCategory")}}',
                method: 'post',
                data: {
                    id: id
                },
                success: function(result){
                    appendProductsList(result,$('#producti'));
                    appendBarcodesList(result,$('#barcode'));
                    
                }
            });
        }

        function appendProductsList (result,div){
            
            div.empty();
            div.append('<option selected disabled>Select Product</option>');
            for (i=0;i<result.length;i++){
                div.append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
            }
            $('#producti').change();
        }

        function appendBarcodesList(result,div) {
            div.empty();
            div.append('<option selected disabled>Enter Barcode</option>');
            for (i=0;i<result.length;i++){
                div.append('<option value="'+result[i].id+'">'+result[i].barcode+'</option>');
            }
            
        }


        function addData(){
            ids.push(id);
            prices.push(price);
            qtys.push(qty);
            totals.push(total);
            totalAmount = parseFloat((totalAmount + total).toFixed(2));
            totalQty += qty;
        }

        function stockAvailable(){
            return qty <= stock;
        }
        function removeRow(row){
            id = $(row).attr('product-id');
            $('.row-'+id).remove();
        }

        function refreshTotal(){
            $('#totalQty').html(totalQty);
            $('#totalAmount').html(totalAmount);
            $('#total-qty').val(totalQty);
            $('#total-amount').val(totalAmount);
        }

        
        function appendRow(){
            let row = '<tr class="row-'+id+'">'+
                '<td>'+name+'</td>'+
                '<td>'+price+'</td>'+
                '<td>'+qty+'</td>'+
                '<td>'+total+'</td>'+
                '<td>'+
                    '<button product-id="'+id+'" class="remove-btn btn btn-danger">Remove</button>'+
                '</td>'+
            '</tr>';
            let inputs = '<input class="row-'+id+'" type="hidden" name="id[]" value="'+id+'">'+
                            '<input class="row-'+id+'" type="hidden" name="price[]" value="'+price+'">'+
                            '<input class="row-'+id+'" type="hidden" name="total[]" value="'+total+'">'+
                            '<input class="row-'+id+'" type="hidden" name="qtys[]" value="'+qty+'">';
            $('tbody').append(row);
            $('#inputs').append(inputs);
            console.log(inputs);
            refreshTotal();
        }

        function clearFields(){
            $('#qty').val('');
            $('#total').val('');
            $('#price').val('');
            $('#stock').val('');
        }

        function removeData(){
            let index = ids.indexOf(id);
            totalAmount = parseFloat((totalAmount - totals[index]).toFixed(2));
            totalQty -= qtys[index];
            refreshTotal();

            delete ids[index];
            delete prices[index];
            delete qtys[index];
            delete totals[index];
        }

        function productExists(){
            let flag = false;
            ids.forEach(arrayId => {
                if(arrayId == id){
                    flag = true;
                    return;
                }
            });
            return flag;
        }

        function refreshInputs(){
            $('#price').val(price);
            $('#stock').val(stock);
            $('#total').val(total);
        }








        /FOCUS MANAGMENT/////////

        $('body').on('keydown', 'input, select, textarea', function(e) {
            var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
            ;

            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this)+1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
            }
        });

        $('.form-control').on("select2:select", function(e) {
            $(this).select2('close');
            var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
            ;
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this)+1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
        });


        $('#category').on("change", function() {
            $('#producti').focus();
        });
        
        $('#barcode').on("change", function() {
            $('#qty').focus();
        });
        
        $('#producti').on("change", function() {
            $('#qty').focus();
        });

        $('#invoiceForm').on('submit', function(e){
            if(totalQty<1){
                e.preventDefault();
                toastr.error('No items Added');
            }
        });

        $('#cash').on("click", function() {
            this.checked ? $('#advance').attr('disabled',true):$('#advance').attr('disabled',false);
        });
        
        $('#credit').on("click", function() {
            this.checked ? $('#advance').attr('disabled',false):$('#advance').attr('disabled',true);
        });





});   

</script>
@endsection