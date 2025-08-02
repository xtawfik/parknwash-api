<?php

namespace App\Containers\Partner\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPartnerByIdAction extends Action
{
    public function run(Request $request)
    {
        $partner = Apiato::call('Partner@FindPartnerByIdTask', [$request->id]);

        return $partner;
    }
}
