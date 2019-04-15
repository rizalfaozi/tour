<?php

namespace App\Repositories;

use App\Models\roleusers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class roleusersRepository
 * @package App\Repositories
 * @version April 12, 2019, 4:59 am UTC
 *
 * @method roleusers findWithoutFail($id, $columns = ['*'])
 * @method roleusers find($id, $columns = ['*'])
 * @method roleusers first($columns = ['*'])
*/
class roleusersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return roleusers::class;
    }
}
