<?php

namespace App\Containers\Vendor\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteVendorAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Vendor@DeleteVendorTask', [$request->id]);
    }
}
