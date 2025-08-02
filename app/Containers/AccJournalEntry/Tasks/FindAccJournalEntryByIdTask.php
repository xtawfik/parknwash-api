<?php

namespace App\Containers\AccJournalEntry\Tasks;

use App\Containers\AccJournalEntry\Data\Repositories\AccJournalEntryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccJournalEntryByIdTask extends Task
{

    protected $repository;

    public function __construct(AccJournalEntryRepository $repository)
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
