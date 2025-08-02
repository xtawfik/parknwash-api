<?php

namespace App\Containers\RevenueReport\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindRevenueReportByIdAction extends Action
{
    public function run(Request $request)
    {
        $revenuereport = Apiato::call('RevenueReport@FindRevenueReportByIdTask', [$request->id]);

        return $revenuereport;
    }
}
