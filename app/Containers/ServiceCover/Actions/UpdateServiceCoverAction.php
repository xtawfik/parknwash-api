<?php

namespace App\Containers\ServiceCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateServiceCoverAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $servicecover = Apiato::call('ServiceCover@UpdateServiceCoverTask', [$request->id, $data]);

        return $servicecover;
    }
}
