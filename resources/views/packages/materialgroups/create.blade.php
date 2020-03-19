@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		CREATE CLASSROOM
	</div>
	<div class="card-body">
		     <form method="POST" action="{{ route('materialgroup.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="classname" class="col-md-4 col-form-label text-md-right">{{ __('Classroom Name') }}</label>
                            <div class="col-md-4">
                                <input id="classname" type="classname" class="form-control @error('classname') is-invalid @enderror" name="classname" value="{{ old('classname') }}" required placeholder="e.g Form Four or Class Eight" autofocus>
                                @error('classname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-4">
                                <textarea cols="5" id="desc" type="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" required placeholder="For Primary pupils aged 13-14"></textarea>
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
                                 <i class="fa fa-check"></i>  {{ __('Create Classroom') }}
                                </button>

                            </div>
                        </div>
                    </form>
	</div>
	
</div>
@endsection