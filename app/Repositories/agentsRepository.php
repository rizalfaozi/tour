<?php

namespace App\Repositories;

use App\Models\agents;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class agentsRepository
 * @package App\Repositories
 * @version April 7, 2019, 10:01 am UTC
 *
 * @method agents findWithoutFail($id, $columns = ['*'])
 * @method agents find($id, $columns = ['*'])
 * @method agents first($columns = ['*'])
*/
class agentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'office_name',
        'role_id',
        'password',
        'email',
        'photo',
        'phone',
        'address',
        'province_id',
        'district_id',
        'bank',
        'account_number',
        'account_name',
        'gender',
        'type',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return agents::class;
    }
}
