<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Aluno;

/**
 * Class AlunoTransformer
 * @package namespace App\Transformers;
 */
class AlunoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Aluno entity
     * @param \Aluno $model
     *
     * @return array
     */
    public function transform(Aluno $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
