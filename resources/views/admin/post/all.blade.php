@extends('layouts.admin')
@section('page_title','All Post Lists')
@section('content')
<div class="page-header">
    
    <h4 class="page-title">Blog Post Tables</h4>
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
            <a href="/admin/all_post">Posts</a>
        </li>
    </ul>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">All Post</h4>
            <a class="btn btn-primary btn-lg" href="/admin/add_post"">Add Post</a>
        </div>
        {{-- successfull message --}}
        @if (Session::has('flash_smsg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('flash_smsg') }}</strong>
        </div>
        @endif
        {{-- delete message --}}
        @if (Session::has('flash_dmsg'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('flash_dmsg') }}</strong>
        </div>
        @endif

        <div class="card-body">
            
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="50%">Title</th>
                            <th width="20%">Image</th>
                            <th width="10%">Date</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="8%">ID</th>
                            <th width="50%">Title</th>
                            <th width="20%">Image</th>
                            <th width="10%">Date</th>
                            <th width="12%">Action</th>
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
                                <td>{{ $item->title }}</td>
                                <td> 
                                    <img src="{{asset('storage/post/'.$item->image)}}" alt="" style="border: 3px solid #007bff;" width="150px">
                                </td>
                                <td>{{ $item->post_date }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="{{ url('/admin/edit_post/'.$item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ url('/admin/delete_post/'.$item->id) }}"data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
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