<?php

namespace App\Containers\Custody\UI\API\Transformers;

use App\Containers\Custody\Models\Custody;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\CustodyCategory\UI\API\Transformers\CustodyCategoryTransformer;
use App\Containers\CustodyData\UI\API\Transformers\CustodyDataTransformer;


class CustodyTransformer extends Transformer
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
        'mall',
'employee',
'category',
'data',

    ];

    /**
     * @param Custody $entity
     *
     * @return array
     */
    public function transform(Custody $entity)
    {
        $response = [
            'object' => 'Custody',
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

    	public function includeMall( Custody $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeEmployee( Custody $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeCategory( Custody $item ) {
		return $this->item( $item->category, new CustodyCategoryTransformer() );
	}

	public function includeData( Custody $item ) {
		return $this->item( $item->data, new CustodyDataTransformer() );
	}


}
