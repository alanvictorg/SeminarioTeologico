<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AvaliacoeCreateRequest;
use App\Http\Requests\AvaliacoeUpdateRequest;
use App\Repositories\AvaliacoeRepository;
use App\Validators\AvaliacoeValidator;


class AvaliacoesController extends Controller
{

    /**
     * @var AvaliacoeRepository
     */
    protected $repository;

    /**
     * @var AvaliacoeValidator
     */
    protected $validator;

    public function __construct(AvaliacoeRepository $repository, AvaliacoeValidator $validator)
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
        $avaliacoes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $avaliacoes,
            ]);
        }

        return view('avaliacoes.index', compact('avaliacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AvaliacoeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AvaliacoeCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $avaliacoe = $this->repository->create($request->all());

            $response = [
                'message' => 'Avaliacoe created.',
                'data'    => $avaliacoe->toArray(),
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
        $avaliacoe = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $avaliacoe,
            ]);
        }

        return view('avaliacoes.show', compact('avaliacoe'));
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

        $avaliacoe = $this->repository->find($id);

        return view('avaliacoes.edit', compact('avaliacoe'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AvaliacoeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AvaliacoeUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $avaliacoe = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Avaliacoe updated.',
                'data'    => $avaliacoe->toArray(),
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
                'message' => 'Avaliacoe deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Avaliacoe deleted.');
    }
}
