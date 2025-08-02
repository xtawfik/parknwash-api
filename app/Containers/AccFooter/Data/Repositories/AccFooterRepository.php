<?php

namespace App\Containers\AccFooter\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccFooterRepository
 */
class AccFooterRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'content' => 'like',
'code_editor' => 'like',
'footer_category_id' => '=',
'status' => '=',

    ];

}
