<?php

namespace App\Containers\AccJournalEntry\UI\API\Transformers;

use App\Containers\AccJournalEntry\Models\AccJournalEntry;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\AccFooter\UI\API\Transformers\AccFooterTransformer;
use App\Containers\AccCurrency\UI\API\Transformers\AccCurrencyTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\AccItem\UI\API\Transformers\AccItemTransformer;


class AccJournalEntryTransformer extends Transformer
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
        'footer',
'currency',
'user',
'items',

    ];

    /**
     * @param AccJournalEntry $entity
     *
     * @return array
     */
    public function transform(AccJournalEntry $entity)
    {
        $response = [
            'object' => 'AccJournalEntry',
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

    	public function includeFooter( AccJournalEntry $item ) {
		return $this->item( $item->footer, new AccFooterTransformer() );
	}

	public function includeCurrency( AccJournalEntry $item ) {
		return $this->item( $item->currency, new AccCurrencyTransformer() );
	}

	public function includeUser( AccJournalEntry $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeItems( AccJournalEntry $item ) {
		return $this->collection( $item->items, new AccItemTransformer() );
	}


}
