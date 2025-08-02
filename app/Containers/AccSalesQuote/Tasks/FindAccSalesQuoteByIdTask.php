<?php

namespace App\Containers\AccSalesQuote\Tasks;

use App\Containers\AccSalesQuote\Data\Repositories\AccSalesQuoteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccSalesQuoteByIdTask extends Task
{

    protected $repository;

    public function __construct(AccSalesQuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
