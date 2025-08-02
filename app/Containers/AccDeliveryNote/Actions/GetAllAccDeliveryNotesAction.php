<?php

namespace App\Containers\AccDeliveryNote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccDeliveryNotesAction extends Action
{
    public function run(Request $request)
    {
        $accdeliverynotes = Apiato::call('AccDeliveryNote@GetAllAccDeliveryNotesTask', [], ['addRequestCriteria']);

        return $accdeliverynotes;
    }
}
