<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOperationsAPIRequest;
use App\Http\Requests\API\UpdateOperationsAPIRequest;
use App\Models\Operations;
use App\Repositories\OperationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class OperationsController
 * @package App\Http\Controllers\API
 */

class OperationsAPIController extends AppBaseController
{
    /** @var  OperationsRepository */
    private $operationsRepository;

    public function __construct(OperationsRepository $operationsRepo)
    {
        $this->operationsRepository = $operationsRepo;
    }

    /**
     * Display a listing of the Operations.
     * GET|HEAD /operations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $operations = $this->operationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($operations->toArray(), 'Operations retrieved successfully');
    }

    /**
     * Store a newly created Operations in storage.
     * POST /operations
     *
     * @param CreateOperationsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationsAPIRequest $request)
    {
        $input = $request->all();

        $operations = $this->operationsRepository->create($input);

        return $this->sendResponse($operations->toArray(), 'Operations saved successfully');
    }

    //Affiche une opération selon l'id donné
    /* /**
     * Display the specified Operations.
     * GET|HEAD /operations/{id}
     *
     * @param int $id
     *
     * @return Response
     * /
    public function show($id)
    {
        /** @var Operations $operations * /
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            return $this->sendError('Operations not found');
        }

        return $this->sendResponse($operations->toArray(), 'Operations retrieved successfully');
    } */

    //Recupération de toutes les opérations suivant le numéro compte donné
    /**
     * Display the specified Operations.
     * GET|HEAD /operations/{numCompte}
     *
     * @param string $numCompte
     *
     * @return Response
     */
    public function show($numCompte)
    {
        //Recupération de l'id suivant le numéro_compte
        $comptes = DB::table('comptes')->where('numero_compte', $numCompte)->first();
        $id = $comptes->id;

        /** @ var Operations $operations */
        //$operations = $this->operationsRepository->find($id);
        $operations = DB::table('operations')->where('id_compte_source_id', $id)->get();

        if (empty($operations)) {
            return $this->sendError('Operations not found');
        }

        return $this->sendResponse($operations, 'Operations retrieved successfully');
    }

    /**
     * Update the specified Operations in storage.
     * PUT/PATCH /operations/{id}
     *
     * @param int $id
     * @param UpdateOperationsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Operations $operations */
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            return $this->sendError('Operations not found');
        }

        $operations = $this->operationsRepository->update($input, $id);

        return $this->sendResponse($operations->toArray(), 'Operations updated successfully');
    }

    /**
     * Remove the specified Operations from storage.
     * DELETE /operations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Operations $operations */
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            return $this->sendError('Operations not found');
        }

        $operations->delete();

        return $this->sendSuccess('Operations deleted successfully');
    }
}
