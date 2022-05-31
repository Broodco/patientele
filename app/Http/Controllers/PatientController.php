<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:name,gender,birth_date,birth_place']
        ]);

        $patients = Patient::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            })
            ->when(Request::input('field'), function ($query) {
                $query->when(Request::input('direction'), function ($query, $direction) {
                    $field = Request::input('field') === 'name' ? 'last_name' : Request::input('field');
                    $query->orderBy(($field), $direction);
                });
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($patient) => [
                'id' => $patient->id,
                'name' => $patient->last_name . ' ' . $patient->first_name,
                'gender' => $patient->gender === 0 ? 'Male' : 'Female',
                'birth_date' => $patient->birth_date,
                'birth_place' => $patient->birth_place,
            ]);

        return Inertia::render('Patients/Index', [
            'patients' => $patients,
            'filters' => Request::only(['search']),
            'field' => Request::only(['field']),
            'direction' => Request::only(['direction'])
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Inertia\Response
     */
    public function show(Patient $patient)
    {
        return Inertia::render('Patients/Show', [
            'patient' => [
                'id' => $patient->id,
                'first_name' => $patient->first_name,
                'last_name' => $patient->last_name,
                'address' => ucwords($patient->address),
                'gender' => $patient->gender === 0 ? 'Male' : 'Female',
                'birth_date' => $patient->birth_date,
                'birth_place' => $patient->birth_place
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
