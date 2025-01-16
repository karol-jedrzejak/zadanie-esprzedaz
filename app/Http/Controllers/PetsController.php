<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetsRequest;
use App\Http\Requests\UpdatePetsRequest;
use Illuminate\Http\Request;
use App\Repository\PetsRepository;

class PetsController extends Controller
{

    private PetsRepository $PetsRepository;

    public function __construct(PetsRepository $repositoryPets)
    {
        $this->PetsRepository = $repositoryPets;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create', [
            'page_title' => 'PET - Dodawanie',
            'id' => 1,
            'status_types' => $this->PetsRepository->status_types()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetsRequest $request)
    {
        $request->validated();

        $data = $request->post();
        $response = $this->PetsRepository->add($data);

        return redirect()
            ->route('pets.show', ['pet' => $response['id']])
            ->with($response['mode'], $response['text']);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $resposne = $this->PetsRepository->find($id);

        return view('pets.show', [
            'page_title' => 'PET - Podgląd',
            'pet' => $resposne['pet'],
            'id' => $id,
            'error' => $resposne['error'],
            'status_types' => $this->PetsRepository->status_types()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $resposne = $this->PetsRepository->find($id);

        if ($resposne['error']) {
            return redirect()
                ->route('pets.show', ['pet' => $id])
                ->with('error', $resposne['error']);
        } else {
            return view('pets.edit', [
                'page_title' => 'PET - Edycja',
                'id' => $id,
                'pet' => $resposne['pet'],
                'status_types' => $this->PetsRepository->status_types()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetsRequest $request, int $id)
    {
        $request->validated();

        $data = $request->post();
        $response = $this->PetsRepository->update($data, $id);

        return redirect()
            ->route('pets.show', ['pet' => $id])
            ->with($response['mode'], $response['text']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $response = $this->PetsRepository->delate($id);

        return redirect()
            ->route('pets.show', ['pet' => $id])
            ->with($response['mode'], $response['text']);
    }

    /**
     * Status.
     */
    public function status(Request $request)
    {
        $data = $request->post();
        $pets = $this->PetsRepository->bystatus($data['status_select']);
        return view('pets.bystatus', [
            'page_title' => 'PET - ByStatus',
            'id' => 1,
            'pets' => $pets,
            'status_types' => $this->PetsRepository->status_types()
        ]);
    }

    /**
     * Welcome
     */
    public function welcome()
    {
        return view('welcome', [
            'page_title' => 'PET - Welcome',
            'id' => 1,
            'status_types' => $this->PetsRepository->status_types()
        ]);
    }
}
