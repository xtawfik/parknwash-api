<?php

namespace App\Containers\SupplyInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSupplyInvoiceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $supplyinvoice = Apiato::call('SupplyInvoice@UpdateSupplyInvoiceTask', [$request->id, $data]);

        return $supplyinvoice;
    }
}
