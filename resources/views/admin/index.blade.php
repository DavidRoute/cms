@extends('layouts.admin')

@if(Auth::user()->role->name == 'administrator')	

	@section('page_heading', 'Welcome Admin')

@elseif(Auth::user()->role->name == 'subscriber')

	@section('page_heading', 'Welcome subscriber')

@elseif(Auth::user()->role->name == 'author')

	@section('page_heading', 'Welcome Author')

@endif

@section('content')	
	
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
@stop


		
	
