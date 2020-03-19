@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> -->
<div class="card">
    <div class="card-header">VIEW CLASSROOM</div>
        <div class="card-body">
            <table id="example"class="table table-bordered table-condensed table-striped">
                    <thead>
                         <tr>
                             
                         </tr>
                    </thead>
                    <tbody>
                            <tr><th>SN</th><td>{{$materialGroup->id}}</td></tr>
                            <tr><th>Classroom Name</th><td>{{$materialGroup->room_name}}</td></tr>
                            <tr><th>Description</th><td>{{$materialGroup->room_desc}}</td></tr>
                            <tr><th>Created</th><td>{{$materialGroup->created_at}}</td></tr>
                            <tr><th>Updated</th> <td>{{$materialGroup->updated_at}}</td></tr>
                            <tr><th>Author</th><td>{{$materialGroup->room_authorid}}</td></tr>
                            <tr><th>Operation</th>
                                <td>
    <a href="{{route('materialgroup.edit', ['id'=>$materialGroup->id])}}" class="btn btn-sm btn-primary" data-title="Edit materialGroup" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;
    <!-- {{--delete btn--}} -->
    <a class="btn  btn-sm btn-warning" onclick="return confirm('Are you sure?')" href="{{route('materialgroup.destroy', ['id'=>$materialGroup->id])}}"><i class="fa fa-trash" style="color:red"></i> Delete</a> </td>
                            </tr>
                    </tbody>
                    <tfoot>
                       <!--  <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Author</th>
                            <th>Operation</th>
                        </tr> -->
                    </tfoot>
                </table>
         </div>
</div>
       <!--  </div>
    </div>
</div> -->

@endsection