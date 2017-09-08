<?php

namespace App\Presenters;

use App\Transformers\AlunoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AlunoPresenter
 *
 * @package namespace App\Presenters;
 */
class AlunoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AlunoTransformer();
    }
}
