<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComptesAPIRequest;
use App\Http\Requests\API\UpdateComptesAPIRequest;
use App\Models\Comptes;
use App\Repositories\ComptesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class ComptesController
 * @package App\Http\Controllers\API
 */

class ComptesAPIController extends AppBaseController
{
    /** @var  ComptesRepository */
    private $comptesRepository;

    public function __construct(ComptesRepository $comptesRepo)
    {
        $this->comptesRepository = $comptesRepo;
    }

    /**
     * Display a listing of the Comptes.
     * GET|HEAD /comptes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comptes = $this->comptesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($comptes->toArray(), 'Comptes retrieved successfully');
    }

    /**
     * Store a newly created Comptes in storage.
     * POST /comptes
     *
     * @param CreateComptesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComptesAPIRequest $request)
    {
        $input = $request->all();

        $comptes = $this->comptesRepository->create($input);

        return $this->sendResponse($comptes->toArray(), 'Comptes saved successfully');
    }

    /* /**
     * Display the specified Comptes.
     * GET|HEAD /comptes/{id}
     *
     * @param int $id
     *
     * @return Response
     * /
    public function show($id)
    {
        /** @var Comptes $comptes * /
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            return $this->sendError('Comptes not found');
        }

        return $this->sendResponse($comptes->toArray(), 'Comptes retrieved successfully');
    } */

    /**
     * Display the specified Comptes.
     * GET|HEAD /comptes/{numerocompte}
     *
     * @param string $numCompte
     *
     * @return Response
     */
    public function show($numCompte)
    {
        /** @ var Comptes $comptes */
        //$comptes = $this->comptesRepository->find($numCompte);
        $comptes = DB::table('comptes')->where('numero_compte', $numCompte)->first();

        if (empty($comptes)) {
            return $this->sendError('Comptes not found');
        }

        return $this->sendResponse($comptes, 'Comptes retrieved successfully');
    }

    /**
     * Update the specified Comptes in storage.
     * PUT/PATCH /comptes/{id}
     *
     * @param int $id
     * @param UpdateComptesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComptesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comptes $comptes */
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            return $this->sendError('Comptes not found');
        }

        $comptes = $this->comptesRepository->update($input, $id);

        return $this->sendResponse($comptes->toArray(), 'Comptes updated successfully');
    }

    /**
     * Remove the specified Comptes from storage.
     * DELETE /comptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comptes $comptes */
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            return $this->sendError('Comptes not found');
        }

        $comptes->delete();

        return $this->sendSuccess('Comptes deleted successfully');
    }
}
