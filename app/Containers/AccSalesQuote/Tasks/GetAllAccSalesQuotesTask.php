<?php

namespace App\Containers\AccSalesQuote\Tasks;

use App\Containers\AccSalesQuote\Data\Repositories\AccSalesQuoteRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccSalesQuotesTask extends Task
{

    protected $repository;

    public function __construct(AccSalesQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
