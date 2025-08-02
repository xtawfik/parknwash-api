<?php

namespace App\Containers\RevenueReport\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllRevenueReportsAction extends Action
{
    public function run(Request $request)
    {
        $revenuereports = Apiato::call('RevenueReport@GetAllRevenueReportsTask', [], ['addRequestCriteria']);

        return $revenuereports;
    }
}
