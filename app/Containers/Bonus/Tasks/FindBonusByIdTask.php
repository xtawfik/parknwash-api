<?php

namespace App\Containers\Bonus\Tasks;

use App\Containers\Bonus\Data\Repositories\BonusRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindBonusByIdTask extends Task
{

    protected $repository;

    public function __construct(BonusRepository $repository)
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
