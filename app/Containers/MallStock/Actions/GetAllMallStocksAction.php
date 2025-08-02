<?php

namespace App\Containers\MallStock\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMallStocksAction extends Action
{
    public function run(Request $request)
    {
        $mallstocks = Apiato::call('MallStock@GetAllMallStocksTask', [], ['addRequestCriteria']);

        return $mallstocks;
    }
}
