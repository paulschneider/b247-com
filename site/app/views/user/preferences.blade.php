@extends('layouts.default')

@include('layouts.header')

@section('content')

@include("user.partials.sub-nav")

<section>
	<header class="centralHeader grid">
		<h1 class="primaryHeader">Profile</h1>
	</header>

	<div class="grid">
		<aside class="column col-4-20 colFirst tabCol-18-20 tabColFirst mobColFirst">
			<h1 class="quinaryHeader">Customise your content</h1>
			<p class="infoText">Prioritise content from certain regions of Bristol:</p>
			<ul class="optionList">
				<li>
					<ul>
						<li><a href="#">Ashley</a></li>
						<li><a href="#">Avonmouth</a></li>
						<li><a href="#">Bedminster</a></li>
						<li class="optionOn"><a href="#">Bishopston</a></li>
						<li><a href="#">Bishopsworth</a></li>
						<li class="optionOn"><a href="#">Brislington</a></li>
						<li class="optionOn"><a href="#">Cabot</a></li>
						<li class="optionOn"><a href="#">Clifton</a></li>
						<li class="optionOn"><a href="#">Cotham</a></li>
						<li><a href="#">Easton</a></li>
						<li class="optionOn"><a href="#">Eastville</a></li>
						<li class="optionOn"><a href="#">Filwood</a></li>
						<li class="optionOn"><a href="#">Frome Vale</a></li>
						<li class="optionOn"><a href="#">Hartcliffe</a></li>
						<li><a href="#">Henbury</a></li>
						<li><a href="#">Hengrove</a></li>
						<li><a href="#">Henleaze</a></li>
						<li class="optionOn"><a href="#">Hillfields</a></li>
						<li><a href="#">Horfield</a></li>
						<li class="optionOn"><a href="#">Kingsweston</a></li>
						<li><a href="#">Knowle</a></li>
						<li><a href="#">Lawrence Hill</a></li>
						<li><a href="#">Lockleaze</a></li>
						<li class="optionOn"><a href="#">Redland</a></li>
						<li><a href="#">Southmead</a></li>
						<li class="optionOn"><a href="#">Southville</a></li>
						<li><a href="#">St George</a></li>
						<li><a href="#">Stockwood</a></li>
						<li><a href="#">Stoke Bishop</a></li>
						<li><a href="#">Westbury on Trym</a></li>
						<li><a href="#">Whitchurch Park</a></li>
						<li class="optionOn"><a href="#">Windmill Hill</a></li>
					</ul>
				</li>
			<ul>
		</aside>

		<div class="column col-12-20 colLast tabCol-18-20 tabColFirst mobColFirst">

<section class="optionBlock optionBlockOpen themeNews">
<header class="optionHeader">
<a class="optionShow" href="#">
<h1 class="primaryHeader">
<span class="icoOnOff"></span>
News &amp; Comment
</h1>
<p>Nam eget tellus eget enim scelerisque mollis eget eu massa. Nulla facilisi sed dignissim porttitor neque, eget aliquet justo cursus et.</p>
</a>
<div class="optionToggle">
<a class="optionOff" data-input="newsOption" href="#">Off</a>
<a class="optionOn" data-input="newsOption" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="newsOption" type="checkbox" value="0" name="newsOption">
</form>
</header>
<div class="optionContent">
<div class="optionRegional">
<p>
<span>Regional settings for this channel are</span>
<span class="optionToggle optionToggleOn">
<a class="optionOff" data-input="newsRegionalOption" href="#">Off</a>
<a class="optionOn" data-input="newsRegionalOption" href="#">On</a>
</span>
</p>
<form class="hidden" action="" method="">
<input id="newsRegionalOption" type="checkbox" value="0" name="newsRegionalOption">
</form>
</div>
<div class="optionSubchannels">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Restaurants</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Bars</a></li>
<li><span class="icoVis"></span><a href="#">Chefs</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Recipes</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Listings</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Offers &amp; Comps</a></li>
<li><span class="icoVis"></span><a href="#">Guide</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionCategory">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Accumsan Massa</a></li>
<li><span class="icoVis"></span><a href="#">Augue</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Condimentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Consectetur</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Dapibus Laoreet</a></li>
<li><span class="icoVis"></span><a href="#">Diam</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Elementum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Fermentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Libero</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Maecenas</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Morbi</a></li>
<li><span class="icoVis"></span><a href="#">Nam enim Augue</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Pellentesque Habitant</a></li>
<li><span class="icoVis"></span><a href="#">Praesent</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Sodales Fem</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Turpis</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Vulputate</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionMoreGreat">
<p class="moreSectionInto">More great Food &amp; Drink</p>
<div class="carouselContainer">
<div class="moreGreatList">
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
</div>
</div> <!-- /.carouselContainer -->
</div>
</div>
</section>

