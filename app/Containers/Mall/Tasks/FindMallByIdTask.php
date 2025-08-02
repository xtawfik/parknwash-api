<?php

namespace App\Containers\Mall\Tasks;

use App\Containers\Mall\Data\Repositories\MallRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindMallByIdTask extends Task
{

    protected $repository;

    public function __construct(MallRepository $repository)
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
