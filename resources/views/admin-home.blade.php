@extends('layouts.app')

@section('content')

<section id="breadcrumb">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="{{url('/admin_home')}}">Admin</a>></li>
		</ol>
	</div>
</section>

<section id="main">
	<div class="container">		
		<div class="row">

			<div class="col-md-3">
                <div class="list-group">
                    <a href="{{ url('/admin_home')}}" class="list-group-item main-color-bg"><span aria-hidden="true"></span>
                        Admin
                    </a>
                    
                    <a href="{{ url('/admin_home/setup')}}" class="list-group-item"><span  aria-hidden="true"></span> Setup Question </a>
				    <a href="{{ url('/admin_home/edit_student')}}" class="list-group-item"><span  aria-hidden="true"></span> Edit Student </a>
					<a href="{{ url('/admin_home/view_result')}}" class="list-group-item"><span  aria-hidden="true"></span> View result </a>
                </div>
                
			</div>

			<div class="col-md-1">
			</div>

			<div class="col-md-8">

				{{-- @if(Session::has('flash_message'))
				<div class="alert alert-success {{Session::has('flash_message_important') ? 'alert-important' : ''}}">
						@if(Session::has('flash_message_important'))
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&time;</button>
						@endif
					{{Session::get('flash_message')}}
				</div> 
				@endif --}}

			@yield("setup")	
			
			</div>

			{{-- <script src="//code.jquery.com/jquery.js"></script>
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
			<script>
				$('div.alert').not('.alert-important').delay(3000).slideUp(300);
			</script> --}}
				
		</div>
	</div>
</section>
</div>
 
@endsection
