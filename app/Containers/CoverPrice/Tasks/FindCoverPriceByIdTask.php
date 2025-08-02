<?php

namespace App\Containers\CoverPrice\Tasks;

use App\Containers\CoverPrice\Data\Repositories\CoverPriceRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCoverPriceByIdTask extends Task
{

    protected $repository;

    public function __construct(CoverPriceRepository $repository)
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
