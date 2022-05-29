<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends \CodeIgniter\Controller
{
    use ResponseTrait;

    function construct(){
        parent::__construct();
    }

    public function index()
    {
        $session = session();
        if($session->get('islogged')){
            echo 'You are logged in';
        }
        else{
            return view('home/login');
        }
    }

    public function login(){
        $db = db_connect();
        $builder = $db->table('users');
        $builder->where('email', $_POST['email']);
        $user = $builder->get();

        if(count($user->getResult()) == 0){
            $session = session();
            return $this->failNotFound('User not found');
        }
        else{
            foreach($user->getResult() as $row){
                if(password_verify($_POST['password'], $row->loginpassword)){
                    $session = session();
                    $session->set('islogged', true);
                    $session->set([
                        'userid' => $row->userid,
                        'lastname' => $row->lastname,
                        'firstname' => $row->firstname,
                        'middlename' => $row->middlename,
                        'address' => $row->address,
                        'contactnumber' => $row->contactnumber,
                        'email' => $row->email,
                        'loginpassword' => $row->loginpassword,
                        'roletype' => $row->roletype
                    ]);
                    $this->addToUserActivity($row->userid, 'Logged in');
                    return $this->respond(['status' => 1, 'message' => 'You are now logged in']);
                }
                else{
                    return $this->respond(['status' => -1, 'message' => 'Incorrect password!'], 200);
                }
            }
        }
    }

    private function addToUserActivity($userid, $activity){
        $db = db_connect();
        $builder = $db->table('useractivities');
        $data = array(
            'userid' => $userid,
            'activity' => $activity
        );
        return $builder->insert($data);
    }

    public function logout(){
        $session = session();
        $this->addToUserActivity($session->get('userid'), 'Logged out');
        $session->destroy();  
        echo view('home/login');
    }

    // public function addResident(){
    //     $resident = new \App\Entities\Resident();
    //     $resident->fill([
    //         'lastname' => 'Lopez',
    //         'firstname' => 'Mark Henderson',
    //         'middlename' => 'Lacson',
    //         'address' => '#19 Purok 1, Sampaguita Street',
    //         'gender' => 'Male',
    //         'birthday' => '1991/01/13',
    //         'contactnumber' => '099813456789',
    //         'email' => 'mlopez@mailinator.com'
    //     ]);
    //     $residentModel = new \App\Models\ResidentModel();
    //     echo $residentModel->save($resident);
    // }

    // public function addAdmin(){
    //     $data = array(
    //         'lastname' => 'Apelado',
    //         'firstname' => 'Rholex',
    //         'middlename' => 'Yamat',
    //         'contactnumber' => '',
    //         'address' => 'Poblacion, San Manuel, Tarlac',
    //         'email' => 'baitrholex2@mailinator.com',
    //         'loginpassword' => 'Password'
    //     );
    //     $user = new \App\Entities\User();
    //     $user->fill($data);
    //     $userModel = new \App\Models\UserModel();
    //     echo $userModel->save($user);
    // }
    
}