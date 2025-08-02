<?php

namespace App\Containers\AccControlType\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccControlTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $acccontroltype = Apiato::call('AccControlType@FindAccControlTypeByIdTask', [$request->id]);

        return $acccontroltype;
    }
}
