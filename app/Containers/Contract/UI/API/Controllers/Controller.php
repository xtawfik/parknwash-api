<?php

namespace App\Containers\Contract\UI\API\Controllers;

use App\Containers\Contract\UI\API\Requests\CreateContractRequest;
use App\Containers\Contract\UI\API\Requests\DeleteContractRequest;
use App\Containers\Contract\UI\API\Requests\GetAllContractsRequest;
use App\Containers\Contract\UI\API\Requests\FindContractByIdRequest;
use App\Containers\Contract\UI\API\Requests\UpdateContractRequest;
use App\Containers\Contract\UI\API\Transformers\ContractTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Contract\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateContractRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createContract(CreateContractRequest $request)
    {
        $contract = Apiato::call('Contract@CreateContractAction', [$request]);

        $this->uploadMedia( $contract, "image", true );
        $this->uploadMedia( $contract, "gallery" );
        $this->uploadMedia( $contract, "file" );

        return $this->created($this->transform($contract, ContractTransformer::class));
    }

    /**
     * @param FindContractByIdRequest $request
     * @return array
     */
    public function findContractById(FindContractByIdRequest $request)
    {
        $contract = Apiato::call('Contract@FindContractByIdAction', [$request]);

        return $this->transform($contract, ContractTransformer::class);
    }

    /**
     * @param GetAllContractsRequest $request
     * @return array
     */
    public function getAllContracts(GetAllContractsRequest $request)
    {
        $contracts = Apiato::call('Contract@GetAllContractsAction', [$request]);

        return $this->transform($contracts, ContractTransformer::class);
    }

    /**
     * @param UpdateContractRequest $request
     * @return array
     */
    public function updateContract(UpdateContractRequest $request)
    {
        $contract = Apiato::call('Contract@UpdateContractAction', [$request]);

        $this->uploadMedia( $contract, "image", true );
        $this->uploadMedia( $contract, "gallery" );
        $this->uploadMedia( $contract, "file" );

        return $this->transform($contract, ContractTransformer::class);
    }

    /**
     * @param DeleteContractRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteContract(DeleteContractRequest $request)
    {
        Apiato::call('Contract@DeleteContractAction', [$request]);

        return $this->noContent();
    }
}
