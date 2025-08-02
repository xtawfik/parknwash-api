<?php

namespace App\Containers\AccSpecialAccount\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccSpecialAccountAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccSpecialAccount@DeleteAccSpecialAccountTask', [$request->id]);
    }
}
