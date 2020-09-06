<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEtat_compteAPIRequest;
use App\Http\Requests\API\UpdateEtat_compteAPIRequest;
use App\Models\Etat_compte;
use App\Repositories\Etat_compteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Etat_compteController
 * @package App\Http\Controllers\API
 */

class Etat_compteAPIController extends AppBaseController
{
    /** @var  Etat_compteRepository */
    private $etatCompteRepository;

    public function __construct(Etat_compteRepository $etatCompteRepo)
    {
        $this->etatCompteRepository = $etatCompteRepo;
    }

    /**
     * Display a listing of the Etat_compte.
     * GET|HEAD /etatComptes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $etatComptes = $this->etatCompteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etatComptes->toArray(), 'Etat Comptes retrieved successfully');
    }

    /**
     * Store a newly created Etat_compte in storage.
     * POST /etatComptes
     *
     * @param CreateEtat_compteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEtat_compteAPIRequest $request)
    {
        $input = $request->all();

        $etatCompte = $this->etatCompteRepository->create($input);

        return $this->sendResponse($etatCompte->toArray(), 'Etat Compte saved successfully');
    }

    /**
     * Display the specified Etat_compte.
     * GET|HEAD /etatComptes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Etat_compte $etatCompte */
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            return $this->sendError('Etat Compte not found');
        }

        return $this->sendResponse($etatCompte->toArray(), 'Etat Compte retrieved successfully');
    }

    /**
     * Update the specified Etat_compte in storage.
     * PUT/PATCH /etatComptes/{id}
     *
     * @param int $id
     * @param UpdateEtat_compteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtat_compteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Etat_compte $etatCompte */
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            return $this->sendError('Etat Compte not found');
        }

        $etatCompte = $this->etatCompteRepository->update($input, $id);

        return $this->sendResponse($etatCompte->toArray(), 'Etat_compte updated successfully');
    }

    /**
     * Remove the specified Etat_compte from storage.
     * DELETE /etatComptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Etat_compte $etatCompte */
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            return $this->sendError('Etat Compte not found');
        }

        $etatCompte->delete();

        return $this->sendSuccess('Etat Compte deleted successfully');
    }
}
