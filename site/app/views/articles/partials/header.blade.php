<div class="grid">

	<header class="col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-18-20 mobColFirst">
	    <h1 class="primaryHeader"><span class="subPrimaryHeader">{{ $article['assignment']['category']['name'] }}:</span> {{ $article['title'] }}</h1>
	    <p class="backTo">
	        Back to: <a href="{{ $article['assignment']['category']['path'] }}">{{ $article['assignment']['category']['name'] }}</a>
	        <span class="fr">
	            <a href="{{ isset($navigation['previous']['article']['path']) ? $navigation['previous']['article']['path'] : '/no-where' }}">< previous article</a>
	            &nbsp; | &nbsp;
	            <a href="{{ isset($navigation['next']['article']['path']) ? $navigation['next']['article']['path'] : '/no-where' }}">next article ></a>
	        </span>
	    </p>
	</header>

</div>

 <hr>