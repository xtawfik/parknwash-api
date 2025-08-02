<?php

namespace App\Containers\OptionCategory\Tasks;

use App\Containers\OptionCategory\Data\Repositories\OptionCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllOptionCategoriesTask extends Task
{

    protected $repository;

    public function __construct(OptionCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
