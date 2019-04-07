<?php

namespace App\Repositories;

use App\Models\districts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class districtsRepository
 * @package App\Repositories
 * @version April 7, 2019, 8:08 am UTC
 *
 * @method districts findWithoutFail($id, $columns = ['*'])
 * @method districts find($id, $columns = ['*'])
 * @method districts first($columns = ['*'])
*/
class districtsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return districts::class;
    }
}
