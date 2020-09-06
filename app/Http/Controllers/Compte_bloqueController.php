<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompte_bloqueRequest;
use App\Http\Requests\UpdateCompte_bloqueRequest;
use App\Repositories\Compte_bloqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Compte_bloqueController extends AppBaseController
{
    /** @var  Compte_bloqueRepository */
    private $compteBloqueRepository;

    public function __construct(Compte_bloqueRepository $compteBloqueRepo)
    {
        $this->compteBloqueRepository = $compteBloqueRepo;
    }

    /**
     * Display a listing of the Compte_bloque.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteBloques = $this->compteBloqueRepository->all();

        return view('compte_bloques.index')
            ->with('compteBloques', $compteBloques);
    }

    /**
     * Show the form for creating a new Compte_bloque.
     *
     * @return Response
     */
    public function create()
    {
        return view('compte_bloques.create');
    }

    /**
     * Store a newly created Compte_bloque in storage.
     *
     * @param CreateCompte_bloqueRequest $request
     *
     * @return Response
     */
    public function store(CreateCompte_bloqueRequest $request)
    {
        $input = $request->all();

        $compteBloque = $this->compteBloqueRepository->create($input);

        Flash::success('Compte Bloque saved successfully.');

        return redirect(route('compteBloques.index'));
    }

    /**
     * Display the specified Compte_bloque.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            Flash::error('Compte Bloque not found');

            return redirect(route('compteBloques.index'));
        }

        return view('compte_bloques.show')->with('compteBloque', $compteBloque);
    }

    /**
     * Show the form for editing the specified Compte_bloque.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            Flash::error('Compte Bloque not found');

            return redirect(route('compteBloques.index'));
        }

        return view('compte_bloques.edit')->with('compteBloque', $compteBloque);
    }

    /**
     * Update the specified Compte_bloque in storage.
     *
     * @param int $id
     * @param UpdateCompte_bloqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompte_bloqueRequest $request)
    {
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            Flash::error('Compte Bloque not found');

            return redirect(route('compteBloques.index'));
        }

        $compteBloque = $this->compteBloqueRepository->update($request->all(), $id);

        Flash::success('Compte Bloque updated successfully.');

        return redirect(route('compteBloques.index'));
    }

    /**
     * Remove the specified Compte_bloque from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteBloque = $this->compteBloqueRepository->find($id);

        if (empty($compteBloque)) {
            Flash::error('Compte Bloque not found');

            return redirect(route('compteBloques.index'));
        }

        $this->compteBloqueRepository->delete($id);

        Flash::success('Compte Bloque deleted successfully.');

        return redirect(route('compteBloques.index'));
    }
}
