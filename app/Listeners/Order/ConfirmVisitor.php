<?php

namespace App\Listeners\Order;

use App\Events\OrderSubmitted;
use App\Mail\Order\ConfirmVisitorEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ConfirmVisitor
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
     * @param OrderSubmitted $event
     * @return void
     */
    public function handle(OrderSubmitted $event)
    {
        Mail::queue(new ConfirmVisitorEmail($event->order));
    }
}
