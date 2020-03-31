@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">AVAILABLE USERS 
        <!-- <a href="{{route('user.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Sub-Category</a> -->
    </div>
    <div class="card-body">
        <table id="myTable" class="display table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) > 0 )
                @foreach($users as $key => $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        @if($user->is_admin) {{"Admin"}} @else {{"User"}} @endif
                    </td>
                    <td style="text-align:center">
                        <!-- {{-- view single user --}} -->
                        <a href="{{route('user.show', ['id'=>$user->id])}}" class="view" data-toggle="tooltip" data-title="View user"><i class="fa fa-eye" style="font-size:15px;"></i> View</a>&nbsp;&nbsp;
                        <!-- {{-- edit user section --}} -->
                        <a href="{{route('user.edit', ['id'=>$user->id])}}" class="view" data-title="Edit user" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;
                        <!-- {{--delete btn--}} -->
                        <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('user.destroy', ['id'=>$user->id])}}"><i class="fa fa-trash" style="color:red"></i> Trash</a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" class="alert alert-info"> <strong>No user Records</strong> <a href="{{route('user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create user</a></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                    <th>Operation</th>
            </tfoot>
        </table>
    </div>
</div>
@endsection