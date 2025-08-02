<?php

namespace App\Containers\Receipt\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteReceiptAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Receipt@DeleteReceiptTask', [$request->id]);
    }
}
