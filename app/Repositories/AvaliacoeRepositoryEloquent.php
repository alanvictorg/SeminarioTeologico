<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AvaliacoeRepository;
use App\Entities\Avaliacoe;
use App\Validators\AvaliacoeValidator;

/**
 * Class AvaliacoeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AvaliacoeRepositoryEloquent extends BaseRepository implements AvaliacoeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Avaliacoe::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AvaliacoeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
