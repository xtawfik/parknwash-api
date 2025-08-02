<?php

namespace App\Containers\AccPurchaseQuote\Tasks;

use App\Containers\AccPurchaseQuote\Data\Repositories\AccPurchaseQuoteRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPurchaseQuoteTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

