<?php

namespace App\Containers\AccCreditNote\Tasks;

use App\Containers\AccCreditNote\Data\Repositories\AccCreditNoteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccCreditNoteByIdTask extends Task
{

    protected $repository;

    public function __construct(AccCreditNoteRepository $repository)
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
