<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompte_epargneRequest;
use App\Http\Requests\UpdateCompte_epargneRequest;
use App\Repositories\Compte_epargneRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Compte_epargneController extends AppBaseController
{
    /** @var  Compte_epargneRepository */
    private $compteEpargneRepository;

    public function __construct(Compte_epargneRepository $compteEpargneRepo)
    {
        $this->compteEpargneRepository = $compteEpargneRepo;
    }

    /**
     * Display a listing of the Compte_epargne.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteEpargnes = $this->compteEpargneRepository->all();

        return view('compte_epargnes.index')
            ->with('compteEpargnes', $compteEpargnes);
    }

    /**
     * Show the form for creating a new Compte_epargne.
     *
     * @return Response
     */
    public function create()
    {
        return view('compte_epargnes.create');
    }

    /**
     * Store a newly created Compte_epargne in storage.
     *
     * @param CreateCompte_epargneRequest $request
     *
     * @return Response
     */
    public function store(CreateCompte_epargneRequest $request)
    {
        $input = $request->all();

        $compteEpargne = $this->compteEpargneRepository->create($input);

        Flash::success('Compte Epargne saved successfully.');

        return redirect(route('compteEpargnes.index'));
    }

    /**
     * Display the specified Compte_epargne.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            Flash::error('Compte Epargne not found');

            return redirect(route('compteEpargnes.index'));
        }

        return view('compte_epargnes.show')->with('compteEpargne', $compteEpargne);
    }

    /**
     * Show the form for editing the specified Compte_epargne.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            Flash::error('Compte Epargne not found');

            return redirect(route('compteEpargnes.index'));
        }

        return view('compte_epargnes.edit')->with('compteEpargne', $compteEpargne);
    }

    /**
     * Update the specified Compte_epargne in storage.
     *
     * @param int $id
     * @param UpdateCompte_epargneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompte_epargneRequest $request)
    {
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            Flash::error('Compte Epargne not found');

            return redirect(route('compteEpargnes.index'));
        }

        $compteEpargne = $this->compteEpargneRepository->update($request->all(), $id);

        Flash::success('Compte Epargne updated successfully.');

        return redirect(route('compteEpargnes.index'));
    }

    /**
     * Remove the specified Compte_epargne from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteEpargne = $this->compteEpargneRepository->find($id);

        if (empty($compteEpargne)) {
            Flash::error('Compte Epargne not found');

            return redirect(route('compteEpargnes.index'));
        }

        $this->compteEpargneRepository->delete($id);

        Flash::success('Compte Epargne deleted successfully.');

        return redirect(route('compteEpargnes.index'));
    }
}
