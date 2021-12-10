@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Create</h1>
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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Role</h3>
                        </div>
                       @include('admin.message.message')
                        <form action="{{route('admin.role.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Permissions</label>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"  id="checkPermissionAll" value="1">
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    @php $i = 1; @endphp
                                    @foreach($permission_groups as $group)
                                        <hr>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"  id="{{$i}}Management" value="{{$group->name}}" onclick="checkPermissionByGroups('role-{{$i}}-management-checkbox',this)">
                                                    <label class="form-check-label" for="checkPermission">{{ucfirst($group->name)}}</label>
                                                </div>
                                            </div>
                                            <div class="col-9 role-{{$i}}-management-checkbox">
                                                @php
                                                 $permissions = \App\Models\User::getpermissionsByGroupName($group->name);

                                                 $j=1;
                                                @endphp
                                                @foreach($permissions as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{$permission->id}}" value="{{$permission->name}}">
                                                        <label class="form-check-label" for="checkPermission{{$permission->id}}">{{ucfirst($permission->name)}}</label>
                                                    </div>
                                                    @php $j++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach


                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Role</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('third_party_scripts')
    <script>
        $('#checkPermissionAll').click(function () {
            if($(this).is(':checked')){
                $("input[type=checkbox]").prop('checked',true);
            }else{
                $("input[type=checkbox]").prop('checked',false);
            }
        })

        function checkPermissionByGroups(className,checkThis) {
                const  groupName = $("#"+checkThis.id);
                const classCheckBox = $('.'+className+' input');
                if(groupName.is(':checked')){
                    classCheckBox.prop('checked',true);
                }else{
                    classCheckBox.prop('checked',false);
                }
        }
    </script>
@endsection
