<?php

namespace App\Containers\AccTaxCodeCustom\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccTaxCodeCustomAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccTaxCodeCustom@DeleteAccTaxCodeCustomTask', [$request->id]);
    }
}
