<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model{
    //whitch table this model is resposible for
    protected $table = 'patient';

    //primary key
    protected $primaryKey = 'patient_id';

    protected $allowedFields = ['patient_name','patient_contact','status'];

    // protected $useTimestamps = 'true';
    // protected $createdField = 'created_at';
    // protected $updatedField = '';

    //validation rules
    protected $validationRules = [
        'patient_name' => 'required|min_length[3]|max_length[100]',
        'patient_contact' => 'min_length[3]|max_length[10]',
        'status' => 'required|max_length[1]'
    ];

    protected $validationMessages = [
        'patient_name' => ['required'=>'Patient Name is required'],
        'status' => ['required'=>'Status is required'],
        'patient_contact' => ['max_length' => 'Maximum character length 10']
    ];
}