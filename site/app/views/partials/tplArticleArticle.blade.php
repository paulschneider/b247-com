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
        <header class="col-16-20 colFirst tabCol-18-20 tabColFirst mobCol-18-20 mobColFirst">
            <h1 class="primaryHeader">{{ $article['title'] }}</h1>
        </header>
    </div>

    <hr>

    <div class="grid">
        <div class="col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
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
    <h4>H4: Cras sed neque quam</h4>
    <h5>H5: Bibendum</h5>
    <p>Nulla urna: Ut congue <a href="#">Massa Cursus</a></p>
    <h5>H5: Condimentum</h5>
    <p>Facilisis auctor volutpat: <a href="#">Morbi condimentum</a></p>
    <p>At eros faucibus:</p>
    <p><a href="#">Rutrum Velit Et</a></p>
    <input type="button" value="Share" class="primaryButton">
</aside>
                
            <div class="fr col-75 mobCol-18-20 mobColLast">
                <h2>{{ $article['subHeading'] }}</h2>
                <p class="author">Author, {{ dateFormat($article['published']) }}</p>
                <p>{{ $article['body'] }}</p>
            </div>
                
                <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">
                  <div class="videoContainer">
                    <iframe src="//www.youtube.com/embed/_FxsDywrADA" frameborder="0" allowfullscreen></iframe>
                  </div>
                  
                  <blockquote>
                    <h3>"H3: Nulla sed justo lobortis, interdum nulla at, ultrices dui. Aenean quis augue nisl. Suspendisse mollis, est ac auctor consectetur."</h3>
                    <footer><h5>H5: Joe Bloggs</h5></footer>
                  </blockquote>
                  
                  <p>Body copy: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut tempus mauris. Etiam risus enim, cursus ut nulla a, scelerisque ornare enim. Ut congue, tortor sed porta vulputate, est leo vehicula diam, id pharetra arcu tortor sed libero. Sed ante elit, pretium sed volutpat at, hendrerit eu nulla. In vitae eleifend massa. Integer id posuere neque, eu aliquam turpis. Nulla et pretium tellus, sed faucibus magna sed <a href="#">Link: commodo aliquet</a>. Donec at lacus auctor, dictum lacus ornare, hendrerit enim. Proin viverra, odio et varius porttitor, dolor nisl mollis magna, sit amet iaculis augue metus sed sem. Suspendisse ac egestas lacus. In aliquam ultricies mollis, lobortis quis urna eget, mollis placerat ligula. Duis accumsan lorem nec massa condimentum ullamcorper. Cras et eros lectus.</p>

                  <p><strong>Bold: Sed magna nunc, eleifend at nunc elementum</strong>. Malesuada consectetur leo. Vivamus pharetra dui ut viverra blandit. <strike>Strikethrough: Cras feugiat consequat rutrum.</strike> Nunc vehicula tempor dolor, porttitor venenatis lectus placerat ut. Mauris bibendum ornare nisi, eget congue quam facilisis nec.</p>

                  <h3>H3: Numbered list</h3>
                  <ol>
                    <li>Suspendisse ac egestas lacus</li>
                    <li>In aliquam ultricies mollisiaculis augue metus sed sem, suspendisse ac egestas lacus cras placerat</li>
                    <li>Lobortis quis urna eget</li>
                  </ol>

                  <h3>H3: Bulleted list</h3>
                  <ul>
                    <li>Mollis placerat ligula</li>
                    <li>Duis accumsan lorem nec massa condimentum ullamcorper, dui ut viverra blandit, cras feugiat consequat rutrum</li>
                    <li>Magna, sit amet iaculis augue</li>
                  </ul>
                              
                  <ul class="categoryList">
                    <li><a href="#">Category 1</a></li>
                    <li><a href="#">Category 2</a></li>
                    <li><a href="#">Category 3</a></li>
                  </ul>
                  
                </div>
              </div>
            </div>
             
          </section>
          
          <section class="pageSection grid">
            <div class="col-10-20 colSpacing3 tabCol-14-20 carouselContainer">
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
            </div>
          </section>
