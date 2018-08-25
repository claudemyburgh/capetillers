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


    	$firstname = head(explode(' ', trim($event->details['name'])));


    	if (!Newsletter::isSubscribed($event->details['email']) ) {
    	    Newsletter::subscribe($event->details['email'], ['FNAME' => $firstname, 'PHONE' => $event->details['phone']]);
    	    Log::info($request->email . ' added to list');
    	}


    }
}
