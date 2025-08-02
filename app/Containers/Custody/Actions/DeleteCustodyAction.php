<?php

namespace App\Containers\Custody\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCustodyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Custody@DeleteCustodyTask', [$request->id]);
    }
}
