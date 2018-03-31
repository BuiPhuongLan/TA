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
					<a href="" class="list-group-item"><span  aria-hidden="true"></span> View result </a>
                </div>
                
			</div>

			<div class="col-md-1">
			</div>

			<div class="col-md-8">
			@yield("setup")					  
			</div>
				
		</div>
	</div>
</section>
</div>
@endsection
