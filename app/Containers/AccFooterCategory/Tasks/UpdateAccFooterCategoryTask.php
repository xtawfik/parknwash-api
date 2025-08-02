<?php

namespace App\Containers\AccFooterCategory\Tasks;

use App\Containers\AccFooterCategory\Data\Repositories\AccFooterCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccFooterCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccFooterCategoryRepository $repository)
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

