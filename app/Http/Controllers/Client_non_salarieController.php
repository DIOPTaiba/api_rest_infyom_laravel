<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClient_non_salarieRequest;
use App\Http\Requests\UpdateClient_non_salarieRequest;
use App\Repositories\Client_non_salarieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Client_non_salarieController extends AppBaseController
{
    /** @var  Client_non_salarieRepository */
    private $clientNonSalarieRepository;

    public function __construct(Client_non_salarieRepository $clientNonSalarieRepo)
    {
        $this->clientNonSalarieRepository = $clientNonSalarieRepo;
    }

    /**
     * Display a listing of the Client_non_salarie.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientNonSalaries = $this->clientNonSalarieRepository->all();

        return view('client_non_salaries.index')
            ->with('clientNonSalaries', $clientNonSalaries);
    }

    /**
     * Show the form for creating a new Client_non_salarie.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_non_salaries.create');
    }

    /**
     * Store a newly created Client_non_salarie in storage.
     *
     * @param CreateClient_non_salarieRequest $request
     *
     * @return Response
     */
    public function store(CreateClient_non_salarieRequest $request)
    {
        $input = $request->all();

        $clientNonSalarie = $this->clientNonSalarieRepository->create($input);

        Flash::success('Client Non Salarie saved successfully.');

        return redirect(route('clientNonSalaries.index'));
    }

    /**
     * Display the specified Client_non_salarie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            Flash::error('Client Non Salarie not found');

            return redirect(route('clientNonSalaries.index'));
        }

        return view('client_non_salaries.show')->with('clientNonSalarie', $clientNonSalarie);
    }

    /**
     * Show the form for editing the specified Client_non_salarie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            Flash::error('Client Non Salarie not found');

            return redirect(route('clientNonSalaries.index'));
        }

        return view('client_non_salaries.edit')->with('clientNonSalarie', $clientNonSalarie);
    }

    /**
     * Update the specified Client_non_salarie in storage.
     *
     * @param int $id
     * @param UpdateClient_non_salarieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClient_non_salarieRequest $request)
    {
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            Flash::error('Client Non Salarie not found');

            return redirect(route('clientNonSalaries.index'));
        }

        $clientNonSalarie = $this->clientNonSalarieRepository->update($request->all(), $id);

        Flash::success('Client Non Salarie updated successfully.');

        return redirect(route('clientNonSalaries.index'));
    }

    /**
     * Remove the specified Client_non_salarie from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientNonSalarie = $this->clientNonSalarieRepository->find($id);

        if (empty($clientNonSalarie)) {
            Flash::error('Client Non Salarie not found');

            return redirect(route('clientNonSalaries.index'));
        }

        $this->clientNonSalarieRepository->delete($id);

        Flash::success('Client Non Salarie deleted successfully.');

        return redirect(route('clientNonSalaries.index'));
    }
}
