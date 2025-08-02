<?php

namespace App\Containers\ServiceCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteServiceCoverAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ServiceCover@DeleteServiceCoverTask', [$request->id]);
    }
}
