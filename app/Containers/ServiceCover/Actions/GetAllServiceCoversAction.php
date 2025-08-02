<?php

namespace App\Containers\ServiceCover\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllServiceCoversAction extends Action
{
    public function run(Request $request)
    {
        $servicecovers = Apiato::call('ServiceCover@GetAllServiceCoversTask', [], ['addRequestCriteria']);

        return $servicecovers;
    }
}
