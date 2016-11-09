@extends('layouts.admin')

@section('page_heading', 'Posts')
	
@section('content')
	
	@include('common.success')

	<div class="panel panel-primary">
		
		<div class="panel-heading">
			<strong>View All Posts</strong>
		</div>

		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Photo</th>
							<th>Title</th>
							<th>Content</th>
							<th>Owner</th>
							<th>Category</th>																		
							<th>Created Date</th>
							<th>Modified Date</th>
						</tr>
					</thead>

					<tbody>
					@if($posts)
						@foreach($posts as $post)
						<tr class="action">
							<td>{{ $post->id }}</td>
							<td class="post-photo">
								<img src="{{ $post->photo ? $post->photo->file : '/images/non_user.png' }}" alt="">
							</td>
							<td>
								<a href="{{ route('admin.posts.edit', $post->id) }}">
									<strong>{{ $post->title }}</strong>
								<a>

								<div class="part">
									<a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>

									{!! Form::open(['action' => ['AdminPostsController@destroy', $post->id], 'method' => 'DELETE']) !!}	
										{!! Form::submit('Delete', ['class' => 'btn btn-link', 'id' => 'btn-del', 'onclick' => 'return confirm("Are You Sure");']) !!}
									{!! Form::close() !!}
								</div>
							</td>
							<td>{{ str_limit($post->body, 15) }}</td>
							<td>{{ $post->user->name }}</td>
							<td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>																					
							<td>{{ $post->created_at }}</td>
							<td>{{ $post->updated_at }}</td>
						</tr>
						@endforeach
					@endif
					</tbody>
				</table>	
			</div>			
		</div>

	</div>

@stop