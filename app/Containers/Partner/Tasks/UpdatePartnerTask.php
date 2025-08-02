<?php

namespace App\Containers\Partner\Tasks;

use App\Containers\Partner\Data\Repositories\PartnerRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePartnerTask extends Task
{

    protected $repository;

    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

