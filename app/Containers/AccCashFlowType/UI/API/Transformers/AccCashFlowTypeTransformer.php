<?php

namespace App\Containers\AccCashFlowType\UI\API\Transformers;

use App\Containers\AccCashFlowType\Models\AccCashFlowType;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccCashFlow\UI\API\Transformers\AccCashFlowTransformer;


class AccCashFlowTypeTransformer extends Transformer
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
        'flows',

    ];

    /**
     * @param AccCashFlowType $entity
     *
     * @return array
     */
    public function transform(AccCashFlowType $entity)
    {
        $response = [
            'object' => 'AccCashFlowType',
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

    	public function includeFlows( AccCashFlowType $item ) {
		return $this->collection( $item->flows, new AccCashFlowTransformer() );
	}


}
