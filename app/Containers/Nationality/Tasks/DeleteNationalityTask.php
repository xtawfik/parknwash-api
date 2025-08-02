<?php

namespace App\Containers\Nationality\Tasks;

use App\Containers\Nationality\Data\Repositories\NationalityRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteNationalityTask extends Task
{

    protected $repository;

    public function __construct(NationalityRepository $repository)
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
