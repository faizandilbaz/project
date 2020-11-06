@extends('layout/layout')

@section('content')
<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">

    <a href="{{url('http://127.0.0.1:8000/')}}"><button:back type="retuen" class="btn btn-primary">Home</button:back></a>




    <div class="card-body">
        
            <input type="hidden">
            <h3>Product Details</h3>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select class="form-control" id="category" name="category_id" required="">
                    {{-- <option selected="" disabled="">Choose category</option> --}}
                    @foreach (App\Category::all() as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="name">Product Name</label>
                <input value="{{$product->name}}" type="text" class="form-control" name="name" placeholder="product name" required="">
            </div>

            <div class="form-group">
                <label for="name">Barcode</label>
                <input value="{{$product->barcode}}" type="text" class="form-control" name="barcode" placeholder="barcode">
            </div>

            <div class="form-group">
                <label for="price">price</label>
                <input value="{{$product->price}}" type="number" class="form-control" step="0.1" name="price" placeholder="product price"
                    required="">
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input value="{{$product->qty}}" type="number" class="form-control" name="qty" placeholder="product stock quantity" required="">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input value="{{$product->status}}" type="text" class="form-control" name="status" placeholder="Current status" required="">
            </div>


            <a href="{{url('product')}}"><button:back type="retuen" class="btn btn-primary">Back</button:back></a>
        
    </div>


</div>





@endsection