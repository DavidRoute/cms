@extends('layouts.admin')

@section('page_heading', 'Categories')

@section('content')
	
	<div class="panel panel-primary">
		
		<div class="panel-heading">
			<strong>Add Category</strong>
		</div>

		<div class="panel-body">
			
			{!! Form::open(['action' => 'AdminCategoriesController@store', 'method' => 'POST'] ) !!}

				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}

					@if($errors->has('name'))
						<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
					@endif
				</div>				

				<div class="form-group">
					{!! Form::submit('Add Category', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>

	</div>

@stop