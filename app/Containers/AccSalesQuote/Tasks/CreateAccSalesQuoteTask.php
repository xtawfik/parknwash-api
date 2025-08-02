<?php

namespace App\Containers\AccSalesQuote\Tasks;

use App\Containers\AccSalesQuote\Data\Repositories\AccSalesQuoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccSalesQuoteTask extends Task
{

    protected $repository;

    public function __construct(AccSalesQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

