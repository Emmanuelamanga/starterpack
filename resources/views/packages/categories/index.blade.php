@extends('layouts.app')

@section('scripts')

@endsection
@section('content')
<div class="card">
    <div class="card-header">AVAILABLE SUBJECT CATEGORIES <a href="{{route('category.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Category</a></div>
    <div class="card-body">
        <table id="myTable" class="display table table-bordered table-condensed table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @if(count($categories) > 0 )
                @foreach($categories as $key => $category)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->discription}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>{{$user->getuser($category->creatorid)->name}}</td>
                    <td style="text-align:center">
                        <!-- {{-- view single category --}} -->
                        <a href="{{route('category.show', ['id'=>$category->id])}}" class="view" data-toggle="tooltip" data-title="View category"><i class="fa fa-eye" style="font-size:15px;"></i> View</a>&nbsp;&nbsp;
                        <!-- {{-- edit category section --}} -->
                        <a href="{{route('category.edit', ['id'=>$category->id])}}" class="view" data-title="Edit category" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;
                        <!-- {{--delete btn--}} -->
                        <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('category.destroy', ['id'=>$category->id])}}"><i class="fa fa-trash" style="color:red"></i> Trash</a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="alert alert-info"> <strong>No Category Records</strong> <a href="{{route('category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create Category</a></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Title</th>
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