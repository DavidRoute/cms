@if(session('info'))
	
	<div class="alert alert-success fade in">

		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

		{{ session('info') }}		

	</div>

@endif