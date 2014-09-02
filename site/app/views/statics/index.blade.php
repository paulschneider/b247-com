@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="pageSection">
	<div class="grid">
		<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
			<header class="artCol-3-3 artColFirst sectionHeader searchHeader">
				<h1 class="primaryHeader">{{ $title }}</h1>
				<h2>{{ $subHeading }}</h2>
			</header>
		</div>
	</div>

	<div class="grid">
		<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
			{{ $body }}
			{{ $bodyContinued }}
		</div>
	</div>
</section>

@endsection

@include('layouts.footer')