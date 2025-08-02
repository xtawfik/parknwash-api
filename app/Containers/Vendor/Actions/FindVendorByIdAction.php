<?php

namespace App\Containers\Vendor\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindVendorByIdAction extends Action
{
    public function run(Request $request)
    {
        $vendor = Apiato::call('Vendor@FindVendorByIdTask', [$request->id]);

        return $vendor;
    }
}
