<?php

namespace App\Presenters;

use App\Transformers\ProfessoreTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProfessorePresenter
 *
 * @package namespace App\Presenters;
 */
class ProfessorePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProfessoreTransformer();
    }
}
