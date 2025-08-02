<?php

namespace App\Containers\AccPayslipItem\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccPayslipItemAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccPayslipItem@DeleteAccPayslipItemTask', [$request->id]);
    }
}
