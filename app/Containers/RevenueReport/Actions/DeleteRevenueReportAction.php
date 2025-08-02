<?php

namespace App\Containers\RevenueReport\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteRevenueReportAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('RevenueReport@DeleteRevenueReportTask', [$request->id]);
    }
}
