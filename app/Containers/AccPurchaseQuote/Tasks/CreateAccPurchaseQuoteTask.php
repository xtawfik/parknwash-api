<?php

namespace App\Containers\AccPurchaseQuote\Tasks;

use App\Containers\AccPurchaseQuote\Data\Repositories\AccPurchaseQuoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPurchaseQuoteTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

