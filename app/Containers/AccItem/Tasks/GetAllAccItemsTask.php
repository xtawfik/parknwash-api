<?php

namespace App\Containers\AccItem\Tasks;

use App\Containers\AccItem\Data\Repositories\AccItemRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccItemsTask extends Task
{

    protected $repository;

    public function __construct(AccItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
