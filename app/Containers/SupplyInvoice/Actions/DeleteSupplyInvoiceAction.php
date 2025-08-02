<?php

namespace App\Containers\SupplyInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSupplyInvoiceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('SupplyInvoice@DeleteSupplyInvoiceTask', [$request->id]);
    }
}
