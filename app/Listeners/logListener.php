<?php

namespace App\Listeners;

use App\Events\logEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use DB;
class logListener
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
     * @param  \App\Events\logEvent  $event
     * @return void
     */
    public function handle(logEvent $event)
    {
        //
         $tarih=date('d.m.Y H:i:s');
         DB::table('logs')->insert([
            'aciklama' => $tarih.' - update isteği gönderildi',
            
        ]);
    }
}
