<?php

namespace App\Containers\AccReportingCategoryType\UI\API\Transformers;

use App\Containers\AccReportingCategoryType\Models\AccReportingCategoryType;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccReportingCategoryType\UI\API\Transformers\AccReportingCategoryTypeTransformer;


class AccReportingCategoryTypeTransformer extends Transformer
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
        'user',
'types',

    ];

    /**
     * @param AccReportingCategoryType $entity
     *
     * @return array
     */
    public function transform(AccReportingCategoryType $entity)
    {
        $response = [
            'object' => 'AccReportingCategoryType',
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

    	public function includeUser( AccReportingCategoryType $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeTypes( AccReportingCategoryType $item ) {
		return $this->collection( $item->types, new AccReportingCategoryTypeTransformer() );
	}


}
