<?php

namespace App\Containers\AccSalesQuote\Tasks;

use App\Containers\AccSalesQuote\Data\Repositories\AccSalesQuoteRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccSalesQuoteTask extends Task
{

    protected $repository;

    public function __construct(AccSalesQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

