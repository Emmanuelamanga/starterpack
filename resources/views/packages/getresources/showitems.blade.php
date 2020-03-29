@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"> <span style="font-size: 23px;">AVAILABLE ITEMS</span></div>

    <div class="card-body">
        <form method="post" action="{{route('getresource.store')}}">
            {!! csrf_field() !!}
            <table id="myTable" class="display table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>CATEGORY</th>
                        <th>SUBCATEGORY</th>
                        <th>DESCRIPTION</th>
                        <th>SELECT</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($items) > 0 )
                    @foreach($items as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$cat->getcategory($subcat->getsubcategory($item->catid)->catid)->title}}</td>
                        <td>{{$subcat->getsubcategory($item->catid)->sub_title}}</td>
                        <td>{{$subcat->getsubcategory($item->catid)->sub_desc}}</td>
                        <td><input type="checkbox" class="form-control" value="{{$item->id}}" name="item[]"></td>
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
                        <th>CATEGORY</th>
                        <th>SUBCATEGORY</th>
                        <th>DESCRIPTION</th>
                        <th>SELECT</th>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-success pull-right">
                <i class="fa fa-check"></i> {{ __('Process') }}
            </button>
        </form>
    </div>
</div>
@endsection