<?php

namespace App\Containers\AccCashFlow\UI\API\Transformers;

use App\Containers\AccCashFlow\Models\AccCashFlow;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCashFlowType\UI\API\Transformers\AccCashFlowTypeTransformer;


class AccCashFlowTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'cash_flow_type',

    ];

    /**
     * @param AccCashFlow $entity
     *
     * @return array
     */
    public function transform(AccCashFlow $entity)
    {
        $response = [
            'object' => 'AccCashFlow',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        // Get values of fillables
        $response = $this->fillables( $entity, $response );

        $response = $this->withMedia( $entity, $response, "image" );
        $response = $this->withMedia( $entity, $response, "gallery" );
        $response = $this->withMedia( $entity, $response, "file" );

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    	public function includeCashFlowType( AccCashFlow $item ) {
		return $this->item( $item->cash_flow_type, new AccCashFlowTypeTransformer() );
	}


}
