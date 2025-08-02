<?php

namespace App\Containers\Partner\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePartnerAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Partner@DeletePartnerTask', [$request->id]);
    }
}
