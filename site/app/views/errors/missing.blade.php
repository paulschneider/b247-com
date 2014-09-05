@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="pageSection">
	<div class="grid">
		<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
		    <header class="centralHeader grid">
		        <h1 class="primaryHeader">Hmmm.... You shouldn't be here.</h1>
		    </header>

			<h3>We’re really sorry, but the page you were looking for has either moved or no longer exists. Use the search function to look for your content, or use the navigation bars above.</h3>
			<br />
			<h4>If you are still having trouble, then please don't hesitate to <a href="{{ baseUrl() }}/contact-us">contact us</a></h4>
		</div>
	</div>
</section>

@endsection

@include('layouts.footer')