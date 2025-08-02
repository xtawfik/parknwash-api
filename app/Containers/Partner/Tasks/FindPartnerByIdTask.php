<?php

namespace App\Containers\Partner\Tasks;

use App\Containers\Partner\Data\Repositories\PartnerRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindPartnerByIdTask extends Task
{

    protected $repository;

    public function __construct(PartnerRepository $repository)
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
