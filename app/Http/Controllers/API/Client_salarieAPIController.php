<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClient_salarieAPIRequest;
use App\Http\Requests\API\UpdateClient_salarieAPIRequest;
use App\Models\Client_salarie;
use App\Repositories\Client_salarieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Client_salarieController
 * @package App\Http\Controllers\API
 */

class Client_salarieAPIController extends AppBaseController
{
    /** @var  Client_salarieRepository */
    private $clientSalarieRepository;

    public function __construct(Client_salarieRepository $clientSalarieRepo)
    {
        $this->clientSalarieRepository = $clientSalarieRepo;
    }

    /**
     * Display a listing of the Client_salarie.
     * GET|HEAD /clientSalaries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientSalaries = $this->clientSalarieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientSalaries->toArray(), 'Client Salaries retrieved successfully');
    }

    /**
     * Store a newly created Client_salarie in storage.
     * POST /clientSalaries
     *
     * @param CreateClient_salarieAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClient_salarieAPIRequest $request)
    {
        $input = $request->all();

        $clientSalarie = $this->clientSalarieRepository->create($input);

        return $this->sendResponse($clientSalarie->toArray(), 'Client Salarie saved successfully');
    }

    /**
     * Display the specified Client_salarie.
     * GET|HEAD /clientSalaries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Client_salarie $clientSalarie */
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            return $this->sendError('Client Salarie not found');
        }

        return $this->sendResponse($clientSalarie->toArray(), 'Client Salarie retrieved successfully');
    }

    /**
     * Update the specified Client_salarie in storage.
     * PUT/PATCH /clientSalaries/{id}
     *
     * @param int $id
     * @param UpdateClient_salarieAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClient_salarieAPIRequest $request)
    {
        $input = $request->all();

        /** @var Client_salarie $clientSalarie */
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            return $this->sendError('Client Salarie not found');
        }

        $clientSalarie = $this->clientSalarieRepository->update($input, $id);

        return $this->sendResponse($clientSalarie->toArray(), 'Client_salarie updated successfully');
    }

    /**
     * Remove the specified Client_salarie from storage.
     * DELETE /clientSalaries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Client_salarie $clientSalarie */
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            return $this->sendError('Client Salarie not found');
        }

        $clientSalarie->delete();

        return $this->sendSuccess('Client Salarie deleted successfully');
    }
}
