<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
/**
 * Class PostCriteria
 * @package namespace App\Criteria;
 */

   

class membersCriteria implements CriteriaInterface
{
     public function __construct()
     {
        
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
        $user = Auth::user(); 
        if($user->role_id !="3")
        {
          $model = $model->where(['type'=>'jamaah'])->orderBy('id','desc');
        }else{    
           $model = $model->where(['user_id'=> $user->id,'type'=>'jamaah'])->orderBy('id','desc'); 
        }  
        return $model;
    }
}