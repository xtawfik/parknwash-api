<?php

namespace App\Containers\CustodyData\UI\API\Transformers;

use App\Containers\CustodyData\Models\CustodyData;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\CustodyCategory\UI\API\Transformers\CustodyCategoryTransformer;


class CustodyDataTransformer extends Transformer
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
        'category',

    ];

    /**
     * @param CustodyData $entity
     *
     * @return array
     */
    public function transform(CustodyData $entity)
    {
        $response = [
            'object' => 'CustodyData',
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

    	public function includeCategory( CustodyData $item ) {
		return $this->item( $item->category, new CustodyCategoryTransformer() );
	}


}
