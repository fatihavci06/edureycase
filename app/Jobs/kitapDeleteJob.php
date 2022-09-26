<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use App\Models\Kitap;

class kitapDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $kitap;
    public function __construct($kitap)
    {
        //
         
           $this->kitap=$kitap;
          
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
         
         $kitap=$this->kitap;
         $sil=Kitap::find($kitap->id);
         $sil->delete();

    }
}
