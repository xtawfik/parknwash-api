<?php

namespace App\Containers\AccSalesInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccSalesInvoiceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accsalesinvoice = Apiato::call('AccSalesInvoice@UpdateAccSalesInvoiceTask', [$request->id, $data]);

        return $accsalesinvoice;
    }
}
