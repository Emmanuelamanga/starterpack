@extends('layouts.app')
@section('scripts')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{route('admin.home')}}">
                                    <div class="card-header">HOME</div>
                                </a>
                                <!-- <div class="card-body"></div> -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{route('category.index')}}">
                                    <div class="card-header">CATEGORY</div>
                                </a>
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{route('subcategory.index')}}">
                                    <div class="card-header">SUB-CATEGORY</div>
                                </a>
                                <div class="card-body"> </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{route('subcatitem.index')}}">
                                    <div class="card-header">SUB-CATEGORY ITEM</div>
                                </a>
                                <div class="card-body"> </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{route('materialgroup.index')}}">
                                    <div class="card-header">CLASSROOM</div>
                                </a>
                                <div class="card-body"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{route('user.index')}}">
                                    <div class="card-header">USER</div>
                                </a>
                                <div class="card-body"> </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-header">STATS</div>
                                </a>
                                <div class="card-body"> </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <a href="">
                                    <div class="card-header">BLOGS</div>
                                </a>
                                <div class="card-body"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection