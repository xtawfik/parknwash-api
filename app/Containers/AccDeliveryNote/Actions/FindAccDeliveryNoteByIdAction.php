<?php

namespace App\Containers\AccDeliveryNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccDeliveryNoteByIdAction extends Action
{
    public function run(Request $request)
    {
        $accdeliverynote = Apiato::call('AccDeliveryNote@FindAccDeliveryNoteByIdTask', [$request->id]);

        return $accdeliverynote;
    }
}
