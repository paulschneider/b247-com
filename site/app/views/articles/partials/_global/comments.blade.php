<div id="comments-block" class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">
    @if( ! $isMobile )    
        <div id="disqus_thread"></div>
        <script type="text/javascript">

            var disqus_shortname = "<?php echo $_ENV['DISQUS_SHORTNAME'] ?>";
            var disqus_identifier = "article-<?php echo $article['id'] ?>";       
            
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>    
    @endif
</div>