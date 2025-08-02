<?php

namespace App\Containers\AccFooterCategory\Tasks;

use App\Containers\AccFooterCategory\Data\Repositories\AccFooterCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccFooterCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccFooterCategoryRepository $repository)
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

