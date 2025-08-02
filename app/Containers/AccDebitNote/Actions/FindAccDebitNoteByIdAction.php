<?php

namespace App\Containers\AccDebitNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccDebitNoteByIdAction extends Action
{
    public function run(Request $request)
    {
        $accdebitnote = Apiato::call('AccDebitNote@FindAccDebitNoteByIdTask', [$request->id]);

        return $accdebitnote;
    }
}
