<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       
        cache()->forget('articles');
        $post= \App\Models\Post::with('category','user')->orderBy('created_at','desc')->take(20)->get();
        cache()->forever('articles',$post);
        
       
        
    }
}
