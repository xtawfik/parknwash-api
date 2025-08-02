<?php

namespace App\Containers\AccAcountTransfer\UI\API\Transformers;

use App\Containers\AccAcountTransfer\Models\AccAcountTransfer;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccBankAccount\UI\API\Transformers\AccBankAccountTransformer;
use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;


class AccAcountTransferTransformer extends Transformer
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
'paid_from_bank_account',
'received_in_bank_account',
'footer',

    ];

    /**
     * @param AccAcountTransfer $entity
     *
     * @return array
     */
    public function transform(AccAcountTransfer $entity)
    {
        $response = [
            'object' => 'AccAcountTransfer',
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

    	public function includeUser( AccAcountTransfer $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includePaidFromBankAccount( AccAcountTransfer $item ) {
		return $this->item( $item->paid_from_bank_account, new AccBankAccountTransformer() );
	}

	public function includeReceivedInBankAccount( AccAcountTransfer $item ) {
		return $this->item( $item->received_in_bank_account, new AccBankAccountTransformer() );
	}

	public function includeFooter( AccAcountTransfer $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}


}
