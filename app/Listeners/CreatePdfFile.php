<?php

namespace App\Listeners;

use App\Events\FinishRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;
class CreatePdfFile
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
     * @param  FinishRegister  $event
     * @return void
     */
    public function handle(FinishRegister $event)
    {
             return $pdf = PDF::loadView('pdf.finishRegister', ['member' => $event->member]);
             return $pdf->save('document/testpdf.pdf');
    }
}
