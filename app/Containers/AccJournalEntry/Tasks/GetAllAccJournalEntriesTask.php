<?php

namespace App\Containers\AccJournalEntry\Tasks;

use App\Containers\AccJournalEntry\Data\Repositories\AccJournalEntryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccJournalEntriesTask extends Task
{

    protected $repository;

    public function __construct(AccJournalEntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
