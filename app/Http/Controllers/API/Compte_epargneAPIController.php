<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompte_epargneAPIRequest;
use App\Http\Requests\API\UpdateCompte_epargneAPIRequest;
use App\Models\Compte_epargne;
use App\Repositories\Compte_epargneRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Compte_epargneController
 * @package App\Http\Controllers\API
 */

class Compte_epargneAPIController extends AppBaseController
{
    /** @var  Compte_epargneRepository */
    private $compteEpargneRepository;

    public function __construct(Compte_epargneRepository $compteEpargneRepo)
    {
        $this->compteEpargneRepository = $compteEpargneRepo;
    }

    /**
     * Display a listing of the Compte_epargne.
     * GET|HEAD /compteEpargnes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $compteEpargnes = $this->compteEpargneRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($compteEpargnes->toArray(), 'Compte Epargnes retrieved successfully');
    }

    /**
     * Store a newly created Compte_epargne in storage.
     * POST /compteEpargnes
     *
     * @param CreateCompte_epargneAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompte_epargneAPIRequest $request)
    {
        $input = $request->all();

        $compteEpargne = $this->compteEpargneRepository->create($input);

        return $this->sendResponse($compteEpargne->toArray(), 'Compte Epargne saved successfully');
    }

    /**
     * Display the specified Compte_epargne.
     * GET|HEAD /compteEpargnes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Compte_epargne $compteEpargne */
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            return $this->sendError('Compte Epargne not found');
        }

        return $this->sendResponse($compteEpargne->toArray(), 'Compte Epargne retrieved successfully');
    }

    /**
     * Update the specified Compte_epargne in storage.
     * PUT/PATCH /compteEpargnes/{id}
     *
     * @param int $id
     * @param UpdateCompte_epargneAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompte_epargneAPIRequest $request)
    {
        $input = $request->all();

        /** @var Compte_epargne $compteEpargne */
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            return $this->sendError('Compte Epargne not found');
        }

        $compteEpargne = $this->compteEpargneRepository->update($input, $id);

        return $this->sendResponse($compteEpargne->toArray(), 'Compte_epargne updated successfully');
    }

    /**
     * Remove the specified Compte_epargne from storage.
     * DELETE /compteEpargnes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Compte_epargne $compteEpargne */
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            return $this->sendError('Compte Epargne not found');
        }

        $compteEpargne->delete();

        return $this->sendSuccess('Compte Epargne deleted successfully');
    }
}
