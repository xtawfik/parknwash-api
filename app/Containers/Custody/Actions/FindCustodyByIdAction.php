<?php

namespace App\Containers\Custody\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCustodyByIdAction extends Action
{
    public function run(Request $request)
    {
        $custody = Apiato::call('Custody@FindCustodyByIdTask', [$request->id]);

        return $custody;
    }
}
