<?php

namespace App\Containers\Vendor\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllVendorsAction extends Action
{
    public function run(Request $request)
    {
        $vendors = Apiato::call('Vendor@GetAllVendorsTask', [], ['addRequestCriteria']);

        return $vendors;
    }
}
