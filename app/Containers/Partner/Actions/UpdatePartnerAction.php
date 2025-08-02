<?php

namespace App\Containers\Partner\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePartnerAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $partner = Apiato::call('Partner@UpdatePartnerTask', [$request->id, $data]);

        return $partner;
    }
}
