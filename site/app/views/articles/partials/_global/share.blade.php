<div class="share-it">Share
    <div class="share-it-open">
        <a href="http://www.facebook.com/sharer.php?u={{ baseUrl().$article['path'] }}" target="_blank" onclick="return popitup('http://www.facebook.com/sharer.php?u={{ baseUrl().$article['path'] }}')" >
            <img src="{{ assetPath() }}a/i/icons/share-facebook.png" alt="Facebook" width="55"/>
        </a>
        <a href="http://twitter.com/share?url={{ baseUrl().$article['path'] }}&amp;text={{ $article['title'] }}" target="_blank" onclick="return popitup('http://twitter.com/share?url={{ baseUrl().$article['path'] }}&amp;text={{ $article['title'] }}')">
            <img src="{{ assetPath() }}a/i/icons/share-twitter.png" alt="Twitter"  width="55"/>
        </a>
        <a href="https://plus.google.com/share?url={{ baseUrl().$article['path'] }}" target="_blank" onclick="return popitup('https://plus.google.com/share?url={{ baseUrl().$article['path'] }}')">
            <img src="{{ assetPath() }}a/i/icons/share-google.png" alt="Google" width="55"/>
        </a>
    </div>
</div>