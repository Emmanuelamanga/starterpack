@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> -->
<div class="card">
    <div class="card-header">Dashboard</div>
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
                                <td>{{$category->creator}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="7" class="alert alert-info"> <strong>No Category Records</strong>  <a href="{{route('category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i>Create Category</a></td></tr>
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