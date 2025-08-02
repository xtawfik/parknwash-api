<?php

namespace App\Containers\RevenueReport\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateRevenueReportAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $revenuereport = Apiato::call('RevenueReport@CreateRevenueReportTask', [$data]);

        return $revenuereport;
    }
}
