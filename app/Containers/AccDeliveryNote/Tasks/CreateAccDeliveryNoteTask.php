<?php

namespace App\Containers\AccDeliveryNote\Tasks;

use App\Containers\AccDeliveryNote\Data\Repositories\AccDeliveryNoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccDeliveryNoteTask extends Task
{

    protected $repository;

    public function __construct(AccDeliveryNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

