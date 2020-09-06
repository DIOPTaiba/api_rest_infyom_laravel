<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompte_courantRequest;
use App\Http\Requests\UpdateCompte_courantRequest;
use App\Repositories\Compte_courantRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Compte_courantController extends AppBaseController
{
    /** @var  Compte_courantRepository */
    private $compteCourantRepository;

    public function __construct(Compte_courantRepository $compteCourantRepo)
    {
        $this->compteCourantRepository = $compteCourantRepo;
    }

    /**
     * Display a listing of the Compte_courant.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteCourants = $this->compteCourantRepository->all();

        return view('compte_courants.index')
            ->with('compteCourants', $compteCourants);
    }

    /**
     * Show the form for creating a new Compte_courant.
     *
     * @return Response
     */
    public function create()
    {
        return view('compte_courants.create');
    }

    /**
     * Store a newly created Compte_courant in storage.
     *
     * @param CreateCompte_courantRequest $request
     *
     * @return Response
     */
    public function store(CreateCompte_courantRequest $request)
    {
        $input = $request->all();

        $compteCourant = $this->compteCourantRepository->create($input);

        Flash::success('Compte Courant saved successfully.');

        return redirect(route('compteCourants.index'));
    }

    /**
     * Display the specified Compte_courant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            Flash::error('Compte Courant not found');

            return redirect(route('compteCourants.index'));
        }

        return view('compte_courants.show')->with('compteCourant', $compteCourant);
    }

    /**
     * Show the form for editing the specified Compte_courant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            Flash::error('Compte Courant not found');

            return redirect(route('compteCourants.index'));
        }

        return view('compte_courants.edit')->with('compteCourant', $compteCourant);
    }

    /**
     * Update the specified Compte_courant in storage.
     *
     * @param int $id
     * @param UpdateCompte_courantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompte_courantRequest $request)
    {
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            Flash::error('Compte Courant not found');

            return redirect(route('compteCourants.index'));
        }

        $compteCourant = $this->compteCourantRepository->update($request->all(), $id);

        Flash::success('Compte Courant updated successfully.');

        return redirect(route('compteCourants.index'));
    }

    /**
     * Remove the specified Compte_courant from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteCourant = $this->compteCourantRepository->find($id);

        if (empty($compteCourant)) {
            Flash::error('Compte Courant not found');

            return redirect(route('compteCourants.index'));
        }

        $this->compteCourantRepository->delete($id);

        Flash::success('Compte Courant deleted successfully.');

        return redirect(route('compteCourants.index'));
    }
}
