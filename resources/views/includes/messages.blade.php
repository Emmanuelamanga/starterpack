@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success ! </strong> {!!$message!!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- <div class="w3-container w3-green">

        <button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span>
        </button>

        <strong>{{ $message }}</strong>

</div> --}}

@endif


@if ($message = Session::get('danger'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>DANGER !</strong>{!!$message!!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- <div class="w3-container w3-red">

        <button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span>
        </button>

        <strong>{{ $message }}</strong>

</div> --}}

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>WARNING!</strong> {!!$message!!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

{{-- <div class="w3-container w3-yellow">

        <button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span>
        </button>

        <strong>{{ $message }}</strong>

</div> --}}

@endif


@if ($message = Session::get('info'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>BE INFORMED : </strong> {!!$message!!}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
{{-- <div class="w3-container w3-blue">

        <button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span>
        </button>

        <strong>{{ $message }}</strong>

</div> --}}

@endif


@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Holy guacamole ! </strong> Please check the form for errors
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

{{-- <div class="w3-container w3-red">

        <button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span>
        </button>

        Please check the form below for errors

    </div> --}}

@endif