<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Professore;

/**
 * Class ProfessoreTransformer
 * @package namespace App\Transformers;
 */
class ProfessoreTransformer extends TransformerAbstract
{

    /**
     * Transform the \Professore entity
     * @param \Professore $model
     *
     * @return array
     */
    public function transform(Professore $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
