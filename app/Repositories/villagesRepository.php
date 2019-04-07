<?php

namespace App\Repositories;

use App\Models\villages;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class villagesRepository
 * @package App\Repositories
 * @version April 7, 2019, 5:28 am UTC
 *
 * @method villages findWithoutFail($id, $columns = ['*'])
 * @method villages find($id, $columns = ['*'])
 * @method villages first($columns = ['*'])
*/
class villagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subdistrict_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return villages::class;
    }
}
