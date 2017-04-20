<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendShipmentNotification implements  ShouldQueue
{
    use InteractsWithQueue;
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
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        //生成log任务，写入队列
        Log::info('This is listener queue...');

        //释放任务回队列(也就是说，当队列任务执行完后，再将该任务写入队列)
        if(true){
            $this->release(30);
        }
    }

    //处理失败任务
    public function fail(){

        $this->delete();
    }
}
