<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AlunoRepository;
use App\Entities\Aluno;
use App\Validators\AlunoValidator;

/**
 * Class AlunoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AlunoRepositoryEloquent extends BaseRepository implements AlunoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    public function model()
    {
        return Aluno::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AlunoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
