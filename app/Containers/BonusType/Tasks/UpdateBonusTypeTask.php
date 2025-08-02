<?php

namespace App\Containers\BonusType\Tasks;

use App\Containers\BonusType\Data\Repositories\BonusTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateBonusTypeTask extends Task
{

    protected $repository;

    public function __construct(BonusTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

