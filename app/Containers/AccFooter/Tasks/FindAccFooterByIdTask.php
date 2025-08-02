<?php

namespace App\Containers\AccFooter\Tasks;

use App\Containers\AccFooter\Data\Repositories\AccFooterRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccFooterByIdTask extends Task
{

    protected $repository;

    public function __construct(AccFooterRepository $repository)
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
