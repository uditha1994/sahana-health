<?php
namespace App\Controllers;

use App\Models\PatientModel;

class PatientController extends BaseController{
    protected $patientModel;

    public function __construct(){
        $this -> patientModel = new PatientModel();
    }

    // GET /patient
    public function index(){
        $data['patients'] = $this -> patientModel -> findAll();
    }

    //GET /patient/create
    public function create(){
        //return empty form
        return view('patient/create');
    }

    //POST /patient/store
    public function store(){
        $data = [
            'patient_name' => $this -> request ->getPost('patient_name'),
            'contactNo' => $this -> request -> getPost('contactNo'),
            'status' => $this -> request -> getPost('status'),
        ];

        if(! $this -> patientModel -> insert($data)){
            return redirect() -> back() -> withInput()
            -> with('error', $this->patientModel->errors());
        }

        return redirect()->to('/patient')->with('success', 'Patient added Successfully');
    }

    public function update(){}

    public function delete(){}
}