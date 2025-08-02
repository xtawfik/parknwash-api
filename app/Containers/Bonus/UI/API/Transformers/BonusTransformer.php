<?php

namespace App\Containers\Bonus\UI\API\Transformers;

use App\Containers\Bonus\Models\Bonus;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\Mall\UI\API\Transformers\MallTransformer;
use App\Containers\Employee\UI\API\Transformers\EmployeeTransformer;
use App\Containers\BonusType\UI\API\Transformers\BonusTypeTransformer;
use App\Containers\Account\UI\API\Transformers\AccountTransformer;


class BonusTransformer extends Transformer
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
        'country',
'mall',
'employee',
'type',
'account',

    ];

    /**
     * @param Bonus $entity
     *
     * @return array
     */
    public function transform(Bonus $entity)
    {
        $response = [
            'object' => 'Bonus',
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

    	public function includeCountry( Bonus $item ) {
		return $this->item( $item->country, new CountryTransformer() );
	}

	public function includeMall( Bonus $item ) {
		return $this->item( $item->mall, new MallTransformer() );
	}

	public function includeEmployee( Bonus $item ) {
		return $this->item( $item->employee, new EmployeeTransformer() );
	}

	public function includeType( Bonus $item ) {
		return $this->item( $item->type, new BonusTypeTransformer() );
	}

	public function includeAccount( Bonus $item ) {
		return $this->item( $item->account, new AccountTransformer() );
	}


}
