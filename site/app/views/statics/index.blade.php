@extends('layouts.default')

@include('layouts.header')

@section('content')

	<article class="pageSection cmsContent">
		<div class="grid">
			<header class="col-16-20 colFirst tabCol-18-20 tabColFirst mobCol-18-20 mobColFirst">
				<h1 class="primaryHeader">{{ $title }}</h1>
			</header>
		</div>
		
		<hr>

		<div class="grid">
			<div class="col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">

			<div class="fr col-75 mobCol-18-20 mobColLast spacerUp">
				<h2 class="spacerUp">{{ $subHeading }}</h2>
				{{ $body }}
				{{ $bodyContinued }}
			</div>
		</div>
	</div>
	
@endsection

@include('layouts.footer')