<section class="optionBlock themeWhats">
<header class="optionHeader">
<a class="optionShow" href="#">
<h1 class="primaryHeader">
<span class="icoOnOff"></span>
What's On
</h1>
<p>Nam eget tellus eget enim scelerisque mollis eget eu massa. Nulla facilisi sed dignissim porttitor neque, eget aliquet justo cursus et.</p>
</a>
<div class="optionToggle">
<a class="optionOff" data-input="newsOption" href="#">Off</a>
<a class="optionOn" data-input="newsOption" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="newsOption" type="checkbox" value="0" name="newsOption">
</form>
</header>
<div class="optionContent">
<div class="optionRegional">
<p>
<span>Regional settings for this channel are</span>
<span class="optionToggle optionToggleOn">
<a class="optionOff" data-input="newsRegionalOption" href="#">Off</a>
<a class="optionOn" data-input="newsRegionalOption" href="#">On</a>
</span>
</p>
<form class="hidden" action="" method="">
<input id="newsRegionalOption" type="checkbox" value="0" name="newsRegionalOption">
</form>
</div>
<div class="optionSubchannels">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Restaurants</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Bars</a></li>
<li><span class="icoVis"></span><a href="#">Chefs</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Recipes</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Listings</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Offers &amp; Comps</a></li>
<li><span class="icoVis"></span><a href="#">Guide</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionCategory">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Accumsan Massa</a></li>
<li><span class="icoVis"></span><a href="#">Augue</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Condimentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Consectetur</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Dapibus Laoreet</a></li>
<li><span class="icoVis"></span><a href="#">Diam</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Elementum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Fermentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Libero</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Maecenas</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Morbi</a></li>
<li><span class="icoVis"></span><a href="#">Nam enim Augue</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Pellentesque Habitant</a></li>
<li><span class="icoVis"></span><a href="#">Praesent</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Sodales Fem</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Turpis</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Vulputate</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionMoreGreat">
<p class="moreSectionInto">More great Food &amp; Drink</p>
<div class="carouselContainer">
<div class="moreGreatList">
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
</div>
</div> <!-- /.carouselContainer -->
</div>
</div>
</section>

<section class="optionBlock themeCulture">
<header class="optionHeader">
<a class="optionShow" href="#">
<h1 class="primaryHeader">
<span class="icoOnOff"></span>
Culture
</h1>
<p>Nam eget tellus eget enim scelerisque mollis eget eu massa. Nulla facilisi sed dignissim porttitor neque, eget aliquet justo cursus et.</p>
</a>
<div class="optionToggle">
<a class="optionOff" data-input="newsOption" href="#">Off</a>
<a class="optionOn" data-input="newsOption" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="newsOption" type="checkbox" value="0" name="newsOption">
</form>
</header>
<div class="optionContent">
<div class="optionRegional">
<p>
<span>Regional settings for this channel are</span>
<span class="optionToggle optionToggleOn">
<a class="optionOff" data-input="newsRegionalOption" href="#">Off</a>
<a class="optionOn" data-input="newsRegionalOption" href="#">On</a>
</span>
</p>
<form class="hidden" action="" method="">
<input id="newsRegionalOption" type="checkbox" value="0" name="newsRegionalOption">
</form>
</div>
<div class="optionSubchannels">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Restaurants</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Bars</a></li>
<li><span class="icoVis"></span><a href="#">Chefs</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Recipes</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Listings</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Offers &amp; Comps</a></li>
<li><span class="icoVis"></span><a href="#">Guide</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionCategory">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Accumsan Massa</a></li>
<li><span class="icoVis"></span><a href="#">Augue</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Condimentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Consectetur</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Dapibus Laoreet</a></li>
<li><span class="icoVis"></span><a href="#">Diam</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Elementum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Fermentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Libero</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Maecenas</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Morbi</a></li>
<li><span class="icoVis"></span><a href="#">Nam enim Augue</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Pellentesque Habitant</a></li>
<li><span class="icoVis"></span><a href="#">Praesent</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Sodales Fem</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Turpis</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Vulputate</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionMoreGreat">
<p class="moreSectionInto">More great Food &amp; Drink</p>
<div class="carouselContainer">
<div class="moreGreatList">
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
</div>
</div> <!-- /.carouselContainer -->
</div>
</div>
</section>

