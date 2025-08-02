<?php

namespace App\Containers\AccCreditNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccCreditNoteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccCreditNote@DeleteAccCreditNoteTask', [$request->id]);
    }
}
