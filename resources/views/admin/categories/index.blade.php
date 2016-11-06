@extends('layouts.admin')

@section('page_heading', 'Categories')

@section('content')

	@include('common.success')
		
	<div class="panel panel-primary">

		<div class="panel-heading">
			<strong>View All Categories</strong>
		</div>

		<div class="panel-body">			
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Created Date</th>
							<th>Modified Date</th>
						</tr>
					</thead>
					
					<tbody>
					@if($categories)
						@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>{{ $category->created_at }}</td>
							<td>{{ $category->updated_at }}</td>
						</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>		

		</div>
	</div>	

@stop