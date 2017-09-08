<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\AlunoTurma;

/**
 * Class AlunoTurmaTransformer
 * @package namespace App\Transformers;
 */
class AlunoTurmaTransformer extends TransformerAbstract
{

    /**
     * Transform the \AlunoTurma entity
     * @param \AlunoTurma $model
     *
     * @return array
     */
    public function transform(AlunoTurma $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
