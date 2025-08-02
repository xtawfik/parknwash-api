<?php

namespace App\Containers\AccCurrency\Tasks;

use App\Containers\AccCurrency\Data\Repositories\AccCurrencyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCurrencyByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyRepository $repository)
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
