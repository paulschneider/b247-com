@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="pageSection">
	<div class="grid">
		<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
		    <header class="centralHeader grid">
		        <h1 class="primaryHeader">Hmmm.... You shouldn't be here.</h1>
		    </header>

			<h3>We're really sorry, but we seem to be having some trouble finding the content you're looking for.</h3>
			<br />
			<h4>Please refresh the page. If you still see this message please <a href="{{ baseUrl() }}/contact-us">contact us</a> and quote error code 424.</h4>
		</div>
	</div>
</section>

@endsection

@include('layouts.footer')