<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Disciplina;

/**
 * Class DisciplinaTransformer
 * @package namespace App\Transformers;
 */
class DisciplinaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Disciplina entity
     * @param \Disciplina $model
     *
     * @return array
     */
    public function transform(Disciplina $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
