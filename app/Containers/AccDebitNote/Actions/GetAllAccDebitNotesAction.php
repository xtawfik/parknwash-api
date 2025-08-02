<?php

namespace App\Containers\AccDebitNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccDebitNotesAction extends Action
{
    public function run(Request $request)
    {
        $accdebitnotes = Apiato::call('AccDebitNote@GetAllAccDebitNotesTask', [], ['addRequestCriteria']);

        return $accdebitnotes;
    }
}
