<?php
App::bind('ApiClient', function($app)
{
    return new Bristol247\Api\Client\Caller;
});