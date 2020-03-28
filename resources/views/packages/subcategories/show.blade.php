@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">VIEW SUB-CATEGORY</div>
    <div class="card-body">
        <table id="example" class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>SN</th>
                    <td>{{$subcat->id}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$subcat->catid}}</td>
                </tr>
                <tr>
                    <th>Sub-Category</th>
                    <td>{{$subcat->sub_title}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$subcat->sub_desc}}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{$subcat->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{$subcat->updated_at}}</td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>{{$subcat->sub_authorid}}</td>
                </tr>
                <tr>
                    <th>Operation</th>
                    <td>
                        <a href="{{route('subcategory.edit', ['id'=>$subcat->id])}}" class="btn btn-sm btn-primary" data-title="Edit subcat" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;

                        <a class="btn  btn-sm btn-warning" onclick="return confirm('Are you sure?')" href="{{route('subcategory.destroy', ['id'=>$subcat->id])}}"><i class="fa fa-trash" style="color:red"></i> Delete</a> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection