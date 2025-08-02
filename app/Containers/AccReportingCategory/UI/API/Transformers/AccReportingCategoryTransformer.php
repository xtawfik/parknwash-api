<?php

namespace App\Containers\AccReportingCategory\UI\API\Transformers;

use App\Containers\AccReportingCategory\Models\AccReportingCategory;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccReportingCategoryType\UI\API\Transformers\AccReportingCategoryTypeTransformer;


class AccReportingCategoryTransformer extends Transformer
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
'category',

    ];

    /**
     * @param AccReportingCategory $entity
     *
     * @return array
     */
    public function transform(AccReportingCategory $entity)
    {
        $response = [
            'object' => 'AccReportingCategory',
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

    	public function includeUser( AccReportingCategory $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeCategory( AccReportingCategory $item ) {
		return $this->item( $item->category, new AccReportingCategoryTypeTransformer() );
	}


}
