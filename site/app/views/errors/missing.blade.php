@extends('layouts.default')

@include('layouts.header')

@section('content')

<section class="pageSection">
	<div class="grid">
		<div class="bodyContent column col-12-20 colSpacing4 mobColFirst mobCol-18-20">
		    <header class="centralHeader grid">
		        <h1 class="primaryHeader">Hmmm.... You shouldn't be here.</h1>
		    </header>

			<h3>The page, content or resource you are looking for has either been moved, deleted, doesn't exist, has never existed or you just plain got the URL wrong.</h3>
			<br />
			<h4>Try again!!</h4>
		</div>
	</div>
</section>

@endsection

@include('layouts.footer')