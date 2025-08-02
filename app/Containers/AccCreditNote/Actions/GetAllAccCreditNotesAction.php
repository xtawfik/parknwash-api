<?php

namespace App\Containers\AccCreditNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccCreditNotesAction extends Action
{
    public function run(Request $request)
    {
        $acccreditnotes = Apiato::call('AccCreditNote@GetAllAccCreditNotesTask', [], ['addRequestCriteria']);

        return $acccreditnotes;
    }
}
