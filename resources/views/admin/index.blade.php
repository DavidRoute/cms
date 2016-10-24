@extends('layouts.admin')

@section('section')
	<h1 class="ph">Admin</h1>	

	@foreach($arrs as $arr)
	<!-- <div class="col-sm-6">
		<div class="panel panel-{{ $arr }}">
			<div class="panel-heading">
				Admin Page
			</div>
			<div class="panel-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div> -->	
	@endforeach	

@stop