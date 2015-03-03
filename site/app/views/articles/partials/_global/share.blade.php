<input type="button" value="Share" class="activateShare primaryButton">
<ul class="shareOptions">
    <li>
        <?php // https://dev.twitter.com/web/tweet-button ?>
        <a href="https://twitter.com/share" data-text="{{ $article['title'] }}" data-url="{{ baseUrl().$article['path'] }}" class="twitter-share-button icoTwitter" target="_blank">Twitter<span></span></a>
        <!--<a href="https://twitter.com/share?text={{ $article['title'] }}&amp;url={{ baseUrl().$article['path'] }}" class="icoTwitter" target="_blank">Twitter<span></span></a>-->
    </li>
    <li>
        <div class="fb-like" data-href="{{ baseUrl().$article['path'] }}" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
        <a href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]={{ baseUrl().$article['path'] }}&amp;p[images][0]={{ $article['media']['filepath'] }}&amp;p[title]={{ $article['title'] }}&amp;p[summary]={{ str_limit(strip_tags($article['body']), $limit = 250, $end = '...') }}" class="icoFacebook" target="_blank">Facebook<span></span></a>
    </li>
    <li>
        <a href="https://plus.google.com/share?url={{ baseUrl().$article['path'] }}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" data-action="share" data-annotation="none" class="icoGooglePlus" target="_blank">Google+<span></span></a>
    </li>
    <li>
        <a href="mailto:?subject={{ $article['title'] }}&amp;body={{ baseUrl().'/'.$article['sefName'] }}" class="icoEmail">Email<span></span></a>
    </li>
</ul>