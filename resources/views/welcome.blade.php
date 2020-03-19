@extends('layouts.app')
@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
   		 $('#myTable').DataTable();
	});
</script>
@endsection
@section('content')
we l com 
@endsection