<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompte_courantAPIRequest;
use App\Http\Requests\API\UpdateCompte_courantAPIRequest;
use App\Models\Compte_courant;
use App\Repositories\Compte_courantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Compte_courantController
 * @package App\Http\Controllers\API
 */

class Compte_courantAPIController extends AppBaseController
{
    /** @var  Compte_courantRepository */
    private $compteCourantRepository;

    public function __construct(Compte_courantRepository $compteCourantRepo)
    {
        $this->compteCourantRepository = $compteCourantRepo;
    }

    /**
     * Display a listing of the Compte_courant.
     * GET|HEAD /compteCourants
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $compteCourants = $this->compteCourantRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($compteCourants->toArray(), 'Compte Courants retrieved successfully');
    }

    /**
     * Store a newly created Compte_courant in storage.
     * POST /compteCourants
     *
     * @param CreateCompte_courantAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompte_courantAPIRequest $request)
    {
        $input = $request->all();

        $compteCourant = $this->compteCourantRepository->create($input);

        return $this->sendResponse($compteCourant->toArray(), 'Compte Courant saved successfully');
    }

    /**
     * Display the specified Compte_courant.
     * GET|HEAD /compteCourants/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Compte_courant $compteCourant */
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            return $this->sendError('Compte Courant not found');
        }

        return $this->sendResponse($compteCourant->toArray(), 'Compte Courant retrieved successfully');
    }

    /**
     * Update the specified Compte_courant in storage.
     * PUT/PATCH /compteCourants/{id}
     *
     * @param int $id
     * @param UpdateCompte_courantAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompte_courantAPIRequest $request)
    {
        $input = $request->all();

        /** @var Compte_courant $compteCourant */
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            return $this->sendError('Compte Courant not found');
        }

        $compteCourant = $this->compteCourantRepository->update($input, $id);

        return $this->sendResponse($compteCourant->toArray(), 'Compte_courant updated successfully');
    }

    /**
     * Remove the specified Compte_courant from storage.
     * DELETE /compteCourants/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Compte_courant $compteCourant */
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            return $this->sendError('Compte Courant not found');
        }

        $compteCourant->delete();

        return $this->sendSuccess('Compte Courant deleted successfully');
    }
}
