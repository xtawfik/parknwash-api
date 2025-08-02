<?php

namespace App\Containers\AccItemStore\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccItemStoreAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccItemStore@DeleteAccItemStoreTask', [$request->id]);
    }
}
