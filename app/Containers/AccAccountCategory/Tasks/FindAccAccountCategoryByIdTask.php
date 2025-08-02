<?php

namespace App\Containers\AccAccountCategory\Tasks;

use App\Containers\AccAccountCategory\Data\Repositories\AccAccountCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccAccountCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccAccountCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
