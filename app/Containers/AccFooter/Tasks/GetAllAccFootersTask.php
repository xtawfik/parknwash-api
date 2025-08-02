<?php

namespace App\Containers\AccFooter\Tasks;

use App\Containers\AccFooter\Data\Repositories\AccFooterRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccFootersTask extends Task
{

    protected $repository;

    public function __construct(AccFooterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
