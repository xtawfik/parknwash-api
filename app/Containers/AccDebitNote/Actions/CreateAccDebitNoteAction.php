<?php

namespace App\Containers\AccDebitNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccDebitNoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accdebitnote = Apiato::call('AccDebitNote@CreateAccDebitNoteTask', [$data]);

        return $accdebitnote;
    }
}
