@extends('layouts.admin')

@section('page_heading', 'Categories')

@section('content')

	@include('common.success')

	<div class="row">
		<div class="col-md-5">
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
		</div><!-- /.col-md-6 -->
	
	@if(isset($categories))				
		<div class="col-md-7">
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
							
								@foreach($categories as $category)
								<tr class="action">
									<td>{{ $category->id }}</td>
									<td>
										<a href="{{ route('admin.categories.edit', $category->id) }}"> 
											<strong>{{ $category->name }}</strong>
										</a>

										<div class="part">
											<a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>

											{!! Form::open(['action' => ['AdminCategoriesController@destroy', $category->id], 'method' => 'DELETE']) !!}
												{!! Form::submit('Delete', ['class' => 'btn btn-link', 'id'=> 'btn-del', 'onclick' => 'return confirm("Are Your Sure")']) !!}
											{!! Form::close() !!}
										</div>
									</td>
									<td>{{ $category->created_at }}</td>
									<td>{{ $category->updated_at }}</td>									
								</tr>
								@endforeach
							
							</tbody>
						</table>
					</div>		

				</div>
			</div>	
			<!-- /. col-md-6 -->
		</div>
		<!-- /. row -->
	@endif

	</div>
	

@stop