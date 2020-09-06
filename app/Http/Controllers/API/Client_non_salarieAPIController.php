<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClient_non_salarieAPIRequest;
use App\Http\Requests\API\UpdateClient_non_salarieAPIRequest;
use App\Models\Client_non_salarie;
use App\Repositories\Client_non_salarieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Client_non_salarieController
 * @package App\Http\Controllers\API
 */

class Client_non_salarieAPIController extends AppBaseController
{
    /** @var  Client_non_salarieRepository */
    private $clientNonSalarieRepository;

    public function __construct(Client_non_salarieRepository $clientNonSalarieRepo)
    {
        $this->clientNonSalarieRepository = $clientNonSalarieRepo;
    }

    /**
     * Display a listing of the Client_non_salarie.
     * GET|HEAD /clientNonSalaries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientNonSalaries = $this->clientNonSalarieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientNonSalaries->toArray(), 'Client Non Salaries retrieved successfully');
    }

    /**
     * Store a newly created Client_non_salarie in storage.
     * POST /clientNonSalaries
     *
     * @param CreateClient_non_salarieAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClient_non_salarieAPIRequest $request)
    {
        $input = $request->all();

        $clientNonSalarie = $this->clientNonSalarieRepository->create($input);

        return $this->sendResponse($clientNonSalarie->toArray(), 'Client Non Salarie saved successfully');
    }

    /**
     * Display the specified Client_non_salarie.
     * GET|HEAD /clientNonSalaries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Client_non_salarie $clientNonSalarie */
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            return $this->sendError('Client Non Salarie not found');
        }

        return $this->sendResponse($clientNonSalarie->toArray(), 'Client Non Salarie retrieved successfully');
    }

    /**
     * Update the specified Client_non_salarie in storage.
     * PUT/PATCH /clientNonSalaries/{id}
     *
     * @param int $id
     * @param UpdateClient_non_salarieAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClient_non_salarieAPIRequest $request)
    {
        $input = $request->all();

        /** @var Client_non_salarie $clientNonSalarie */
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            return $this->sendError('Client Non Salarie not found');
        }

        $clientNonSalarie = $this->clientNonSalarieRepository->update($input, $id);

        return $this->sendResponse($clientNonSalarie->toArray(), 'Client_non_salarie updated successfully');
    }

    /**
     * Remove the specified Client_non_salarie from storage.
     * DELETE /clientNonSalaries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Client_non_salarie $clientNonSalarie */
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            return $this->sendError('Client Non Salarie not found');
        }

        $clientNonSalarie->delete();

        return $this->sendSuccess('Client Non Salarie deleted successfully');
    }
}
