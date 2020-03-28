@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> -->
<div class="card">
    <div class="card-header">VIEW CATEGORY</div>
    <div class="card-body">
        <table id="example" class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>SN</th>
                    <td>{{$category->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$category->title}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$category->discription}}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{$category->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{$category->updated_at}}</td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>{{$category->creatorid}}</td>
                </tr>
                <tr>
                    <th>Operation</th>
                    <td>
                        <!-- {{-- view single category --}} -->
                        <!--    <a href="{{route('category.show', [$category->id])}}" class="btn btn-primary" data-toggle="tooltip" data-title="View category"><i class="fa fa-eye" style="font-size:15px;"></i> View</a>&nbsp; -->
                        <!-- {{-- edit category section --}} -->
                        <a href="{{route('category.edit', ['id'=>$category->id])}}" class="btn btn-sm btn-primary" data-title="Edit category" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;
                        <!-- {{--delete btn--}} -->
                        <a class="btn  btn-sm btn-warning" onclick="return confirm('Are you sure?')" href="{{route('category.destroy', ['id'=>$category->id])}}"><i class="fa fa-trash" style="color:red"></i> Delete</a> </td>
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