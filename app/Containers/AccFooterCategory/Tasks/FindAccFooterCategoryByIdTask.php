<?php

namespace App\Containers\AccFooterCategory\Tasks;

use App\Containers\AccFooterCategory\Data\Repositories\AccFooterCategoryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccFooterCategoryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccFooterCategoryRepository $repository)
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
