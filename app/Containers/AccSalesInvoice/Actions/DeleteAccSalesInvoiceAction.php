<?php

namespace App\Containers\AccSalesInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccSalesInvoiceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccSalesInvoice@DeleteAccSalesInvoiceTask', [$request->id]);
    }
}
