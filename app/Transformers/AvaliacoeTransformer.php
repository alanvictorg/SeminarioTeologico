<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Avaliacoe;

/**
 * Class AvaliacoeTransformer
 * @package namespace App\Transformers;
 */
class AvaliacoeTransformer extends TransformerAbstract
{

    /**
     * Transform the \Avaliacoe entity
     * @param \Avaliacoe $model
     *
     * @return array
     */
    public function transform(Avaliacoe $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
