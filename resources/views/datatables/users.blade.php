@extends('layouts.lte')
@section('title') Manage Users @endsection
@section('content')
<style>
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left;
    }
</style>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover" id="users-table" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <!-- <th>Status</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        </table>
    </div>  
</div>
@endsection

@section('footer-scripts')
  <!-- jQuery -->
  <!-- <script src="//code.jquery.com/jquery.js"></script> -->
  <!-- DataTables -->
  <!-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> -->
  <!-- Bootstrap JavaScript -->
  <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
  <!-- App scripts -->

  <script>
    $(function() {
        $('#users-table').DataTable({
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            'columnDefs': [
                {
                    "targets": 3, 
                    "className": "text-center",
                },
            ],
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                // { data: 'avatar', render: getImage , orderable: false, searchable: false},
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom:'<"row"<"col-md-6"f><"col-md-6"B>>tp',
            buttons: [
                {
                    text: 'Create',
                    className: 'btn btn-success float-right',
                    action: function ( e, dt, node, config ) {
                        window.location.href = '{!! route('users.create') !!}';
                    }
                }
            ],
        });
    });

    function getImage(params) {
        return '<img src={!! asset("storage/avatars/"."'+params+'") !!} width="50px" />';
    }
  </script>
@endsection