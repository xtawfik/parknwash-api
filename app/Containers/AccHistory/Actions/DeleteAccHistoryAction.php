<?php

namespace App\Containers\AccHistory\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccHistoryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccHistory@DeleteAccHistoryTask', [$request->id]);
    }
}
