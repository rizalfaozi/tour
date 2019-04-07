<?php

namespace App\Repositories;

use App\Models\provinces;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class provincesRepository
 * @package App\Repositories
 * @version April 7, 2019, 4:42 am UTC
 *
 * @method provinces findWithoutFail($id, $columns = ['*'])
 * @method provinces find($id, $columns = ['*'])
 * @method provinces first($columns = ['*'])
*/
class provincesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return provinces::class;
    }
}
