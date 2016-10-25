@extends('layouts.admin')

@section('page_heading', 'Users')

@section('content')
	
	<div class="panel panel-primary">

		<div class="panel-heading">
			<h4>View All Users</h4>
		</div>

		<div class="panel-body">
			
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Status</th>
							<th>Photo</th>
							<th>Created Date</th>
							<th>Modified Date</th>
						</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role->name }}</td>
							<td>{{ $user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
							<td class="user-photo">
								<img src="{{ $user->photo ? $user->photo->file : 'no user photo'}}">
							</td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->updated_at }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>

		</div>
	</div>

@stop