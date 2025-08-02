<?php

namespace App\Containers\BonusType\Tasks;

use App\Containers\BonusType\Data\Repositories\BonusTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBonusTypesTask extends Task
{

    protected $repository;

    public function __construct(BonusTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
