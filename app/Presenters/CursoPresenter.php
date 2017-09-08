<?php

namespace App\Presenters;

use App\Transformers\CursoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CursoPresenter
 *
 * @package namespace App\Presenters;
 */
class CursoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CursoTransformer();
    }
}
