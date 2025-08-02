<?php

namespace App\Containers\AccCurrencyExchange\Tasks;

use App\Containers\AccCurrencyExchange\Data\Repositories\AccCurrencyExchangeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCurrencyExchangeByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCurrencyExchangeRepository $repository)
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
