<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClient_moralAPIRequest;
use App\Http\Requests\API\UpdateClient_moralAPIRequest;
use App\Models\Client_moral;
use App\Repositories\Client_moralRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Client_moralController
 * @package App\Http\Controllers\API
 */

class Client_moralAPIController extends AppBaseController
{
    /** @var  Client_moralRepository */
    private $clientMoralRepository;

    public function __construct(Client_moralRepository $clientMoralRepo)
    {
        $this->clientMoralRepository = $clientMoralRepo;
    }

    /**
     * Display a listing of the Client_moral.
     * GET|HEAD /clientMorals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientMorals = $this->clientMoralRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientMorals->toArray(), 'Client Morals retrieved successfully');
    }

    /**
     * Store a newly created Client_moral in storage.
     * POST /clientMorals
     *
     * @param CreateClient_moralAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClient_moralAPIRequest $request)
    {
        $input = $request->all();

        $clientMoral = $this->clientMoralRepository->create($input);

        return $this->sendResponse($clientMoral->toArray(), 'Client Moral saved successfully');
    }

    /**
     * Display the specified Client_moral.
     * GET|HEAD /clientMorals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Client_moral $clientMoral */
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            return $this->sendError('Client Moral not found');
        }

        return $this->sendResponse($clientMoral->toArray(), 'Client Moral retrieved successfully');
    }

    /**
     * Update the specified Client_moral in storage.
     * PUT/PATCH /clientMorals/{id}
     *
     * @param int $id
     * @param UpdateClient_moralAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClient_moralAPIRequest $request)
    {
        $input = $request->all();

        /** @var Client_moral $clientMoral */
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            return $this->sendError('Client Moral not found');
        }

        $clientMoral = $this->clientMoralRepository->update($input, $id);

        return $this->sendResponse($clientMoral->toArray(), 'Client_moral updated successfully');
    }

    /**
     * Remove the specified Client_moral from storage.
     * DELETE /clientMorals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Client_moral $clientMoral */
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            return $this->sendError('Client Moral not found');
        }

        $clientMoral->delete();

        return $this->sendSuccess('Client Moral deleted successfully');
    }
}
