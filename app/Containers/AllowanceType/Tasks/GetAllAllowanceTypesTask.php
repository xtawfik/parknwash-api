<?php

namespace App\Containers\AllowanceType\Tasks;

use App\Containers\AllowanceType\Data\Repositories\AllowanceTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAllowanceTypesTask extends Task
{

    protected $repository;

    public function __construct(AllowanceTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
