<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtat_compteRequest;
use App\Http\Requests\UpdateEtat_compteRequest;
use App\Repositories\Etat_compteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Etat_compteController extends AppBaseController
{
    /** @var  Etat_compteRepository */
    private $etatCompteRepository;

    public function __construct(Etat_compteRepository $etatCompteRepo)
    {
        $this->etatCompteRepository = $etatCompteRepo;
    }

    /**
     * Display a listing of the Etat_compte.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etatComptes = $this->etatCompteRepository->all();

        return view('etat_comptes.index')
            ->with('etatComptes', $etatComptes);
    }

    /**
     * Show the form for creating a new Etat_compte.
     *
     * @return Response
     */
    public function create()
    {
        return view('etat_comptes.create');
    }

    /**
     * Store a newly created Etat_compte in storage.
     *
     * @param CreateEtat_compteRequest $request
     *
     * @return Response
     */
    public function store(CreateEtat_compteRequest $request)
    {
        $input = $request->all();

        $etatCompte = $this->etatCompteRepository->create($input);

        Flash::success('Etat Compte saved successfully.');

        return redirect(route('etatComptes.index'));
    }

    /**
     * Display the specified Etat_compte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            Flash::error('Etat Compte not found');

            return redirect(route('etatComptes.index'));
        }

        return view('etat_comptes.show')->with('etatCompte', $etatCompte);
    }

    /**
     * Show the form for editing the specified Etat_compte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            Flash::error('Etat Compte not found');

            return redirect(route('etatComptes.index'));
        }

        return view('etat_comptes.edit')->with('etatCompte', $etatCompte);
    }

    /**
     * Update the specified Etat_compte in storage.
     *
     * @param int $id
     * @param UpdateEtat_compteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtat_compteRequest $request)
    {
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            Flash::error('Etat Compte not found');

            return redirect(route('etatComptes.index'));
        }

        $etatCompte = $this->etatCompteRepository->update($request->all(), $id);

        Flash::success('Etat Compte updated successfully.');

        return redirect(route('etatComptes.index'));
    }

    /**
     * Remove the specified Etat_compte from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etatCompte = $this->etatCompteRepository->find($id);

        if (empty($etatCompte)) {
            Flash::error('Etat Compte not found');

            return redirect(route('etatComptes.index'));
        }

        $this->etatCompteRepository->delete($id);

        Flash::success('Etat Compte deleted successfully.');

        return redirect(route('etatComptes.index'));
    }
}
