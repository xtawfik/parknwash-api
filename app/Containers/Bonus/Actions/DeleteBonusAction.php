<?php

namespace App\Containers\Bonus\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBonusAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Bonus@DeleteBonusTask', [$request->id]);
    }
}
