<?php

namespace App\Jobs\GenerateCatalog;


class GenerateCatalogMainJob extends AbstractJob
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->debug('start');

        GenerateCatalogCacheJob::dispatchNow();

        $chainPrice = $this->getChainPrices();

        $chainMain = [
            new GenerateCategoriesJob(),
            new GenerateDeliveriesJob(),
            new GeneratePointsJob()
        ];

        $chainLast = [new ArchiveUploadsJob(),
            new SendPriceRequestJob()];
        $chain = array_merge($chainPrice, $chainMain, $chainLast);

        GenerateGoodsFileJob::withChain($chain)->dispatch();

        $this->debug('finish');
    }

    protected function getChainPrices()
    {
        $result = [];
        $products = collect([1, 2, 3, 4, 5]);
        $fileNum = 1;

        foreach ($products->chunk(1) as $chunk) {
            $result[] = new GeneratePricesFileChunkJob($chunk, $fileNum);
        }
        return $result;
    }
}
