@extends('layout/layout')

@section('content')
<div class="container mt-5 mt-container widget-content widget-content-area container-fluid">


    <div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <br>
                        <h4>All Receivings</h4>
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
                                <th>TR#</th>
                                <th>DESCRIPTION</th>
                                <th>AMOUNT</th>
                                <th>OPENING BALANCE</th>
                                <th>CLOSING BALANCE</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($obj->transactions as $list)

                            @if($list->debit)
                            <tr>


                                <td>TR-{{$list->id}}</td>
                                <td>{{$list->description}}</td>
                                <td>{{$list->debit}}</td>

                                <td>{{$list->opening_balance}}</td>
                                <td>{{$list->closing_balance}}</td>




                            </tr>
                            @endif


                            @endforeach
                        </tbody>
                        <tfoot>
                            
                            <tr>
                                <th>#</th>
                                <th>TOTAL</th>
                                <th>{{$obj->debitTotal}}</th>
                                <th>......</th>
                                <th>......</th>


                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





</div>





@endsection


@section('scripts')


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