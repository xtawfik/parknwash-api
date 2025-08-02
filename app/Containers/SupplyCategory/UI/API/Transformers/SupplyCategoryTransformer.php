<?php

namespace App\Containers\SupplyCategory\UI\API\Transformers;

use App\Containers\SupplyCategory\Models\SupplyCategory;
use App\Ship\Parents\Transformers\Transformer;

#use#

class SupplyCategoryTransformer extends Transformer
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
        #available_includes#
    ];

    /**
     * @param SupplyCategory $entity
     *
     * @return array
     */
    public function transform(SupplyCategory $entity)
    {
        $response = [
            'object' => 'SupplyCategory',
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

    #includes#
}
