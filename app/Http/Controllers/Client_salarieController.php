<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClient_salarieRequest;
use App\Http\Requests\UpdateClient_salarieRequest;
use App\Repositories\Client_salarieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Client_salarieController extends AppBaseController
{
    /** @var  Client_salarieRepository */
    private $clientSalarieRepository;

    public function __construct(Client_salarieRepository $clientSalarieRepo)
    {
        $this->clientSalarieRepository = $clientSalarieRepo;
    }

    /**
     * Display a listing of the Client_salarie.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientSalaries = $this->clientSalarieRepository->all();

        return view('client_salaries.index')
            ->with('clientSalaries', $clientSalaries);
    }

    /**
     * Show the form for creating a new Client_salarie.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_salaries.create');
    }

    /**
     * Store a newly created Client_salarie in storage.
     *
     * @param CreateClient_salarieRequest $request
     *
     * @return Response
     */
    public function store(CreateClient_salarieRequest $request)
    {
        $input = $request->all();

        $clientSalarie = $this->clientSalarieRepository->create($input);

        Flash::success('Client Salarie saved successfully.');

        return redirect(route('clientSalaries.index'));
    }

    /**
     * Display the specified Client_salarie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            Flash::error('Client Salarie not found');

            return redirect(route('clientSalaries.index'));
        }

        return view('client_salaries.show')->with('clientSalarie', $clientSalarie);
    }

    /**
     * Show the form for editing the specified Client_salarie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            Flash::error('Client Salarie not found');

            return redirect(route('clientSalaries.index'));
        }

        return view('client_salaries.edit')->with('clientSalarie', $clientSalarie);
    }

    /**
     * Update the specified Client_salarie in storage.
     *
     * @param int $id
     * @param UpdateClient_salarieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClient_salarieRequest $request)
    {
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            Flash::error('Client Salarie not found');

            return redirect(route('clientSalaries.index'));
        }

        $clientSalarie = $this->clientSalarieRepository->update($request->all(), $id);

        Flash::success('Client Salarie updated successfully.');

        return redirect(route('clientSalaries.index'));
    }

    /**
     * Remove the specified Client_salarie from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientSalarie = $this->clientSalarieRepository->find($id);

        if (empty($clientSalarie)) {
            Flash::error('Client Salarie not found');

            return redirect(route('clientSalaries.index'));
        }

        $this->clientSalarieRepository->delete($id);

        Flash::success('Client Salarie deleted successfully.');

        return redirect(route('clientSalaries.index'));
    }
}