<section class="optionBlock themeFood">
<header class="optionHeader">
<a class="optionShow" href="#">
<h1 class="primaryHeader">
<span class="icoOnOff"></span>
Food &amp; Drink
</h1>
<p>Nam eget tellus eget enim scelerisque mollis eget eu massa. Nulla facilisi sed dignissim porttitor neque, eget aliquet justo cursus et.</p>
</a>
<div class="optionToggle">
<a class="optionOff" data-input="newsOption" href="#">Off</a>
<a class="optionOn" data-input="newsOption" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="newsOption" type="checkbox" value="0" name="newsOption">
</form>
</header>
<div class="optionContent">
<div class="optionRegional">
<p>
<span>Regional settings for this channel are</span>
<span class="optionToggle optionToggleOn">
<a class="optionOff" data-input="newsRegionalOption" href="#">Off</a>
<a class="optionOn" data-input="newsRegionalOption" href="#">On</a>
</span>
</p>
<form class="hidden" action="" method="">
<input id="newsRegionalOption" type="checkbox" value="0" name="newsRegionalOption">
</form>
</div>
<div class="optionSubchannels">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Restaurants</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Bars</a></li>
<li><span class="icoVis"></span><a href="#">Chefs</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Recipes</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Listings</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Offers &amp; Comps</a></li>
<li><span class="icoVis"></span><a href="#">Guide</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionCategory">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Accumsan Massa</a></li>
<li><span class="icoVis"></span><a href="#">Augue</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Condimentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Consectetur</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Dapibus Laoreet</a></li>
<li><span class="icoVis"></span><a href="#">Diam</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Elementum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Fermentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Libero</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Maecenas</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Morbi</a></li>
<li><span class="icoVis"></span><a href="#">Nam enim Augue</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Pellentesque Habitant</a></li>
<li><span class="icoVis"></span><a href="#">Praesent</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Sodales Fem</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Turpis</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Vulputate</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionMoreGreat">
<p class="moreSectionInto">More great Food &amp; Drink</p>
<div class="carouselContainer">
<div class="moreGreatList">
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
</div>
</div> <!-- /.carouselContainer -->
</div>
</div>
</section>

<section class="optionBlock themeLife">
<header class="optionHeader">
<a class="optionShow" href="#">
<h1 class="primaryHeader">
<span class="icoOnOff"></span>
Lifestyle
</h1>
<p>Nam eget tellus eget enim scelerisque mollis eget eu massa. Nulla facilisi sed dignissim porttitor neque, eget aliquet justo cursus et.</p>
</a>
<div class="optionToggle">
<a class="optionOff" data-input="newsOption" href="#">Off</a>
<a class="optionOn" data-input="newsOption" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="newsOption" type="checkbox" value="0" name="newsOption">
</form>
</header>
<div class="optionContent">
<div class="optionRegional">
<p>
<span>Regional settings for this channel are</span>
<span class="optionToggle optionToggleOn">
<a class="optionOff" data-input="newsRegionalOption" href="#">Off</a>
<a class="optionOn" data-input="newsRegionalOption" href="#">On</a>
</span>
</p>
<form class="hidden" action="" method="">
<input id="newsRegionalOption" type="checkbox" value="0" name="newsRegionalOption">
</form>
</div>
<div class="optionSubchannels">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Restaurants</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Bars</a></li>
<li><span class="icoVis"></span><a href="#">Chefs</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Recipes</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Listings</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Offers &amp; Comps</a></li>
<li><span class="icoVis"></span><a href="#">Guide</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionCategory">
<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
<ul class="optionList">
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Accumsan Massa</a></li>
<li><span class="icoVis"></span><a href="#">Augue</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Condimentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Consectetur</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Dapibus Laoreet</a></li>
<li><span class="icoVis"></span><a href="#">Diam</a></li>
</ul>
</li>
<li>
<ul>
<li class="optionOn"><span class="icoVis"></span><a href="#">Elementum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Fermentum</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Libero</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Maecenas</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Morbi</a></li>
<li><span class="icoVis"></span><a href="#">Nam enim Augue</a></li>
</ul>
</li>
<li>
<ul>
<li><span class="icoVis"></span><a href="#">Pellentesque Habitant</a></li>
<li><span class="icoVis"></span><a href="#">Praesent</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Sodales Fem</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Turpis</a></li>
<li class="optionOn"><span class="icoVis"></span><a href="#">Vulputate</a></li>
</ul>
</li>
</ul>
</div>
<div class="optionMoreGreat">
<p class="moreSectionInto">More great Food &amp; Drink</p>
<div class="carouselContainer">
<div class="moreGreatList">
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
<div class="articleList">
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
<a class="optionOn" data-input="moreGreat1" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
</form>
</div>
</div>
<div class="column col-10-20 mobCol-18-20 mobColFirst">
<h3 class="tertiaryHeader">Feature 1</h3>
<div class="moreFeatureBox">
<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
<div class="optionToggle">
<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
<a class="optionOn" data-input="moreGreat2" href="#">On</a>
</div>
<form class="hidden" action="" method="">
<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
</form>                                
</div>
</div>
</div> <!-- .articleList -->
</div>
</div> <!-- /.carouselContainer -->
</div>
</div>
</section>

</div>

</div>

</section>




@include("user.partials.sub-nav") 

@endsection

@include('layouts.footer')