@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> -->
<div class="card">
    <div class="card-header">Dashboard <a href="{{route('category.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Category</a></div>
        <div class="card-body">
            <table id="example"class="table table-bordered table-condensed table-striped">
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
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->discription}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td>{{$category->creatorid}}</td>
                                <td style="text-align:center">
    <!-- {{-- view single category --}} -->
   <a href="{{route('category.show', [$category->id])}}" class="view" data-toggle="tooltip" data-title="View category"><i class="fa fa-eye" style="font-size:15px;"></i></a>&nbsp;
      <!-- {{-- edit category section --}} -->
    <a href="{{route('category.edit', [$category->id])}}" class="view" data-title="Edit category" data-toggle="tooltip"><i class="far fa-pencil" style="font-size:15px;"></i></a>&nbsp;
    <!-- {{--delete btn--}} -->
    <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('category.destroy', [$category->id])}}"><i class="fa fa-trash" style="color:red"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="7" class="alert alert-info"> <strong>No Category Records</strong>  <a href="{{route('category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create Category</a></td></tr>
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
       <!--  </div>
    </div>
</div> -->

@endsection