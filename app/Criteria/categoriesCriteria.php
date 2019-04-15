<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
/**
 * Class PostCriteria
 * @package namespace App\Criteria;
 */

   

class categoriesCriteria implements CriteriaInterface
{
     public function __construct($type)
     {
        $this->type = $type;
     }
     
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */

    public function apply($model, RepositoryInterface $repository)
    {

        $model = $model->orderBy('id','desc');   
        return $model;
    }
}