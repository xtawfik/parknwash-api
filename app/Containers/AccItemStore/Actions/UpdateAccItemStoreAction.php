<?php

namespace App\Containers\AccItemStore\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccItemStoreAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $accitemstore = Apiato::call('AccItemStore@UpdateAccItemStoreTask', [$request->id, $data]);

        return $accitemstore;
    }
}
