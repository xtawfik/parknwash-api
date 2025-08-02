<?php

namespace App\Containers\AccDebitNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccDebitNoteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccDebitNote@DeleteAccDebitNoteTask', [$request->id]);
    }
}
