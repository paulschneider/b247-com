@extends('layouts.default')

@include('layouts.header')

@section('content')

<section>
	<div class="article themeNews" >
		<div id="define-col-3" >
			<div class="art-upper" style="padding-bottom:26px;">
				<h1>{{ $content['article']['title'] }}</h1>				
			</div> 
			<span class="body">
				{{ $content['article']['body'] }}
				{{ $content['article']['bodyContinued'] }}
			</span>
		</div>
	</div>
</section>
	
@endsection

@include('layouts.footer')