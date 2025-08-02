<?php

namespace App\Containers\BonusType\Tasks;

use App\Containers\BonusType\Data\Repositories\BonusTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBonusTypeTask extends Task
{

    protected $repository;

    public function __construct(BonusTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

