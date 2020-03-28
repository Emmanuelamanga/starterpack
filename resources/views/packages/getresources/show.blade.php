@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center"><strong class="">Title :</strong> {{$subcat->getSubcategory($item->id)->sub_title ?? 'No Title'}} <strong>&nbsp;&nbsp; Description : </strong>{{$subcat->getSubcategory($item->id)->sub_desc ?? 'No Description'}}</div>
    <div class="card-body">
        <!-- <table id="example" class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>SN</th>
                    <td>{{$item->id}}</td>
                </tr>
                 <tr><th>Classroom Name</th><td>{{$errors->room_name}}</td></tr> -->
        <!-- <tr>
                    <th>Description</th>
                    <td>{{$item->file_name}}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{$item->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{$item->updated_at}}</td>
                </tr> -->
        <!-- <tr><th>Author</th><td>{{$item->room_authorid}}</td></tr> -->
        <!-- <tr>
                    <th>Operation</th>
                    <td>
                        <a href="{{route('materialgroup.edit', ['id'=>$item->id])}}" class="btn btn-sm btn-primary" data-title="Edit materialGroup" data-toggle="tooltip"><i class="fa fa-edit" style="font-size:15px;"></i> Edit</a>&nbsp;
                       {{--delete btn--}} 
                        <a class="btn  btn-sm btn-warning" onclick="return confirm('Are you sure?')" href="{{route('getresource.destroy', ['id'=>$item->id])}}"><i class="fa fa-trash" style="color:red"></i> Delete</a> </td>
                </tr>
            </tbody>
        </table> -->

        <object data="{{Storage::url('storage/materials/'.$item->file_name)}}" style="border:1px solid #666CCC" margin="auto" ; height="1100" width="100%" type="application/pdf">
            <!-- <embed src="{{asset('storage/materials/'.$item->file_name)}}" margin="auto" width="100%" height="1100"> </embed> -->
            <iframe id="" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="{{Storage::url('materials/'.$item->file_name)}}" frameborder="2" scrolling="auto" height="1100" width="100%"></iframe>

        </object>
        <!-- <iframe  src="{{url('/')}}/{{ Storage::disk('local')->url('materials/'.$item->file_name)}}" type="application/pdf"></iframe> -->
        {{-- @if($ext ?? '' == 'img')
            <img src="{{Storage::url('storage/materials/'.$item->file_name)}}"/>
        @elseif($ext ?? '' == 'pdf')
        <iframe src="{{Storage::url('storage/materials/'.$item->file_name)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
        @else
        <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{urlendoe(Storage::url('storage/materials/'.$item->file_name))}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
        @endif --}}

        <!-- <iframe src ="{{ asset('storage/materials/Item-1584872190.pdf') }}" width="1000px" height="600px"></iframe> -->
        <!-- </object>  -->
        <!-- <iframe src="{{asset('storage/materials/$item->file_name')}}"></iframe> -->
        <!-- <iframe id="" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="{{asset('storage/Item-1584867501.pdf')}}" frameborder="1" scrolling="auto" height="1100" width="100%"></iframe> -->
        <!-- <img src="" alt=""> -->
    </div>
</div>
@endsection