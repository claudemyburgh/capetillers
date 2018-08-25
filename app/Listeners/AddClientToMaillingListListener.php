<?php

namespace App\Listeners;

use App\Client;
use Newsletter;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddClientToMaillingListListener
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

    	if ( ! Newsletter::isSubscribed($event->details['email']) ) {
    	    Newsletter::subscribe($event->details['email']);
    	    Log::info($event->details['email'] . ' added to list');
    	}

    }
}
