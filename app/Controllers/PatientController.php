<?php
namespace App\Controllers;

use App\Models\PatientModel;

class PatientController extends BaseController
{
    protected $patientModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
    }

    // GET /patient
    public function index()
    {
        $data['patients'] = $this->patientModel->findAll();
        return view('patients/index', $data);
    }

    //GET /patient/create
    public function create()
    {
        //return empty form
        return view('patients/create');
    }

    //POST /patient/store
    public function store()
    {
        $data = [
            'patient_name' => $this->request->getPost('patient_name'),
            'patient_contact' => $this->request->getPost('patient_contact'),
            'status' => $this->request->getPost('status'),
        ];

        if (!$this->patientModel->insert($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->patientModel->errors());
        }

        return redirect()->to('/patients')->with('success', 'Patient added Successfully');
    }

    //GET /patients/edit/{id}
    public function edit($id){
        $data['patient'] = $this -> patientModel -> find($id);

        if(!data['patient']){
            return redirect() -> to('/patients') -> with('errors',['Patient not found']);
        }

        return view('patients/edit', $data)
    }

    public function update()
    {
        $data = [
            'patient_name' => $this->request->getPost('patient_name'),
            'patient_contact' => $this->request->getPost('patient_contact'),
            'status' => $this->request->getPost('status'),
        ];

        if(!$this -> patientModel -> update($id, $data)){
            return redirect()->back()->withInput()->
            with('errors',$this->patientModel->error());
        }
    }

    public function delete()
    {
    }
}