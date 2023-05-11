<?php

namespace App\Repositories;

use App\Interfaces\PatientRepositoryInterface;
use App\Model\Patient;

class PatientRepository implements PatientRepositoryInterface 
{
    public function getAllPatients() 
    {
        return Patient::all();
    }

    public function getPatientById($patientId) 
    {
        return Patient::findOrFail($patientId);
    }

    public function deletePatient($patientId) 
    {
        Patient::destroy($patientId);
    }

    public function createPatient(array $patientDetails) 
    {
        return Patient::create($patientDetails);
    }

    public function updatePatient($patientId, array $newDetails) 
    {
        return Patient::whereId($patientId)->update($newDetails);
    }
}