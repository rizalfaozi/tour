<?php

namespace App\Repositories;

use App\Models\schedules;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class schedulesRepository
 * @package App\Repositories
 * @version April 14, 2019, 7:17 am WIB
 *
 * @method schedules findWithoutFail($id, $columns = ['*'])
 * @method schedules find($id, $columns = ['*'])
 * @method schedules first($columns = ['*'])
*/
class schedulesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'member_id',
        'invoice_id',
        'category_id',
        'departure_date',
        'flight',
        'airport',
        'hotel',
        'type',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return schedules::class;
    }
}
