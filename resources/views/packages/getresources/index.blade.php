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
                <div class="card-header"> <span style="font-size: 23px;">MY PACKAGES</span> 
                <a href="#" onclick="alert('We are still working on this');" class="btn btn-sm btn-primary pull-right"> <i class="fa fa-plus"></i> Request New Package</a> &nbsp;&nbsp; 
                <a href="{{route('getresource.create')}}" class="btn btn-sm btn-info"> <i class="fa fa-check"></i> Select existing Package</a></div>
                <div class="card-body">
                    <table id="myTable" class="display table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>subcategory name</th>
                                <!-- <th>Sub-Category</th> -->
                                <th>subcategory Description</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <!-- <th>Author</th> -->
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($resources) > 0 )
                            @foreach($resources as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$subcat->getSubcategory($item->subcatitemid)->sub_title}}</td>
                                <td>{{$subcat->getSubcategory($item->subcatitemid)->sub_desc}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td style="text-align:center">
                                    <!-- {{-- view single item --}} -->
                                    <a href="{{route('getresource.show', ['id'=>$item->id])}}" class="view" data-toggle="tooltip" data-title="View getresource"><i class="fa fa-eye" style="font-size:15px;"></i>View</a>&nbsp;&nbsp;
                                    <!-- {{-- edit getresource section --}} -->
                                    <!-- <a href="{{route('getresource.edit', ['id'=>$item->id])}}" class="view" data-title="Edit Resource" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i>Edit</a>&nbsp; -->
                                    <!-- {{--delete btn--}} -->
                                    <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('getresource.destroy', ['id'=>$item->id])}}"><i class="fa fa-trash" style="color:red"></i>Trash</a>

                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="alert alert-info"> <strong>No subcategory Records</strong> <a href="{{route('getresource.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Select existing Package</a></td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>subcategory name</th>
                                <!-- <th>Sub-Category</th> -->
                                <th>subcategory Description</th>
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