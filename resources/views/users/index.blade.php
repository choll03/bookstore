@extends('layouts.lte')
@section('title') Manage Users @endsection
@section('content')

<div class="card">
    <div class="card-body">
      <div class="row" style="padding: 0 7px;">
        <div class="col-md-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="cari" placeholder="Search ...">
            <span class="input-group-append">
              <button type="button" class="btn btn-info btn-flat" id="search-form"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
        <div class="col-md-8">
          <a href="{{route('users.create')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Create User</a>
        </div>
      </div>
      <table class="table table-bordered table-hover" id="users-table" width="100%">
      <thead>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <!-- <th>Avatar</th> -->
              <!-- <th>Status</th> -->
              <th>Actions</th>
          </tr>
      </thead>
      </table>
    </div>  
</div>
@endsection

@section('footer-scripts')
  <script>
    $(document).ready(function(){
      var oTable = $('#users-table').DataTable({
            "createdRow": function ( row, data, index ) {
              $('td', row).eq(1).addClass('text-center');
            },
            'columnDefs': [
                {
                    "targets": 2, 
                    "className": "text-center",
                    "width": "20%"
                },
            ],
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('datatables.users') !!}',
              data: function(d) {
                d.name = $('#cari').val();
                d.email = $('#cari').val();
              }
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                // { data: 'avatar', render: getImage , orderable: false, searchable: false},
                // { data: 'status', name: 'status'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom:'tp', // <"row"<"col-md-6"f><"col-md-6"B>>tp,
            // buttons: [
            //     {
            //         text: 'Create',
            //         className: 'btn btn-success float-right',
            //         action: function ( e, dt, node, config ) {
            //             window.location.href = '{!! route('users.create') !!}';
            //         }
            //     }
            // ],
        });
        
        $('#search-form').on('click', function(e) {
            oTable.draw();
            e.preventDefault();
        });
    });

    function getImage(params) {
        return '<img src={!! asset("storage/avatars/"."'+params+'") !!} width="50px" />';
    }
  </script>
@endsection