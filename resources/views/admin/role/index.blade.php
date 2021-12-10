@extends('layouts.app')
@section('third_party_stylesheets')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('admin/')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/')}}/dist/css/adminlte.min.css">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles Table List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('admin.role.index')}}">All Roles</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <strong class="card-title ">User Role Permission Table</strong>
                            <a href="{{route('admin.role.create')}}" class="btn btn-sm btn-outline-primary float-right">Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="5%">SI</th>
                                    <th width="10%">Name</th>
                                    <th width="60%">Permissions</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($roles as $role)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                              @foreach($role->permissions as $permission)
                                                  <span class="badge badge-info mr-1">
                                                      {{$permission->name }}
                                                  </span>
                                              @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('admin.role.edit',$role->id)}}" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a>
                                            <a href="{{route('admin.role.destroy',$role->id)}}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('destroy-form-{{$role->id}}').submit();"><i class="fa fa-trash"></i></a>
                                            <form id="destroy-form-{{$role->id}}" action="{{ route('admin.role.destroy',$role->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('third_party_scripts')
    <!-- jQuery -->
    <script src="{{asset('admin/')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('admin/')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/')}}/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>

@endsection
