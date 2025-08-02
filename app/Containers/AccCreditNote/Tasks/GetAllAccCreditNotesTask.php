<?php

namespace App\Containers\AccCreditNote\Tasks;

use App\Containers\AccCreditNote\Data\Repositories\AccCreditNoteRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccCreditNotesTask extends Task
{

    protected $repository;

    public function __construct(AccCreditNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
