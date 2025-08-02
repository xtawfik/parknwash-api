<?php

namespace App\Containers\Park\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllParksAction extends Action
{
    public function run(Request $request)
    {
        $parks = Apiato::call('Park@GetAllParksTask', [], ['addRequestCriteria']);

        return $parks;
    }
}
