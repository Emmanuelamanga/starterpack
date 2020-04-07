@extends('layouts.app')
@section('scripts')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#cat').on('change', function() {
            var query = $(this).val();
            $.ajax({

                url: "{{ route('search') }}",

                type: "GET",

                data: {
                    'cat': query
                },

                success: function(data) {

                    // $('#country_list').html(data);
                    var len = 0;
                    if (data != null) {
                        len = data.length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {

                            var subid = data[i].id;
                            var subtitle = data[i].sub_title;
                            var classid = data[i].classid;
                            var classname = data[i].room_name;
                            var option1 = "<option value='" + subid + "'>" + subtitle + "</option>";
                            var option2 = "<option value='" + classid + "'>" + classname + "</option>";
                            $("#grp").append(option2);
                            $("#subcat").append(option1);
                        }
                    } else {
                        $("#grp").append("<option  disabled>No class For Category</option>");
                        $("#subcat").append("<option disabled><i class='alert alert-warning'>No subcategories Found</i></option>");
                    }
                }
            })
            // end of ajax call
        });


        // $(document).on('click', 'li', function(){

        //     var value = $(this).text();
        //     $('#cat').val(value);
        //     $('#country_list').html("");
        // });
    });
</script>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        CREATE SUB-CATEGORY ITEM
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('subcatitem.store') }}" enctype="multipart/form-data">
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

                    <!-- <div id="country_list"></div> -->

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
                        <!-- <option value="1">Form 4</option> -->
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
                    <!--  <input id="subcat" type="subcat" class="form-control @error('subcat') is-invalid @enderror" name="subcat" value="{{ old('subcat') }}" required autocomplete="subcat" autofocus> -->
                    <select id="subcat" class="form-control @error('subcat') is-invalid @enderror" name="subcat" value="{{ old('subcat') }}" required autocomplete="subcat" autofocus>
                        <option value="" selected disabled>Select Sub-Category</option>
                        <!-- @if(count($subcats) > 0)
                            @foreach($subcats as $subcat)
                                <option value="{{$subcat->id}}">{{$subcat->sub_title}}</option>
                            @endforeach
                        @else
                        <div class="alert alert-info">No categories <a href="{{route('category.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"> </i> Add </div>
                        @endif -->
                    </select>
                    @error('subcat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- description -->
            <div class="form-group row">
                <label for="filename" class="col-md-4 col-form-label text-md-right">{{ __('Upload File:') }}</label>
                <div class="col-md-4">
                    <input id="filename" type="file" class="form-control @error('filename') is-invalid @enderror" name="filename" required>
                    @error('filename')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> {{ __('Create Sub-Category Item') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection