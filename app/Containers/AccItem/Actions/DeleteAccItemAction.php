<?php

namespace App\Containers\AccItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccItem@DeleteAccItemTask', [$request->id]);
    }
}
