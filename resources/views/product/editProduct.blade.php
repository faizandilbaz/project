@extends('layout/layout')

@section('content')
<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">





    <div class="card-body">
        <form action="{{route('product.update',$product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden">
            <h3>Edit Product</h3>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select class="form-control" id="category" name="category_id" required="">
                    <option selected="" disabled="">Choose category</option>
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


            <input type="submit" name="time" class="btn btn-primary">
        </form>
    </div>


</div>





@endsection