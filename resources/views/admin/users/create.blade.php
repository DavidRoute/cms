@extends('layouts.admin')

@section('page_heading', 'Users')

@section('content')
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Add Users</h4>
		</div>
		
		<div class="panel-body">

			
			{!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'POST', 'files' => true]) !!}
				

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
					{!! Form::submit('Add Users', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>

	</div>
	
@stop

