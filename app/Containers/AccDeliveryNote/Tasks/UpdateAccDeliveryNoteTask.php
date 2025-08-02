<?php

namespace App\Containers\AccDeliveryNote\Tasks;

use App\Containers\AccDeliveryNote\Data\Repositories\AccDeliveryNoteRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccDeliveryNoteTask extends Task
{

    protected $repository;

    public function __construct(AccDeliveryNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

