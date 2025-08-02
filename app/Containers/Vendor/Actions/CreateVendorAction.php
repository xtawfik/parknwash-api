<?php

namespace App\Containers\Vendor\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateVendorAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $vendor = Apiato::call('Vendor@CreateVendorTask', [$data]);

        return $vendor;
    }
}
