<?php

namespace App\Repositories;

use App\Models\salaries;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class salariesRepository
 * @package App\Repositories
 * @version April 8, 2019, 2:51 pm UTC
 *
 * @method salaries findWithoutFail($id, $columns = ['*'])
 * @method salaries find($id, $columns = ['*'])
 * @method salaries first($columns = ['*'])
*/
class salariesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'total',
        'commission',
        'count',
        
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return salaries::class;
    }
}
