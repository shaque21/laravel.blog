@extends('layouts.admin')
@section('page_title','All Contact Messages Lists')
@section('content')
<div class="page-header">
    
    <h4 class="page-title">Contact Messages Lists</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="/admin">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ url('/admin/contact_page') }}">Messages</a>
        </li>
    </ul>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">All Messages</h4>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="15%">Name</th>
                            <th width="10%">Phone</th>
                            <th width="15%">Email</th>
                            <th width="35%">Message</th>
                            <th width="15%">Added On</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">Name</th>
                            <th width="10%">Phone</th>
                            <th width="15%">Email</th>
                            <th width="40%">Message</th>
                            <th width="15%">Added On</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($result as $item)
                            <tr>
                                <td>
                                    @if ($item->id<10)
                                        {{ '0'.$item->id }}  
                                    @else
                                        {{ $item->id }}
                                    @endif
                                    
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->added_on }}</td>
                                
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>
@endsection