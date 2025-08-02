<?php

namespace App\Containers\SupplyInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSupplyInvoicesAction extends Action
{
    public function run(Request $request)
    {
        $supplyinvoices = Apiato::call('SupplyInvoice@GetAllSupplyInvoicesTask', [], ['addRequestCriteria']);

        return $supplyinvoices;
    }
}
