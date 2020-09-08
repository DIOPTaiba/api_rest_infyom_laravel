<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperationsRequest;
use App\Http\Requests\UpdateOperationsRequest;
use App\Repositories\OperationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Flash;
use Response;
//Controlleur Opérations
class OperationsController extends AppBaseController
{
    /** @var  OperationsRepository */
    private $operationsRepository;

    public function __construct(OperationsRepository $operationsRepo)
    {
        $this->operationsRepository = $operationsRepo;
    }

    /**
     * Display a listing of the Operations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $operations = $this->operationsRepository->all();

        return view('operations.index')
            ->with('operations', $operations);
    }

    /**
     * Show the form for creating a new Operations.
     *
     * @return Response
     */
    public function create()
    {
        return view('operations.create');
    }

    /**
     * Store a newly created Operations in storage.
     *
     * @param CreateOperationsRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationsRequest $request)
    {
        $input = $request->all();

        $operations = $this->operationsRepository->create($input);

        Flash::success('Operations saved successfully.');

        return redirect(route('operations.index'));
    }

    /* /**
     * Display the specified Operations.
     *
     * @param int $id
     *
     * @return Response
     * /
    public function show($id)
    {
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            Flash::error('Operations not found');

            return redirect(route('operations.index'));
        }

        return view('operations.show')->with('operations', $operations);
    } */

    //Recupération infos opérations sur 1 compte donné
    /**
     * Display the specified Operations.
     *
     * @param string $numCompte
     *
     * @return Response
     */
    public function show($numCompte)
    {
        $comptes = DB::table('comptes')->where('numero_compte', $numCompte)->first();
        
        $id = $comptes->id;
        
        $operations = DB::table('operations')->where('id_compte_source_id', $id)->get();
        
        if (empty($operations)) {
            Flash::error('Operations not found');

            return redirect(route('operations.index'));
        }

        return view('operations.index')->with('operations', $operations);
    }

    /**
     * Show the form for editing the specified Operations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            Flash::error('Operations not found');

            return redirect(route('operations.index'));
        }

        return view('operations.edit')->with('operations', $operations);
    }

    /**
     * Update the specified Operations in storage.
     *
     * @param int $id
     * @param UpdateOperationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationsRequest $request)
    {
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            Flash::error('Operations not found');

            return redirect(route('operations.index'));
        }

        $operations = $this->operationsRepository->update($request->all(), $id);

        Flash::success('Operations updated successfully.');

        return redirect(route('operations.index'));
    }

    /**
     * Remove the specified Operations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $operations = $this->operationsRepository->find($id);

        if (empty($operations)) {
            Flash::error('Operations not found');

            return redirect(route('operations.index'));
        }

        $this->operationsRepository->delete($id);

        Flash::success('Operations deleted successfully.');

        return redirect(route('operations.index'));
    }
}
