<?php

namespace App\Repositories;

use App\Models\histories;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class historiesRepository
 * @package App\Repositories
 * @version April 12, 2019, 8:55 am UTC
 *
 * @method histories findWithoutFail($id, $columns = ['*'])
 * @method histories find($id, $columns = ['*'])
 * @method histories first($columns = ['*'])
*/
class historiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'message'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return histories::class;
    }
}
