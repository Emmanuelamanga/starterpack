@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">AVAILABLE SUB-CATEGORY ITEMS <a href="{{route('subcatitem.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Sub-Category Item</a></div>
        <div class="card-body">
            <table id="myTable" class="display table table-bordered table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <!-- <th>Category</th> -->
                            <th>Sub-Category</th>
                            <th>File Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Author</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($subcatitems) > 0 )
                        @foreach($subcatitems as $subcatitem)
                            <tr>
                                <td>{{$subcatitem->id}}</td>
                                <td>{{$subcatitem->subcatid}}</td>
                                <td>{{$subcatitem->file_name}}</td>
                                <!-- <td>{{$subcatitem->authorid}}</td> -->
                                <td>{{$subcatitem->created_at}}</td>
                                <td>{{$subcatitem->updated_at}}</td>
                                <td>{{$subcatitem->authorid}}</td>
                                <td style="text-align:center">
    <!-- {{-- view single subcatitem --}} -->
   <a href="{{route('subcatitem.show', ['id'=> $subcatitem->id])}}" class="view" data-toggle="tooltip" data-title="View subcatitem"><i class="fa fa-eye" style="font-size:15px;"></i></a>&nbsp;&nbsp;
      <!-- {{-- edit subcatitem section --}} -->
    <a href="{{route('subcatitem.edit', ['id'=>$subcatitem->id])}}" class="view" data-title="Edit subcatitem" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i></a>&nbsp;
    <!-- {{--delete btn--}} -->
    <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('subcatitem.destroy', ['id'=>$subcatitem->id])}}"><i class="fa fa-trash" style="color:red"></i></a>
    
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="7" class="alert alert-info"> <strong>No Sub-Category Item Records</strong>  <a href="{{route('subcatitem.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create Subcategory Item</a></td></tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                           <th>SN</th>
                            <!-- <th>Category</th> -->
                            <th>Sub-Category</th>
                            <th>File Name</th>
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