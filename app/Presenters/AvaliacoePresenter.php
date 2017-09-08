<?php

namespace App\Presenters;

use App\Transformers\AvaliacoeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AvaliacoePresenter
 *
 * @package namespace App\Presenters;
 */
class AvaliacoePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AvaliacoeTransformer();
    }
}
