<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComptesRequest;
use App\Http\Requests\UpdateComptesRequest;
use App\Repositories\ComptesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ComptesController extends AppBaseController
{
    /** @var  ComptesRepository */
    private $comptesRepository;

    public function __construct(ComptesRepository $comptesRepo)
    {
        $this->comptesRepository = $comptesRepo;
    }

    /**
     * Display a listing of the Comptes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comptes = $this->comptesRepository->all();

        return view('comptes.index')
            ->with('comptes', $comptes);
    }

    /**
     * Show the form for creating a new Comptes.
     *
     * @return Response
     */
    public function create()
    {
        return view('comptes.create');
    }

    /**
     * Store a newly created Comptes in storage.
     *
     * @param CreateComptesRequest $request
     *
     * @return Response
     */
    public function store(CreateComptesRequest $request)
    {
        $input = $request->all();

        $comptes = $this->comptesRepository->create($input);

        Flash::success('Comptes saved successfully.');

        return redirect(route('comptes.index'));
    }

    /**
     * Display the specified Comptes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            Flash::error('Comptes not found');

            return redirect(route('comptes.index'));
        }

        return view('comptes.show')->with('comptes', $comptes);
    }

    /**
     * Show the form for editing the specified Comptes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            Flash::error('Comptes not found');

            return redirect(route('comptes.index'));
        }

        return view('comptes.edit')->with('comptes', $comptes);
    }

    /**
     * Update the specified Comptes in storage.
     *
     * @param int $id
     * @param UpdateComptesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComptesRequest $request)
    {
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            Flash::error('Comptes not found');

            return redirect(route('comptes.index'));
        }

        $comptes = $this->comptesRepository->update($request->all(), $id);

        Flash::success('Comptes updated successfully.');

        return redirect(route('comptes.index'));
    }

    /**
     * Remove the specified Comptes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comptes = $this->comptesRepository->find($id);

        if (empty($comptes)) {
            Flash::error('Comptes not found');

            return redirect(route('comptes.index'));
        }

        $this->comptesRepository->delete($id);

        Flash::success('Comptes deleted successfully.');

        return redirect(route('comptes.index'));
    }
}
