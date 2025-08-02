<?php

namespace App\Containers\AccDeliveryNote\Tasks;

use App\Containers\AccDeliveryNote\Data\Repositories\AccDeliveryNoteRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccDeliveryNoteTask extends Task
{

    protected $repository;

    public function __construct(AccDeliveryNoteRepository $repository)
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
