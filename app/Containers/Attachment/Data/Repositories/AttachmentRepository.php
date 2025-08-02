<?php

namespace App\Containers\Attachment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AttachmentRepository
 */
class AttachmentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'employee_id' => '=',

    ];

}
