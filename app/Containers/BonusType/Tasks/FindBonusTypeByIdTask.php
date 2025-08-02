<?php

namespace App\Containers\BonusType\Tasks;

use App\Containers\BonusType\Data\Repositories\BonusTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindBonusTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(BonusTypeRepository $repository)
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
