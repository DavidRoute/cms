@extends('layouts.admin')

@section('page_heading', 'Users')

@section('content')

	<div class="col-sm-2">
		<img src="{{ $user->photo ? $user->photo->file : '/images/non_user.png' }}" class="img-responsive img-rounded">
	</div>
	
	<div class="col-sm-10">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Edit Users</strong>
			</div>
			
			<div class="panel-body">
				
				{!! Form::model( $user, ['action' => ['AdminUsersController@update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

					<div class="form-group {{ $errors->has('name') ? 'has-error': '' }}" >
						{!! Form::label('name', 'Name:') !!}					
						{!! Form::text('name', null, ['class' => "form-control"]) !!}

						@if ($errors->has('name'))
	                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
	                    @endif
					</div>

					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						{!! Form::label('email', 'Email:') !!}					
						{!! Form::text('email', null, ['class' => "form-control"]) !!}					

						@if($errors->has('email'))
							<sapn class="help-block"><strong>{{ $errors->first('email') }}</strong></sapn>
						@endif
					</div>

					<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
						{!! Form::label('role_id', 'Role:') !!}
						{!! Form::select('role_id', ['' => 'Choose Option'] + $roles, null, ['class' => 'form-control']) !!}

						@if($errors->has('role_id'))
							<span class="help-block"><strong>{{ $errors->first('role_id') }}</strong></span>
						@endif
					</div>	

					<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
						{!! Form::label('is_active', 'Status:') !!}
						{!! Form::select('is_active', [
								'' => '------Choose Status-------',
								1 => 'Active',
								0 => 'Not Active',
							], null, ['class' => 'form-control']) 
						!!}

						@if($errors->has('is_active'))
							<span class="help-block"><strong>{{ $errors->first('is_active') }}</strong></span>
						@endif
					</div>		

					<div class="form-group {{ $errors->has('photo_id') ? 'has-error' : '' }}">
						{!! Form::label('photo_id', 'Choose Photo:') !!}
						{!! Form::file('photo_id') !!}

						@if($errors->has('photo_id'))
							<span class="help-block"><strong>{{ $errors->first('photo_id') }}</strong></span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						{!! Form::label('password', 'Password:') !!}
						{!! Form::password('password', ['class' => 'form-control']) !!}

						@if($errors->has('password'))
							<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
						@endif
					</div>										

					<div class="form-group">
						{!! Form::submit('Update Users', ['class' => 'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
			</div>

		</div>

	</div>
	
@stop

