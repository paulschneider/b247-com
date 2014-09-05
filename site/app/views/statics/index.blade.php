@extends('layouts.default')

@include('layouts.header')

@section('content')

	<div class="advert">
		<figure>
			<a href="#">
				<img alt="Kodak" src="/i/adverts/advert-728-90-placeholder.jpg" width="100%">
			</a>
			<figcaption>
				Advertising
			</figcaption>
		</figure>
	</div>

	<article class="pageSection cmsContent">
		<div class="grid">
			<header class="col-16-20 colFirst tabCol-18-20 tabColFirst mobCol-18-20 mobColFirst">
				<h1 class="primaryHeader">{{ $title }}</h1>
			</header>
		</div>
		
		<hr>

		<div class="grid">
			<div class="col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">

				<aside class="column col-25 mobCol-18-20 mobColFirst">
					<h4>Suggested pages:</h4>
					<p>
						<a href="#">Page 1</a>
						<br />
						<a href="#">Page 2</a>
						<br />
						<a href="#">Page 3</a>
						<br />
						<a href="#">Page 4</a>
					</p>
				</aside>

			<div class="fr col-75 mobCol-18-20 mobColLast spacerUp">
				<h2 class="spacerUp">{{ $subHeading }}</h2>
				{{ $body }}
				{{ $bodyContinued }}
			</div>
		</div>
	</div>
	
@endsection

@include('layouts.footer')