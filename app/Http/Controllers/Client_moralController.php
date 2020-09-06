<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClient_moralRequest;
use App\Http\Requests\UpdateClient_moralRequest;
use App\Repositories\Client_moralRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Client_moralController extends AppBaseController
{
    /** @var  Client_moralRepository */
    private $clientMoralRepository;

    public function __construct(Client_moralRepository $clientMoralRepo)
    {
        $this->clientMoralRepository = $clientMoralRepo;
    }

    /**
     * Display a listing of the Client_moral.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientMorals = $this->clientMoralRepository->all();

        return view('client_morals.index')
            ->with('clientMorals', $clientMorals);
    }

    /**
     * Show the form for creating a new Client_moral.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_morals.create');
    }

    /**
     * Store a newly created Client_moral in storage.
     *
     * @param CreateClient_moralRequest $request
     *
     * @return Response
     */
    public function store(CreateClient_moralRequest $request)
    {
        $input = $request->all();

        $clientMoral = $this->clientMoralRepository->create($input);

        Flash::success('Client Moral saved successfully.');

        return redirect(route('clientMorals.index'));
    }

    /**
     * Display the specified Client_moral.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            Flash::error('Client Moral not found');

            return redirect(route('clientMorals.index'));
        }

        return view('client_morals.show')->with('clientMoral', $clientMoral);
    }

    /**
     * Show the form for editing the specified Client_moral.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            Flash::error('Client Moral not found');

            return redirect(route('clientMorals.index'));
        }

        return view('client_morals.edit')->with('clientMoral', $clientMoral);
    }

    /**
     * Update the specified Client_moral in storage.
     *
     * @param int $id
     * @param UpdateClient_moralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClient_moralRequest $request)
    {
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            Flash::error('Client Moral not found');

            return redirect(route('clientMorals.index'));
        }

        $clientMoral = $this->clientMoralRepository->update($request->all(), $id);

        Flash::success('Client Moral updated successfully.');

        return redirect(route('clientMorals.index'));
    }

    /**
     * Remove the specified Client_moral from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientMoral = $this->clientMoralRepository->find($id);

        if (empty($clientMoral)) {
            Flash::error('Client Moral not found');

            return redirect(route('clientMorals.index'));
        }

        $this->clientMoralRepository->delete($id);

        Flash::success('Client Moral deleted successfully.');

        return redirect(route('clientMorals.index'));
    }
}
