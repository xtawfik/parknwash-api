<?php

namespace App\Containers\AccFooterCategory\Tasks;

use App\Containers\AccFooterCategory\Data\Repositories\AccFooterCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccFooterCategoryTask extends Task
{

    protected $repository;

    public function __construct(AccFooterCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
