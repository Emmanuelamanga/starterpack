@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">WELCOME : </div>
		<div class="card-body">
			<p>Starter Pack is a learner turor centered system that enables learners to :
				<ul>
					<li><a href="">Request</a> Resources(New).</li>
					<li><a href="">Book</a> available resources.</li>
					<li><a href="">Access</a> Resources on site.</li>
					<li><a href="#">Download </a>resources for later use.</li>
				</ul>
			</p>
			<div class="row">
				<div class="col-md-6">
					<hr>CLASS AVAILABLE
					<hr>
					<div class="card" style="width:20%; background-color:lightcyan;border-radius:10px">
						<div class="card-header">Name </div>
					</div>
				</div>
				<div class="col-md-6">
					<hr>SUBJECTS AVAILABLE
					<hr>
					<div class="card" style="width:20%; background-color:lightcyan;border-radius:10px">
						<div class="card-header">Name </div>
					</div>
				</div>
			</div>


		</div>
		<div class="card-footer">@COVIDYEAR</div>
	</div>
</div>
@endsection