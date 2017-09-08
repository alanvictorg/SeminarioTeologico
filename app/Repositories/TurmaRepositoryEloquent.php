<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TurmaRepository;
use App\Entities\Turma;
use App\Validators\TurmaValidator;

/**
 * Class TurmaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TurmaRepositoryEloquent extends BaseRepository implements TurmaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Turma::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
