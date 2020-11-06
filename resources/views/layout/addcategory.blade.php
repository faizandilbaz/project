@extends('layout/layout')

@section('content')
<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">

    <h2>Add Category</h2>
    <div class="container">
        <form id="addCategory" method="post" action="{{route('category.store')}}">
            @csrf
            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="category name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category name" required=""> 
                </div>
                <div class="form-group col-md-6">
                    <label for="color">Color</label>
                    <input type="color" class="form-control" id="color" name="color" placeholder="Color"
                        onchange="newBackgroundColor(colorpicker.value);">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add New</button>
        </form>
    </div>
    <div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <br>
                        <h4>Category List</h4>
                    </div>

                    <div class="row" id="cancel-row">
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="alter_pagination" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>SR#</th>
                                                <th>NAME</th>
                                                <th>COLOR</th>
                                                <th>PRODUCT</th>
                                                <th class="text-center">EDIT</th>
                                                <th class="text-center">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (App\Category::all() as $category)

                                            <tr>

                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><button class="btn"
                                                        style="background-color:{{$category->color}} ">{{$category->color}}</button>
                                                </td>
                                                <td>{{$category->product->count()}}</td>

                                                <td class="text-center">
                                                    <button class="btn btn-primary edit-btn edit-{{$category->id}}"
                                                        name="{{$category->name}}" id="{{$category->id}}"
                                                        color="{{$category->color}}" data-toggle="modal"
                                                        data-target="#exampleModal">Edit</button>
                                                </td>

                                                <td>
                                                    <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>

                                                

                                            </tr>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SR#</th>
                                                <th>NAME</th>
                                                <th>COLOR</th>
                                                <th>PRODUCT</th>
                                                <th class="text-center">EDIT</th>
                                                <th class="text-center">ACTION</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./card -->

            </div>
        </div>
    </div>





</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="updateForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="category">Name</label>
                        <input type="text" class="form-control" name="name" id="newname" value="" placeholder="name"
                            required="">
                    </div>

                    <div class="modal-body">
                        <label for="color">Color</label>
                        <input type="color" class="form-control" name="color" id="newcolor" value="" placeholder="color"
                            required="">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button form="updateForm" type="submit" class="btn btn-primary">Save</button>

            </div>
        </div>
    </div>
</div>



@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#alter_pagination').DataTable();
    });
</script>

<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            
            let id = $(this).attr('id');
            console.log(id);
            let name =  $(this).attr('name');
            console.log(name);
            let color =  $(this).attr('color');
            console.log(color);
            $('#newname').val(name);
            $('#newcolor').val(color);
            // $('#updateForm').attr('action','{{route("category.update",'')}} +'/'+id);
            $('#updateForm').attr('action','{{route("category.update",'')}}' + '/' +id);
        });
    });
</script>


@endsection