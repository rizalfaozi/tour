<?php

namespace App\Repositories;

use App\Models\advertisements;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class advertisementsRepository
 * @package App\Repositories
 * @version April 15, 2019, 12:00 pm WIB
 *
 * @method advertisements findWithoutFail($id, $columns = ['*'])
 * @method advertisements find($id, $columns = ['*'])
 * @method advertisements first($columns = ['*'])
*/
class advertisementsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'start_date',
        'finish_date',
        'photo',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return advertisements::class;
    }
}
