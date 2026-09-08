<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model{
    //whitch table this model is resposible for
    protected $table = 'patient';

    //primary key
    protected $primaryKey = 'patient_id';

    protected $allowedFields = ['patient_name','contactNo','status'];

    // protected $useTimestamps = 'true';
    // protected $createdField = 'created_at';
    // protected $updatedField = '';

    //validation rules
    protected $validationRules = [
        'patient_name' => 'required|min_length[3]|max_length[100]',
        'contactNo' => 'min_length[3]|max_length[10]',
        'status' => 'required|max_length[1]'
    ];

    protected $validationMessages = [
        'patient_name' => ['required'=>'Patient Name is required'],
        'status' => ['required'=>'Status is required'],
        'contactNo' => ['max_lenth' => 'Maximum character length 10']
    ];
}