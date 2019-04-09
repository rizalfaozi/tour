<?php

namespace App\Repositories;

use App\Models\invoices;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class invoicesRepository
 * @package App\Repositories
 * @version April 8, 2019, 3:17 pm UTC
 *
 * @method invoices findWithoutFail($id, $columns = ['*'])
 * @method invoices find($id, $columns = ['*'])
 * @method invoices first($columns = ['*'])
*/
class invoicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'member_id',
        'price',
        'type',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return invoices::class;
    }
}
