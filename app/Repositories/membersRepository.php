<?php

namespace App\Repositories;

use App\Models\members;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class memberRepository
 * @package App\Repositories
 * @version April 7, 2019, 4:36 am UTC
 *
 * @method member findWithoutFail($id, $columns = ['*'])
 * @method member find($id, $columns = ['*'])
 * @method member first($columns = ['*'])
*/
class membersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'first_name',
        'last_name',
        'age',
        'phone',
        'alternative_phone',
        'address',
        'email',
        'gender',
        'id_card',
        'passport_number',
        'bank_account_number',
        'departure_date',
        'photo',
        'visa_number',
        'type',
        'status',
        'province_id',
        'district_id',
        'subdistrict_id',
        'village_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return members::class;
    }
}
