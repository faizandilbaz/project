@extends('layout/layout')

@section('content')
<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">





    <div class="card-body">
        <form action="{{route('product.store')}}" method="post">
            @csrf
            <input type="hidden">
            <h3>Add Product</h3>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select class="form-control" id="category" name="category_id" required="true">
                    <option selected="" disabled="">Choose category</option>
                    @foreach (App\Category::all() as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="product name" required="">
            </div>

            <div class="form-group">
                <label for="name">Barcode</label>
                <input type="text" class="form-control" name="barcode" placeholder="barcode">
            </div>

            <div class="form-group">
                <label for="price">price</label>
                <input type="number" class="form-control" step="0.1" name="price" placeholder="product price"
                    required="">
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="qty" placeholder="product stock quantity" required="">
            </div>

            <input type="submit" name="time" class="btn btn-primary">
        </form>
    </div>


</div>





@endsection