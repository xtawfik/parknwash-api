<?php

namespace App\Containers\RevenueReport\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateRevenueReportAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $revenuereport = Apiato::call('RevenueReport@UpdateRevenueReportTask', [$request->id, $data]);

        return $revenuereport;
    }
}
