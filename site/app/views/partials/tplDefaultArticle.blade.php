<div class="container">
 
		<div class="jumbotron">
			<h1>{{ $article['title'] }}</h1>
			<p class="lead">{{ $article['subHeading'] }}</p>
			<p><a class="btn btn-lg btn-warning" href="http://www.calvium.com" role="button">Go to calvium!</a></p>
		</div> 
 
		<table class=\"table table-striped table-bordered\">
 
		<p><a href="http://api.wf-staging.co.uk{{ $article['assignment']['channel']['path'] }}" class="hide_tablet hide_mobile btn btn-lg btn-primary" >{{ $article['assignment']['channel']['name'] }}</a>
<a href="b247://channel//{{ $article['assignment']['channel']['id'] }}" class="hide_desktop btn btn-lg btn-primary" rel="nofollow">{{ $article['assignment']['channel']['name'] }}</a>
		<p>&nbsp;</p>
 
		<p><a href="http://api.wf-staging.co.uk{{ $article['assignment']['subChannel']['path'] }}" class="btn hide_tablet hide_mobile btn-lg btn-primary">{{ $article['assignment']['subChannel']['name'] }}</a>
<a href="b247://subchannel/{{ $article['assignment']['subChannel']['id'] }}/{{ strtolower($article['displayType']['type']) }}" class="hide_desktop btn btn-lg btn-primary" rel="nofollow">{{ $article['assignment']['subChannel']['name'] }}</a>
 
		<p>&nbsp;</p>
		<p><a href="http://api.wf-staging.co.uk{{ $article['assignment']['category']['path'] }}" class="btn hide_tablet hide_mobile btn-lg btn-primary">{{ $article['assignment']['category']['name'] }}</a>
<a href="b247://category/{{ $article['assignment']['category']['id'] }}/{{ strtolower($article['displayType']['type']) }}/articles?subChannel={{ $article['assignment']['subChannel']['id'] }}" class="hide_desktop btn btn-lg btn-primary" rel="nofollow">{{ $article['assignment']['category']['name'] }}</a>
 
		<p>&nbsp;</p>
			<p><a href="http://api.wf-staging.co.uk{{ $article['path'] }}" class="btn hide_tablet hide_mobile btn-lg btn-danger">{{ $article['title'] }}</a>
<a href="b247://article?channel={{ $article['assignment']['subChannel']['id'] }}&amp;category={{ $article['assignment']['category']['id'] }}&amp;article=9999999" class="hide_desktop btn btn-lg btn-danger" rel="nofollow">{{ $article['title'] }}</a>

		<p>&nbsp;</p>

		<p><a href="http://api.wf-staging.co.uk/we-dont-have-an-endpoint-for-the-website-for-listings" class="btn hide_tablet hide_mobile btn-lg btn-danger">Test Channel Listing</a>
<a href="b247://channel/60/listing?range=day&amp;time=1404172801" class="hide_desktop btn btn-lg btn-danger" rel="nofollow">Test Channel Listing</a>

		<p>&nbsp;</p>

				<p><a href="http://api.wf-staging.co.uk/we-dont-have-an-endpoint-for-the-website-for-listings" class="btn hide_tablet hide_mobile btn-lg btn-danger">Test Category Listing</a>
<a href="b247://category/19/listing/articles?subChannel=60&amp;range=day&amp;time=1404172801" class="hide_desktop btn btn-lg btn-danger" rel="nofollow">Test Category Listing</a>

		<p>&nbsp;</p>

		<img src="http://www.entrepreneur.com/dbimages/article/h0/how-win-social-media-right-now-silly-cat-pics-dont-cut.jpg" width="305" />

		<p>&nbsp;</p>


 
		</table>
 
	</div>