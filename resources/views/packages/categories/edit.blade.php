@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		EDIT CATEGORY
	</div>
	<div class="card-body">
       <form method="post" action="{{route('category.update', $category->id)}}">
           @method('PUT')
             @csrf
            <div class="form-group row">
                <label for="cat" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                <div class="col-md-4">
                    <input id="cat" type="cat" class="form-control @error('cat') is-invalid @enderror" name="cat" value="{{ old('cat',$category->title) }}" required autocomplete="cat" autofocus>
                    @error('cat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-4">
                    <textarea cols="5" id="desc" type="desc" class="form-control @error('desc') is-invalid @enderror" name="desc"  required >{{old('desc', $category->discription)}}                      
                    </textarea>
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
                     <i class="fa fa-check"></i>  {{ __('Create Category') }}
                    </button>

                </div>
            </div>
        </form>
	</div>
	
</div>
@endsection