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
						<tr>
							<td>{{ $post->id }}</td>
							<td class="post-photo">
								<img src="{{ $post->photo ? $post->photo->file : '/images/non_user.png' }}" alt="">
							</td>
							<td>{{ $post->title }}</td>
							<td>{{ $post->body }}</td>
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