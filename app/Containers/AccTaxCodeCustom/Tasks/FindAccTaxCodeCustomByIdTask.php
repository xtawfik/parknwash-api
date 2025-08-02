<?php

namespace App\Containers\AccTaxCodeCustom\Tasks;

use App\Containers\AccTaxCodeCustom\Data\Repositories\AccTaxCodeCustomRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccTaxCodeCustomByIdTask extends Task
{

    protected $repository;

    public function __construct(AccTaxCodeCustomRepository $repository)
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
