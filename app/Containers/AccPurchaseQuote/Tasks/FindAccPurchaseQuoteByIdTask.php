<?php

namespace App\Containers\AccPurchaseQuote\Tasks;

use App\Containers\AccPurchaseQuote\Data\Repositories\AccPurchaseQuoteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccPurchaseQuoteByIdTask extends Task
{

    protected $repository;

    public function __construct(AccPurchaseQuoteRepository $repository)
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
