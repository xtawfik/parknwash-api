<?php

namespace App\Containers\AccCurrencyCurrency\Tasks;

use App\Containers\AccCurrencyCurrency\Data\Repositories\AccCurrencyCurrencyRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccCurrencyCurrencyTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyCurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
