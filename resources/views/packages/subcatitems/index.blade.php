@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">AVAILABLE SUB-CATEGORY ITEMS <a href="#deleted" class="badge badge-info">Deleted</a> <a href="{{route('subcatitem.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Create Sub-Category Item</a></div>
    <div class="card-body">
        <table id="myTable" class="display table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Description</th>
                    <th>File Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                {{--Available sub-category items--}}
                @if(count($subcatitems) > 0 )
                @foreach($subcatitems as $key => $subcatitem)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->getCategory($subcat->getSubcategory($subcatitem->subcatid)->catid)->title }}</td>
                    <td>{{$subcat->getSubcategory($subcatitem->subcatid)->sub_title}}</td>
                    <td>{{$subcat->getSubcategory($subcatitem->subcatid)->sub_desc}}</td>
                    <td>{{$subcatitem->file_name}}</td>
                    <td>{{$subcatitem->created_at}}</td>
                    <td>{{$subcatitem->updated_at}}</td>
                    <td>{{$user->getUser($subcatitem->authorid)->name}}</td>
                    <td style="text-align:center">
                        <!-- {{-- view single subcatitem --}} -->
                        <a href="{{route('subcatitem.show', ['id'=> $subcatitem->id])}}" class="view" data-toggle="tooltip" data-title="View subcatitem"><i class="fa fa-eye" style="font-size:15px;"></i> View</a>&nbsp;&nbsp;
                        <!-- {{-- edit subcatitem section --}} -->
                        <a href="{{route('subcatitem.edit', ['id'=>$subcatitem->id])}}" class="view" data-title="Edit subcatitem" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;
                        <!-- {{--delete btn--}} -->
                        <a class="btn  btn-sm" onclick="return confirm('Are you sure?')" href="{{route('subcatitem.destroy', ['id'=>$subcatitem->id])}}"><i class="fa fa-trash" style="color:red"></i> Trash</a>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="alert alert-info"> <strong>No Sub-Category Item Records</strong> <a href="{{route('subcatitem.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Create Subcategory Item</a></td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Description</th>
                    <th>File Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </tfoot>
        </table>
        <!-- deleted items -->
        <span class="alert alert-primary" id="deleted">DELETED SUBCATEGORY ITEMS</span><br>
        <table id="myTable" class="display table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Description</th>
                    <th>File Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                {{--Deleetd Subcategory items--}}
                @if(count($deleteditems)>0)
                @foreach($deleteditems as $key => $delteditem)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->getCategory($subcat->getSubcategory($delteditem->subcatid)->catid)->title}}</td>
                    <td>{{$subcat->getSubcategory($delteditem->subcatid)->sub_title}}</td>
                    <td>{{$subcat->getSubcategory($delteditem->subcatid)->sub_desc}}</td>
                    <td>{{$delteditem->file_name}}</td>
                    <!-- <td>{{$delteditem->authorid}}</td> -->
                    <td>{{$delteditem->created_at}}</td>
                    <td>{{$delteditem->updated_at}}</td>
                    <td>{{$delteditem->deleted_at}}</td>
                    <!-- <td>{{$delteditem->authorid}}</td> -->
                    <td>{{$user->getUser($delteditem->authorid)->name}}</td>
                    <td style="text-align:center">
                        <a class="btn  btn-sm" onclick="return confirm('Are you sure You want to RESTORE ?')" href="{{route('subcatitem.restore', ['id'=>$delteditem->id])}}"><i class="fa fa-pencil" style="color:green"></i> Restore</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" class="alert alert-warning"> <strong>No Deleted Sub-Category Item Records</strong> </td>
                </tr>
                @endif
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Description</th>
                    <th>File Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection