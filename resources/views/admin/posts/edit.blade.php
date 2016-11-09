@extends('layouts.admin')

@section('page_heading', 'Posts')
	
@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<strong>Edit Posts</strong>
		</div>

		<div class="panel-body">
			
			{!! Form::model($post, ['action' => ['AdminPostsController@update', $post->id], 'method' =>'PATCH', 'files' => true ]) !!}

				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					{!! Form::label('title', 'Title:') !!}
					{!! Form::text('title', null, ['class' => 'form-control']) !!}

					@if($errors->has('title'))
						<span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
					@endif
				</div>			

				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
					{!! Form::label('category_id', 'Category:') !!}
					{!! Form::select('category_id', [''=> 'Select Category'] + $categories, null, ['class' => 'form-control']) !!}

					@if($errors->has('category_id'))				
						<span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('photo_id') ? 'has-error' : '' }}">
					{!! Form::label('photo_id', 'Photo:') !!}
					{!! Form::file('photo_id') !!}

					@if($errors->has('photo_id'))
						<span class="help-block"><strong>{{ $errors->first('photo_id') }}</strong></span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
					{!! Form::label('body', 'Description:') !!}
					{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

					@if($errors->has('body'))
						<span class="help-block"><strong>{{ $errors->first('body') }}</strong></span>
					@endif
				</div>

				<div class="form-group">
					{!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}

		</div>
	</div>	

@stop