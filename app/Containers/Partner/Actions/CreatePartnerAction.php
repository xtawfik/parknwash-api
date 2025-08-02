<?php

namespace App\Containers\Partner\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreatePartnerAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $partner = Apiato::call('Partner@CreatePartnerTask', [$data]);

        return $partner;
    }
}
