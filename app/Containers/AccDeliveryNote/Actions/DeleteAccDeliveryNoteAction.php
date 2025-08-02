<?php

namespace App\Containers\AccDeliveryNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccDeliveryNoteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccDeliveryNote@DeleteAccDeliveryNoteTask', [$request->id]);
    }
}
