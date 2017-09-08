<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AlunoTurmaCreateRequest;
use App\Http\Requests\AlunoTurmaUpdateRequest;
use App\Repositories\AlunoTurmaRepository;
use App\Validators\AlunoTurmaValidator;


class AlunoTurmasController extends Controller
{

    /**
     * @var AlunoTurmaRepository
     */
    protected $repository;

    /**
     * @var AlunoTurmaValidator
     */
    protected $validator;

    public function __construct(AlunoTurmaRepository $repository, AlunoTurmaValidator $validator)
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
        $alunoTurmas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $alunoTurmas,
            ]);
        }

        return view('alunoTurmas.index', compact('alunoTurmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoTurmaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoTurmaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $alunoTurma = $this->repository->create($request->all());

            $response = [
                'message' => 'AlunoTurma created.',
                'data'    => $alunoTurma->toArray(),
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
        $alunoTurma = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $alunoTurma,
            ]);
        }

        return view('alunoTurmas.show', compact('alunoTurma'));
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

        $alunoTurma = $this->repository->find($id);

        return view('alunoTurmas.edit', compact('alunoTurma'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AlunoTurmaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AlunoTurmaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $alunoTurma = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AlunoTurma updated.',
                'data'    => $alunoTurma->toArray(),
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
                'message' => 'AlunoTurma deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AlunoTurma deleted.');
    }
}
