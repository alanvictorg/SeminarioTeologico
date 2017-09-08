<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProfessoreRepository;
use App\Entities\Professore;
use App\Validators\ProfessoreValidator;

/**
 * Class ProfessoreRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProfessoreRepositoryEloquent extends BaseRepository implements ProfessoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Professore::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProfessoreValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
