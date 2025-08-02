<?php

namespace App\Containers\Bonus\Tasks;

use App\Containers\Bonus\Data\Repositories\BonusRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateBonusTask extends Task
{

    protected $repository;

    public function __construct(BonusRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

