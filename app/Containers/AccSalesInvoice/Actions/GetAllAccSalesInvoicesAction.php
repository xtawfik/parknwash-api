<?php

namespace App\Containers\AccSalesInvoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccSalesInvoicesAction extends Action
{
    public function run(Request $request)
    {
        $accsalesinvoices = Apiato::call('AccSalesInvoice@GetAllAccSalesInvoicesTask', [], ['addRequestCriteria']);

        return $accsalesinvoices;
    }
}
