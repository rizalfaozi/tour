<?php

namespace App\Repositories;

use App\Models\commissions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class commissionsRepository
 * @package App\Repositories
 * @version April 7, 2019, 6:30 am UTC
 *
 * @method commissions findWithoutFail($id, $columns = ['*'])
 * @method commissions find($id, $columns = ['*'])
 * @method commissions first($columns = ['*'])
*/
class commissionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'price',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return commissions::class;
    }
}
