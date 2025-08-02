<?php

namespace App\Containers\AccCurrencyCurrency\Tasks;

use App\Containers\AccCurrencyCurrency\Data\Repositories\AccCurrencyCurrencyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCurrencyCurrencyByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyCurrencyRepository $repository)
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
