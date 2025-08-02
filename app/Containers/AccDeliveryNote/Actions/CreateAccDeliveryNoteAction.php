<?php

namespace App\Containers\AccDeliveryNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccDeliveryNoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accdeliverynote = Apiato::call('AccDeliveryNote@CreateAccDeliveryNoteTask', [$data]);

        return $accdeliverynote;
    }
}
