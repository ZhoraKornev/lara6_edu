<?php
//
//                       _oo0oo_
//                      o8888888o
//                      88" . "88
//                      (| -_- |)
//                      0\  =  /0
//                    ___/`---'\___
//                  .' \\|     |// '.
//                 / \\|||  :  |||// \
   //             / _||||| -:- |||||- \
  //            |   | \\\  -  /// |   |
  //            | \_|  ''\---/''  |_/ |
  //            \  .-\__  '-'  ___/-. /
  //          ___'. .'  /--.--\  `. .'___
  //       ."" '<  `.___\_<|>_/___.' >' "".
  //      | | :  `- \`.;`\ _ /`;.`/ - ` : | |
  //      \  \ `_.   \_ __\ /__ _/   .-` /  /
  //  =====`-.____`.___ \_____/___.-`___.-'=====
//                       `=---='
//
//
//  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//
//            God Bless         No Bugs
//
namespace App\Jobs\GenerateCatalog;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ReflectionProperty;

abstract class AbstractJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->onQueue('generate-catalog');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->debug('done');
    }

    protected function debug(string $msg)
    {
        $class = static::class;
        $msg = $msg."[{$class}]";
        \Log::info($msg);
    }
}
