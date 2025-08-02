<?php

namespace App\Containers\Allowance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAllowanceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Allowance@DeleteAllowanceTask', [$request->id]);
    }
}
