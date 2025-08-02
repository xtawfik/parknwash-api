<?php

namespace App\Containers\OptionCategory\Tasks;

use App\Containers\OptionCategory\Data\Repositories\OptionCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteOptionCategoryTask extends Task
{

    protected $repository;

    public function __construct(OptionCategoryRepository $repository)
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
