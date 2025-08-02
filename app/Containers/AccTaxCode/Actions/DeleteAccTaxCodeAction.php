<?php

namespace App\Containers\AccTaxCode\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccTaxCodeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccTaxCode@DeleteAccTaxCodeTask', [$request->id]);
    }
}
