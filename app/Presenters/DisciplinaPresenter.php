<?php

namespace App\Presenters;

use App\Transformers\DisciplinaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DisciplinaPresenter
 *
 * @package namespace App\Presenters;
 */
class DisciplinaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DisciplinaTransformer();
    }
}
