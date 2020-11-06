@extends('layout/layout')

@section('content')
<div class="mt-4 ml-5 col-10">
    <div class="container-fluid mt-5">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="card component-card_1">
                        <div class="card-body">
                            <form action="{{route('transaction.store')}}" method="post">
                                @csrf
                                <h3>Make Payment</h3>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label for="amount">Amount USD</label>
                                        <input type="number" class="form-control" step="0.1" name="credit"
                                            placeholder="amount" required="" min="0">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="category">Description <small>(optional)</small></label>
                                        <textarea name="description" class="form-control" id="" cols="30" rows="7"
                                            placeholder="enter description"></textarea>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="type" value="Payment">


                                <input type="submit" name="time" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


@endsection


@section('scripts')

@endsection