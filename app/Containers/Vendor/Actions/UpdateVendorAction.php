<?php

namespace App\Containers\Vendor\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateVendorAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $vendor = Apiato::call('Vendor@UpdateVendorTask', [$request->id, $data]);

        return $vendor;
    }
}
