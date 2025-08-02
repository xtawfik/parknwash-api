<?php

namespace App\Containers\AccCreditNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccCreditNoteByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccreditnote = Apiato::call('AccCreditNote@FindAccCreditNoteByIdTask', [$request->id]);

        return $acccreditnote;
    }
}
