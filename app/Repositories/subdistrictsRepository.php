<?php

namespace App\Repositories;

use App\Models\subdistricts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class subdistrictsRepository
 * @package App\Repositories
 * @version April 7, 2019, 8:36 am UTC
 *
 * @method subdistricts findWithoutFail($id, $columns = ['*'])
 * @method subdistricts find($id, $columns = ['*'])
 * @method subdistricts first($columns = ['*'])
*/
class subdistrictsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'district_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return subdistricts::class;
    }
}
