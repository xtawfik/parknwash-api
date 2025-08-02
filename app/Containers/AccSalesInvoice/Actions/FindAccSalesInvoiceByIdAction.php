<?php

namespace App\Containers\AccSalesInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccSalesInvoiceByIdAction extends Action
{
    public function run(Request $request)
    {
        $accsalesinvoice = Apiato::call('AccSalesInvoice@FindAccSalesInvoiceByIdTask', [$request->id]);

        return $accsalesinvoice;
    }
}
