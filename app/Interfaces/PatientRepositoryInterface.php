<?php

namespace App\Interfaces;

interface PatientRepositoryInterface 
{
    public function getAllPatients();
    public function getPatientById($patientId);
    public function deletePatient($patientId);
    public function createPatient(array $patientDetails);
    public function updatePatient($patientId, array $newDetails);
}