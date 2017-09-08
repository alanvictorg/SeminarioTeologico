<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DisciplinaCreateRequest;
use App\Http\Requests\DisciplinaUpdateRequest;
use App\Repositories\DisciplinaRepository;
use App\Validators\DisciplinaValidator;


class DisciplinasController extends Controller
{

    /**
     * @var DisciplinaRepository
     */
    protected $repository;

    /**
     * @var DisciplinaValidator
     */
    protected $validator;

    public function __construct(DisciplinaRepository $repository, DisciplinaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $disciplinas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $disciplinas,
            ]);
        }

        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DisciplinaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $disciplina = $this->repository->create($request->all());

            $response = [
                'message' => 'Disciplina created.',
                'data'    => $disciplina->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $disciplina,
            ]);
        }

        return view('disciplinas.show', compact('disciplina'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $disciplina = $this->repository->find($id);

        return view('disciplinas.edit', compact('disciplina'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DisciplinaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(DisciplinaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $disciplina = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Disciplina updated.',
                'data'    => $disciplina->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Disciplina deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Disciplina deleted.');
    }
}
