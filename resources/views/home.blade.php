@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- login acknowledgement -->
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header"> <span style="font-size: 23px;">MY RESOURCES</span> <a href="#" onclick="alert('We are working on this')" class="btn btn-sm btn-primary pull-right"> <i class="fa fa-plus"></i> Request New Package</a> &nbsp;&nbsp; <a href="{{route('getresource.create')}}" class="btn btn-sm btn-info"> <i class="fa fa-check"></i> Select existing Package</a></div>
                <div class="card-body">
                    <table id="myTable" class="display table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>package name</th>
                                <!-- <th>Sub-Category</th> -->
                                <!-- <th>Description</th> -->
                                <th>Created</th>
                                <th>Updated</th>
                                <!-- <th>Author</th> -->
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($resources) > 0 )
                            @foreach($resources as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subcatitemid}}</td>
                                <!-- <td>{{$item->sub_title}}</td> -->
                                <!-- <td>{{$item->sub_desc}}</td> -->
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <!-- <td>{{$item->sub_authorid}}</td> -->
                                <td style="text-align:center">
                                    <!-- {{-- view single item --}} -->
                                    <a href="{{route('getresource.show', ['id'=> $item->id])}}" class="view" data-toggle="tooltip" data-title="View getresource"><i class="fa fa-eye" style="font-size:15px;"></i></a>&nbsp;&nbsp;
                                    <!-- {{-- edit getresource section --}} -->
                                    <!-- <a href="{{route('getresource.edit', ['id'=>$item->id])}}" class="view" data-title="Edit Resource" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i></a>&nbsp; -->
                                    <!-- {{--delete btn--}} -->
                                    <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('getresource.destroy', ['id'=>$item->id])}}"><i class="fa fa-trash" style="color:red"></i></a>

                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="alert alert-info"> <strong>No Resources Found</strong> <a href="{{route('getresource.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Request An Existing Resource</a></td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>pacage name</th>
                                <!-- <th>Sub-Category</th> -->
                                <!-- <th>Description</th> -->
                                <th>Created</th>
                                <th>Updated</th>
                                <!-- <th>Author</th> -->
                                <th>Operation</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection