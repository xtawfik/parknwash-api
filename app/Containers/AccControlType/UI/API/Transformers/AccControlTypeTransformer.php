<?php

namespace App\Containers\AccControlType\UI\API\Transformers;

use App\Containers\AccControlType\Models\AccControlType;
use App\Ship\Parents\Transformers\Transformer;

#use#

class AccControlTypeTransformer extends Transformer
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
     * @param AccControlType $entity
     *
     * @return array
     */
    public function transform(AccControlType $entity)
    {
        $response = [
            'object' => 'AccControlType',
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
