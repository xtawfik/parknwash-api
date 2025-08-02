<?php

namespace App\Containers\AccBankStatement\UI\API\Controllers;

use App\Containers\AccBankStatement\UI\API\Requests\CreateAccBankStatementRequest;
use App\Containers\AccBankStatement\UI\API\Requests\DeleteAccBankStatementRequest;
use App\Containers\AccBankStatement\UI\API\Requests\GetAllAccBankStatementsRequest;
use App\Containers\AccBankStatement\UI\API\Requests\FindAccBankStatementByIdRequest;
use App\Containers\AccBankStatement\UI\API\Requests\UpdateAccBankStatementRequest;
use App\Containers\AccBankStatement\UI\API\Transformers\AccBankStatementTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccBankStatement\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccBankStatementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccBankStatement(CreateAccBankStatementRequest $request)
    {
        $accbankstatement = Apiato::call('AccBankStatement@CreateAccBankStatementAction', [$request]);

        $this->uploadMedia( $accbankstatement, "image", true );
        $this->uploadMedia( $accbankstatement, "gallery" );
        $this->uploadMedia( $accbankstatement, "file" );

        return $this->created($this->transform($accbankstatement, AccBankStatementTransformer::class));
    }

    /**
     * @param FindAccBankStatementByIdRequest $request
     * @return array
     */
    public function findAccBankStatementById(FindAccBankStatementByIdRequest $request)
    {
        $accbankstatement = Apiato::call('AccBankStatement@FindAccBankStatementByIdAction', [$request]);

        return $this->transform($accbankstatement, AccBankStatementTransformer::class);
    }

    /**
     * @param GetAllAccBankStatementsRequest $request
     * @return array
     */
    public function getAllAccBankStatements(GetAllAccBankStatementsRequest $request)
    {
        $accbankstatements = Apiato::call('AccBankStatement@GetAllAccBankStatementsAction', [$request]);

        return $this->transform($accbankstatements, AccBankStatementTransformer::class);
    }

    /**
     * @param UpdateAccBankStatementRequest $request
     * @return array
     */
    public function updateAccBankStatement(UpdateAccBankStatementRequest $request)
    {
        $accbankstatement = Apiato::call('AccBankStatement@UpdateAccBankStatementAction', [$request]);

        $this->uploadMedia( $accbankstatement, "image", true );
        $this->uploadMedia( $accbankstatement, "gallery" );
        $this->uploadMedia( $accbankstatement, "file" );

        return $this->transform($accbankstatement, AccBankStatementTransformer::class);
    }

    /**
     * @param DeleteAccBankStatementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccBankStatement(DeleteAccBankStatementRequest $request)
    {
        Apiato::call('AccBankStatement@DeleteAccBankStatementAction', [$request]);

        return $this->noContent();
    }
}
