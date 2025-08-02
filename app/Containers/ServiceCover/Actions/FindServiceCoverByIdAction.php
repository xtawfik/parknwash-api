<?php

namespace App\Containers\ServiceCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindServiceCoverByIdAction extends Action
{
    public function run(Request $request)
    {
        $servicecover = Apiato::call('ServiceCover@FindServiceCoverByIdTask', [$request->id]);

        return $servicecover;
    }
}
