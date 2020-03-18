@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        CREATE SUB-CATEGORY
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('subcategory.store') }}">
            @csrf
            <!-- category -->
            <div class="form-group row">
                <label for="cat" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                <div class="col-md-4">
                <select id="cat" type="cat" class="form-control @error('cat') is-invalid @enderror" name="cat" value="{{ old('cat') }}" required autocomplete="cat" autofocus>
                        <option value="" selected disabled>Select Category</option>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        @else
                        <div class="alert alert-info">No categories <a href="{{route('category.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Add </div>
                        @endif
                    </select>
                    @error('cat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- classes -->
             <div class="form-group row">
                <label for="grp" class="col-md-4 col-form-label text-md-right">{{ __('
                Select Class') }}</label>
                <div class="col-md-4">
                <select id="grp" class="form-control @error('grp') is-invalid @enderror" name="grp" value="{{ old('grp') }}" required autocomplete="grp" autofocus>
                        <option value="" selected disabled>Select Class</option>
                        <option value="1">Form 4</option>
                    </select>
                    @error('grp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- sub-category name -->
            <div class="form-group row">
                <label for="subcat" class="col-md-4 col-form-label text-md-right">{{ __('Sub-Category Name') }}</label>
                <div class="col-md-4">
                    <input id="subcat" type="subcat" class="form-control @error('subcat') is-invalid @enderror" name="subcat" value="{{ old('subcat') }}" required autocomplete="subcat" autofocus>
                    @error('subcat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- description -->
            <div class="form-group row">
                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-4">
                    <textarea cols="5" id="desc" type="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" required ></textarea>
                    @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-success">
                     <i class="fa fa-check"></i>  {{ __('Create Sub-Category') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection