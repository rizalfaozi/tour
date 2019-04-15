<?php

namespace App\Repositories;

use App\Models\categories;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class categoriesRepository
 * @package App\Repositories
 * @version April 7, 2019, 8:41 am UTC
 *
 * @method categories findWithoutFail($id, $columns = ['*'])
 * @method categories find($id, $columns = ['*'])
 * @method categories first($columns = ['*'])
*/
class categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'price',
        'departure_date',
        'flight',
        'hotel',
        'description',
        'quota',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return categories::class;
    }
}
