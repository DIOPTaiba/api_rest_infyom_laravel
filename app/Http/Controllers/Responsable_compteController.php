<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponsable_compteRequest;
use App\Http\Requests\UpdateResponsable_compteRequest;
use App\Repositories\Responsable_compteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Responsable_compteController extends AppBaseController
{
    /** @var  Responsable_compteRepository */
    private $responsableCompteRepository;

    public function __construct(Responsable_compteRepository $responsableCompteRepo)
    {
        $this->responsableCompteRepository = $responsableCompteRepo;
    }

    /**
     * Display a listing of the Responsable_compte.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $responsableComptes = $this->responsableCompteRepository->all();

        return view('responsable_comptes.index')
            ->with('responsableComptes', $responsableComptes);
    }

    /**
     * Show the form for creating a new Responsable_compte.
     *
     * @return Response
     */
    public function create()
    {
        return view('responsable_comptes.create');
    }

    /**
     * Store a newly created Responsable_compte in storage.
     *
     * @param CreateResponsable_compteRequest $request
     *
     * @return Response
     */
    public function store(CreateResponsable_compteRequest $request)
    {
        $input = $request->all();

        $responsableCompte = $this->responsableCompteRepository->create($input);

        Flash::success('Responsable Compte saved successfully.');

        return redirect(route('responsableComptes.index'));
    }

    /**
     * Display the specified Responsable_compte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            Flash::error('Responsable Compte not found');

            return redirect(route('responsableComptes.index'));
        }

        return view('responsable_comptes.show')->with('responsableCompte', $responsableCompte);
    }

    /**
     * Show the form for editing the specified Responsable_compte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            Flash::error('Responsable Compte not found');

            return redirect(route('responsableComptes.index'));
        }

        return view('responsable_comptes.edit')->with('responsableCompte', $responsableCompte);
    }

    /**
     * Update the specified Responsable_compte in storage.
     *
     * @param int $id
     * @param UpdateResponsable_compteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponsable_compteRequest $request)
    {
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            Flash::error('Responsable Compte not found');

            return redirect(route('responsableComptes.index'));
        }

        $responsableCompte = $this->responsableCompteRepository->update($request->all(), $id);

        Flash::success('Responsable Compte updated successfully.');

        return redirect(route('responsableComptes.index'));
    }

    /**
     * Remove the specified Responsable_compte from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $responsableCompte = $this->responsableCompteRepository->find($id);

        if (empty($responsableCompte)) {
            Flash::error('Responsable Compte not found');

            return redirect(route('responsableComptes.index'));
        }

        $this->responsableCompteRepository->delete($id);

        Flash::success('Responsable Compte deleted successfully.');

        return redirect(route('responsableComptes.index'));
    }
}
