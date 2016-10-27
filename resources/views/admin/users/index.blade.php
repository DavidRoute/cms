@extends('layouts.admin')

@section('page_heading', 'Users')

@section('content')
	
	<div class="panel panel-primary">

		<div class="panel-heading">
			<strong>View All Users</strong>
		</div>

		<div class="panel-body">
			
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Status</th>
							<th>Created Date</th>
							<th>Modified Date</th>
						</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
						<tr class="action">
							<td>{{ $user->id }}</td>
							<td class="user-photo">
								<img src="{{ $user->photo ? $user->photo->file : '/images/non_user.png'}}" alt="">
							</td>
							<td>
								<a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a>
									
								<div class="part">
									<a href="{{ route('admin.users.edit', $user->id) }}"> Edit</a> | 
									
									{!! Form::open(['action'=> ['AdminUsersController@destroy', $user->id], 'method'=>'DELETE']) !!}
										
										{!! Form::submit('Delete', ['class'=>'btn btn-link', 'id'=>'btn-del', 'onclick'=>'return confirm("Are you Sure")']) !!}

									{!! Form::close() !!}
								</div>
							</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role->name }}</td>
							<td>{{ $user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
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