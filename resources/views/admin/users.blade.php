@extends('layouts.admin')
  
@section('content')
<div class="main-content">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-header d-block">
                <h3>Registered Users</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="order-table"
                            class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->f_name }} {{ $user->l_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a href="{{route('admin.user.delete',['id'=>$user->id])}}" class = "btn btn-danger">
                                        <i class="ik ik-trash-2"></i>
                                    </a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection