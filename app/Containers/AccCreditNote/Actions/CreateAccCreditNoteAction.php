<?php

namespace App\Containers\AccCreditNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccCreditNoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $acccreditnote = Apiato::call('AccCreditNote@CreateAccCreditNoteTask', [$data]);

        return $acccreditnote;
    }
}
