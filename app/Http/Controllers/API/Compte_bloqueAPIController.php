<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompte_bloqueAPIRequest;
use App\Http\Requests\API\UpdateCompte_bloqueAPIRequest;
use App\Models\Compte_bloque;
use App\Repositories\Compte_bloqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Compte_bloqueController
 * @package App\Http\Controllers\API
 */

class Compte_bloqueAPIController extends AppBaseController
{
    /** @var  Compte_bloqueRepository */
    private $compteBloqueRepository;

    public function __construct(Compte_bloqueRepository $compteBloqueRepo)
    {
        $this->compteBloqueRepository = $compteBloqueRepo;
    }

    /**
     * Display a listing of the Compte_bloque.
     * GET|HEAD /compteBloques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $compteBloques = $this->compteBloqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($compteBloques->toArray(), 'Compte Bloques retrieved successfully');
    }

    /**
     * Store a newly created Compte_bloque in storage.
     * POST /compteBloques
     *
     * @param CreateCompte_bloqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompte_bloqueAPIRequest $request)
    {
        $input = $request->all();

        $compteBloque = $this->compteBloqueRepository->create($input);

        return $this->sendResponse($compteBloque->toArray(), 'Compte Bloque saved successfully');
    }

    /**
     * Display the specified Compte_bloque.
     * GET|HEAD /compteBloques/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Compte_bloque $compteBloque */
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            return $this->sendError('Compte Bloque not found');
        }

        return $this->sendResponse($compteBloque->toArray(), 'Compte Bloque retrieved successfully');
    }

    /**
     * Update the specified Compte_bloque in storage.
     * PUT/PATCH /compteBloques/{id}
     *
     * @param int $id
     * @param UpdateCompte_bloqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompte_bloqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Compte_bloque $compteBloque */
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            return $this->sendError('Compte Bloque not found');
        }

        $compteBloque = $this->compteBloqueRepository->update($input, $id);

        return $this->sendResponse($compteBloque->toArray(), 'Compte_bloque updated successfully');
    }

    /**
     * Remove the specified Compte_bloque from storage.
     * DELETE /compteBloques/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Compte_bloque $compteBloque */
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            return $this->sendError('Compte Bloque not found');
        }

        $compteBloque->delete();

        return $this->sendSuccess('Compte Bloque deleted successfully');
    }
}
