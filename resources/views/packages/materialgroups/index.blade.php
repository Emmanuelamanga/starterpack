@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
<div class="card">
    <div class="card-header">AVAILABLE CLASSROOMS <a href="{{route('materialgroup.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Classroom</a></div>
    <div class="card-body">
        <table id="myTable" class="table table-bordered table-condensed table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @if(count($materialgroups) > 0 )
                @foreach($materialgroups as $mg)
                <tr>
                    <td>{{$mg->id}}</td>
                    <td>{{$mg->room_name}}</td>
                    <td>{{$mg->room_desc}}</td>
                    <td>{{$mg->created_at}}</td>
                    <td>{{$mg->updated_at}}</td>
                    <td>{{$mg->room_authorid}}</td>
                    <td style="text-align:center">
                        <!-- {{-- view single mg --}} -->
                        <a href="{{route('materialgroup.show', ['id'=>$mg->id])}}" class="view" data-toggle="tooltip" data-title="View materialgroup"><i class="fa fa-eye" style="font-size:15px;"></i></a>&nbsp;&nbsp;
                        <!-- {{-- edit materialgroup section --}} -->
                        <a href="{{route('materialgroup.edit', ['id'=>$mg->id])}}" class="view" data-title="Edit materialgroup" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i></a>&nbsp;
                        <!-- {{--delete btn--}} -->
                        <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('materialgroup.destroy', ['id'=>$mg->id])}}"><i class="fa fa-trash" style="color:red"></i></a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="alert alert-info"> <strong>No Classroom Records</strong> <a href="{{route('materialgroup.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create Classroom</a></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection