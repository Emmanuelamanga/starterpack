@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">AVAILABLE SUB-CATEGORIES <a href="{{route('subcategory.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Sub-Category</a></div>
    <div class="card-body">
        <table id="myTable" class="display table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @if(count($subcats) > 0 )
                @foreach($subcats as $subcategory)
                <tr>
                    <td>{{$subcategory->id}}</td>
                    <td>{{$subcategory->catid}}</td>
                    <td>{{$subcategory->sub_title}}</td>
                    <td>{{$subcategory->sub_desc}}</td>
                    <td>{{$subcategory->created_at}}</td>
                    <td>{{$subcategory->updated_at}}</td>
                    <td>{{$subcategory->sub_authorid}}</td>
                    <td style="text-align:center">
                        <!-- {{-- view single subcategory --}} -->
                        <a href="{{route('subcategory.show', ['id'=> $subcategory->id])}}" class="view" data-toggle="tooltip" data-title="View subcategory"><i class="fa fa-eye" style="font-size:15px;"></i></a>&nbsp;&nbsp;
                        <!-- {{-- edit subcategory section --}} -->
                        <a href="{{route('subcategory.edit', ['id'=>$subcategory->id])}}" class="view" data-title="Edit subcategory" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i></a>&nbsp;
                        <!-- {{--delete btn--}} -->
                        <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('subcategory.destroy', ['id'=>$subcategory->id])}}"><i class="fa fa-trash" style="color:red"></i></a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" class="alert alert-info"> <strong>No subcategory Records</strong> <a href="{{route('subcategory.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create subcategory</a></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
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