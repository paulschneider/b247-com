<div class="advert">
    <figure>
        <a href="{{ $adverts[0]['url'] }}">
            <img alt="{{ $adverts[0]['media']['alt'] }}" src="{{ $adverts[0]['media']['filepath'] }}" width="100%">
        </a>
        <figcaption>
            Advertising
        </figcaption>
    </figure>
</div>

<article class="pageSection cmsContent">
    <div class="grid">
        <header class="col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-18-20 mobColFirst">
            <h1 class="primaryHeader">
                <span class="subPrimaryHeader">{{ $article['assignment']['category']['name'] }}:</span> {{ $article['title'] }}
                </h1>
            <p class="backTo">
                Back to: <a href="{{ $article['assignment']['category']['path'] }}">{{ $article['assignment']['category']['name'] }}</a>
                <span class="fr">
                    <a href="#">< previous article</a>
                        &nbsp; | &nbsp;
                    <a href="#">next article ></a>
                </span>
            </p>
        </header>
    </div>
    <hr>
    <div class="grid">
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            <div class="fr col-75 mobCol-20-20 carouselContainer">
                <div class="galleryLarge">
                    <div class="carouselSingleGallery">
                        <div class="gallerySlides">
                            <div>
                                <img alt="" src="/a/i/gallery/large.jpg">
                            </div>
                        </div>
                        <div class="gallerySlides">
                            <div>
                                <img alt="" src="/a/i/gallery/large.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <aside class="column col-25 mobCol-18-20 mobColFirst">
            <h5>Location</h5>
            <p>{{ $article['venue']['name'] }}<br>
            {{ $article['venue']['address1'] }}<br>
            @if( !empty( $article['venue']['address2'] ) )
                {{ $article['venue']['address2'] }}<br>
            @endif 
            @if( !empty( $article['venue']['address3'] ) )
                {{ $article['venue']['address3'] }}<br>
            @endif  
            Bristol, <a href="#">{{ $article['venue']['postcode'] }}</a>
            </p>

    @if ( !empty($article['venue']['website']) )
        <h5>Website</h5>
        <p>
        <a href="{{ $article['venue']['website'] }}">{{ $article['venue']['website'] }}</a>
        </p>
    @endif

    @if ( !empty($article['venue']['twitter']) )
        <h5>Twitter</h5>
        <p>
        <a href="#">@{{ $article['venue']['twitter'] }}</a>
        </p>
    @endif

    @if ( !empty($article['venue']['email']) )
        <h5>Email</h5>
        <p>
        <a href="mailto:{{ $article['venue']['email'] }}">{{ $article['venue']['email'] }}</a>
        </p>
    @endif

    @if ( !empty($article['venue']['phone']) )
        <h5>Phone</h5>
        <p>
        {{ $article['venue']['phone'] }}
        </p>
    @endif

        <input type="button" value="Share" class="primaryButton">
    </aside>

    <div class="fr col-75 mobCol-18-20 mobColLast">
        <div>
            <h2>{{ $article['subHeading'] }}</h2>
            <p class="author">Author, 00.00.00</p>

            {{ $article['body'] }}
        </div>
    </div>

    <div class="advert">
        <figure>
            <a href="#">
                <img alt="Kodak" src="/a/i/adverts/advert-728-90-placeholder.jpg" width="100%">
            </a>
            <figcaption>
                Advertising
            </figcaption>
        </figure>
    </div>

    <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">

    <div class="mapContainer">
        <img src="a/i/placeholders/map.jpg">
    </div>

    <blockquote>
    <h3>"Nulla sed justo lobortis, interdum nulla at, ultrices dui. Aenean quis augue nisl. Suspendisse mollis, est ac auctor consectetur."</h3>
    <footer><h5>Joe Bloggs</h5></footer>
    </blockquote>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut tempus mauris. Etiam risus enim, cursus ut nulla a, scelerisque ornare enim. Ut magna sed <a href="#">tempor commodo arcu ut</a> aliquet. Donec at lacus auctor, dictum lacus ornare, hendrerit enim. Proin viverra, odio et varius porttitor, dolor nisl mollis magna, sit amet iaculis augue metus sed sem. Suspendisse ac egestas lacus. In aliquam ultricies mollis, lobortis quis urna eget, mollis placerat ligula. Duis accumsan lorem nec massa condimentum ullamcorper. Cras et eros lectus.</p>

    <p>Sed magna nunc, eleifend at nunc elementum, malesuada consectetur leo. Vivamus pharetra dui ut viverra blandit. Cras feugiat consequat rutrum. Nunc vehicula tempor dolor, porttitor venenatis lectus placerat ut. Mauris bibendum ornare nisi, eget congue quam facilisis nec.</p>

    <h4>Cras sed neque quam</h4>

    <h5>Bibendum</h5>
    <p>Nulla urna: Ut congue <a href="#">Massa Cursus</a> id.</p>

    <h5>Condimentum</h5>
    <p>
    Facilisis auctor volutpat: <a href="#">Morbi condimentum</a><br>
    At eros faucibus: <a href="#">Rutrum Velit Et</a>
    </p>

    <ul class="categoryList">
    <li><a href="#">Category 1</a></li>
    <li><a href="#">Category 2</a></li>
    <li><a href="#">Category 3</a></li>
    </ul>

    </div>

    <section class="clear colFirst colLast carouselContainer">
    <div class="gallerySmallMulti">
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    <div class="gallerySlides">
    <img alt="" src="/a/i/gallery/small.jpg">
    </div>
    </div>
    </section>

    <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">
    Comments
    </div>
    </div>

    <aside class="column col-4-20 tabCol-20-20 leftColumnLine">
    <p class="secondaryHeader tabColSpacing1">Like this? You might be interested in...</p>

    <div class="carouselContainer">
    <div class="carouselArticleListSide">

    <div class="articleList">
    <div class="articleListItem column artCol-1-3 artColFirst">
    <a href="#" class="articleListSubChannel">Fashion</a>
    <div class="articleListSynopsis">
    <div class="articleListImage">
    <a href="#">
    <img alt="" src="/a/i/placeholders/articles/m/article-5.jpg">
    </a>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    <div class="articleListContent">
    <a href="#" class="articleListSubChannel">Sub-channel</a> <a class="articleListTitle" href="#">It’s sweet treats all round at Bristol Fashion Week</a>
    <p class="articleListSummary">Pastel and sorbet colours are the order of the day at Bristol Fashion Week for Spring/Summer 2014</p>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    </div>
    </div>
    <div class="articleListItem column artCol-1-3">
    <a href="#" class="articleListSubChannel">Health &amp; Fitness</a>
    <div class="articleListSynopsis">
    <div class="articleListImage">
    <a href="#">
    <img alt="" src="/a/i/placeholders/articles/m/article-6.jpg">
    </a>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    <div class="articleListContent">
    <a href="#" class="articleListSubChannel">Sub-channel</a> <a class="articleListTitle" href="#">Amanda Ramsay’s mission to battle chronic sleep disorder</a>
    <p class="articleListSummary">Little-known condition dramatically increases chance of stroke, heart disease, heart attack, morbid obesity and diabetes</p>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    </div>
    </div>
    <div class="articleListItem column artCol-1-3">
    <a href="#" class="articleListSubChannel">Motoring</a>
    <div class="articleListSynopsis">
    <div class="articleListImage">
    <a href="#">
    <img alt="" src="/a/i/placeholders/articles/m/article-7.jpg">
    </a>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    <div class="articleListContent">
    <a href="#" class="articleListSubChannel">Sub-channel</a> <a class="articleListTitle" href="#">Citroen DS3 Cabrio is a gutsy, fun convertible</a>
    <p class="articleListSummary">A five seat cabriolet with an electronically folding hood that can be operated at speeds of up to 75mph… the key benefits of the Citroen DS3 Cabrio</p>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    </div>
    </div>
    </div> <!-- .articleList -->
    <div class="articleList">
    <div class="articleListItem column artCol-1-3 artColFirst">
    <a href="#" class="articleListSubChannel">Fashion</a>
    <div class="articleListSynopsis">
    <div class="articleListImage">
    <a href="#">
    <img alt="" src="/a/i/placeholders/articles/m/article-5.jpg">
    </a>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    <div class="articleListContent">
    <a href="#" class="articleListSubChannel">Sub-channel</a> <a class="articleListTitle" href="#">It’s sweet treats all round at Bristol Fashion Week</a>
    <p class="articleListSummary">Pastel and sorbet colours are the order of the day at Bristol Fashion Week for Spring/Summer 2014</p>
    <a href="#" class="articleListCategories">Category</a>
    </div>
    </div>
    </div>
    </div> <!-- .articleList -->

    </div>

    </div> <!-- /.carouselContainer -->                



    </aside>

    </div>

</article>