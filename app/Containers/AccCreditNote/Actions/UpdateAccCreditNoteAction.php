<?php

namespace App\Containers\AccCreditNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccCreditNoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccreditnote = Apiato::call('AccCreditNote@UpdateAccCreditNoteTask', [$request->id, $data]);

        return $acccreditnote;
    }
}
