<?php

namespace App\Containers\AccBankRule\UI\API\Controllers;

use App\Containers\AccBankRule\UI\API\Requests\CreateAccBankRuleRequest;
use App\Containers\AccBankRule\UI\API\Requests\DeleteAccBankRuleRequest;
use App\Containers\AccBankRule\UI\API\Requests\GetAllAccBankRulesRequest;
use App\Containers\AccBankRule\UI\API\Requests\FindAccBankRuleByIdRequest;
use App\Containers\AccBankRule\UI\API\Requests\UpdateAccBankRuleRequest;
use App\Containers\AccBankRule\UI\API\Transformers\AccBankRuleTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccBankRule\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccBankRuleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccBankRule(CreateAccBankRuleRequest $request)
    {
        $accbankrule = Apiato::call('AccBankRule@CreateAccBankRuleAction', [$request]);

        $this->uploadMedia( $accbankrule, "image", true );
        $this->uploadMedia( $accbankrule, "gallery" );
        $this->uploadMedia( $accbankrule, "file" );

        return $this->created($this->transform($accbankrule, AccBankRuleTransformer::class));
    }

    /**
     * @param FindAccBankRuleByIdRequest $request
     * @return array
     */
    public function findAccBankRuleById(FindAccBankRuleByIdRequest $request)
    {
        $accbankrule = Apiato::call('AccBankRule@FindAccBankRuleByIdAction', [$request]);

        return $this->transform($accbankrule, AccBankRuleTransformer::class);
    }

    /**
     * @param GetAllAccBankRulesRequest $request
     * @return array
     */
    public function getAllAccBankRules(GetAllAccBankRulesRequest $request)
    {
        $accbankrules = Apiato::call('AccBankRule@GetAllAccBankRulesAction', [$request]);

        return $this->transform($accbankrules, AccBankRuleTransformer::class);
    }

    /**
     * @param UpdateAccBankRuleRequest $request
     * @return array
     */
    public function updateAccBankRule(UpdateAccBankRuleRequest $request)
    {
        $accbankrule = Apiato::call('AccBankRule@UpdateAccBankRuleAction', [$request]);

        $this->uploadMedia( $accbankrule, "image", true );
        $this->uploadMedia( $accbankrule, "gallery" );
        $this->uploadMedia( $accbankrule, "file" );

        return $this->transform($accbankrule, AccBankRuleTransformer::class);
    }

    /**
     * @param DeleteAccBankRuleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccBankRule(DeleteAccBankRuleRequest $request)
    {
        Apiato::call('AccBankRule@DeleteAccBankRuleAction', [$request]);

        return $this->noContent();
    }
}
