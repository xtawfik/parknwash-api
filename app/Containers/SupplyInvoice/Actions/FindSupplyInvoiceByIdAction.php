<?php

namespace App\Containers\SupplyInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSupplyInvoiceByIdAction extends Action
{
    public function run(Request $request)
    {
        $supplyinvoice = Apiato::call('SupplyInvoice@FindSupplyInvoiceByIdTask', [$request->id]);

        return $supplyinvoice;
    }
}
