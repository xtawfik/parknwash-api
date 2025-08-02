<?php

namespace App\Containers\AccAccountCategory\Tasks;

use App\Containers\AccAccountCategory\Data\Repositories\AccAccountCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccAccountCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccAccountCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

