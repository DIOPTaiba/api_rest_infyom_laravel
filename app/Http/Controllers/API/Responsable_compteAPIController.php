<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateResponsable_compteAPIRequest;
use App\Http\Requests\API\UpdateResponsable_compteAPIRequest;
use App\Models\Responsable_compte;
use App\Repositories\Responsable_compteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Responsable_compteController
 * @package App\Http\Controllers\API
 */

class Responsable_compteAPIController extends AppBaseController
{
    /** @var  Responsable_compteRepository */
    private $responsableCompteRepository;

    public function __construct(Responsable_compteRepository $responsableCompteRepo)
    {
        $this->responsableCompteRepository = $responsableCompteRepo;
    }

    /**
     * Display a listing of the Responsable_compte.
     * GET|HEAD /responsableComptes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $responsableComptes = $this->responsableCompteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($responsableComptes->toArray(), 'Responsable Comptes retrieved successfully');
    }

    /**
     * Store a newly created Responsable_compte in storage.
     * POST /responsableComptes
     *
     * @param CreateResponsable_compteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResponsable_compteAPIRequest $request)
    {
        $input = $request->all();

        $responsableCompte = $this->responsableCompteRepository->create($input);

        return $this->sendResponse($responsableCompte->toArray(), 'Responsable Compte saved successfully');
    }

    /**
     * Display the specified Responsable_compte.
     * GET|HEAD /responsableComptes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Responsable_compte $responsableCompte */
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            return $this->sendError('Responsable Compte not found');
        }

        return $this->sendResponse($responsableCompte->toArray(), 'Responsable Compte retrieved successfully');
    }

    /**
     * Update the specified Responsable_compte in storage.
     * PUT/PATCH /responsableComptes/{id}
     *
     * @param int $id
     * @param UpdateResponsable_compteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponsable_compteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Responsable_compte $responsableCompte */
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            return $this->sendError('Responsable Compte not found');
        }

        $responsableCompte = $this->responsableCompteRepository->update($input, $id);

        return $this->sendResponse($responsableCompte->toArray(), 'Responsable_compte updated successfully');
    }

    /**
     * Remove the specified Responsable_compte from storage.
     * DELETE /responsableComptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Responsable_compte $responsableCompte */
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            return $this->sendError('Responsable Compte not found');
        }

        $responsableCompte->delete();

        return $this->sendSuccess('Responsable Compte deleted successfully');
    }
}
