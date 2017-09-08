<?php

namespace App\Presenters;

use App\Transformers\AlunoTurmaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AlunoTurmaPresenter
 *
 * @package namespace App\Presenters;
 */
class AlunoTurmaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AlunoTurmaTransformer();
    }
}
