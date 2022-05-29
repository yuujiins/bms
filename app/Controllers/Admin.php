<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Admin extends BaseController{
    use ResponseTrait;

    //private functions
    private function addToUserActivity($userid, $activity){
        $db = db_connect();
        $builder = $db->table('useractivities');
        $data = array(
            'userid' => $userid,
            'activity' => $activity,
        );
        return $builder->insert($data);
    }

    private function addToSystemActivities($userid, $activity){
        $db = db_connect();
        $builder = $db->table('systemactivities');
        $data = array(
            'performedby' => $userid,
            'actionperformed' => $activity,
        );
        return $builder->insert($data);
    }

    // for views
    public function index(){
        $session = session();
        if($session->get('islogged')){
            echo view('admin/dashboard');
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function users(){
        $session = session();
        if($session->get('islogged') && $session->get('roletype') == 1){
            return view('admin/users');
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function residents(){
        $session = session();
        if($session->get('islogged')){
            return view('admin/residents');
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function complaints(){
        $session = session();
        if($session->get('islogged')){
            return view('admin/complaints');
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function resolved(){
        $session = session();
        if($session->get('islogged')){
            return view('admin/resolved');
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function clearance(){
        $session = session();
        if($session->get('islogged')){
            return view('admin/clearance');
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function transactions(){
        $session = session();
        if($session->get('islogged')){
            if($_GET['status'] == 'Pending'){
                return view('admin/pending-transactions');
            }
            else{
                return view('admin/completed-transactions');
            }
        }
        else{
            echo view('errors/html/error_404');
        }
    }

    public function systemAudits(){
        $session = session();
        if($session->get('islogged') && $session->get('roletype') == 1){
            return view('admin/audit-trail');
        }
        else{
            echo view('errors/html/error_404');
        }
    }


    //for users
    public function getUsers(){
        if(!$this->request->isAJAX()) {
            //ensures that this is only being requested thru AJAX
            echo view('errors/html/error_404');
        }
        $session = session();
        if($session->get('islogged')){
            $session = session();
            $db = db_connect();
            $builder = $db->table('users');
            $builder->select('userid, lastname, firstname, middlename, address, contactnumber, email, roletype');
            $builder->where('deleted_at', null);
            $builder->where('userid != ', $session->get('userid'));
            $data = $builder->get()->getResult();
            return $this->respond(json_encode($data), 200);
        }
        else{
            return $this->failForbidden('You are not allowed to access');
        }
    }

    public function getuser($userid){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $user = new \App\Entities\User();
                $userModel = new \App\Models\UserModel();
                $user = $userModel->find($userid);
                return $this->respond(json_encode($user), 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function removeuser(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $userModel = new \App\Models\UserModel();
                if($userModel->delete($_POST['userid'])){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Deleted user with User ID: '.$_POST['userid']);
                    return $this->respond(['status'=> 1, 'message'=>'User has been deleted'], 200);
                }
                else{
                    return $this->failNotFound('User not found in the database');
                }
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function updateUser(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $user = new \App\Entities\User();
                $userModel = new \App\Models\UserModel();
                $data = array(
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'middlename' => $_POST['middlename'],
                    'address' => $_POST['address'],
                    'contactnumber' => $_POST['contactnumber'],
                    'email' => $_POST['email'],
                    'roletype' => $_POST['roletype']
                );
                if($_POST['password'] != '' && $_POST['password'] != null){
                    $data['loginpassword'] = $_POST['password'];
                }
                if(isset($_POST['userid'])){
                    $data['userid'] = $_POST['userid'];
                }
                $user->fill($data);
                if($userModel->save($user)){
                    if(isset($_POST['userid'])){
                        $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Updated user with User ID: '.$_POST['userid']);
                    }
                    else{
                        $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Added a new user with a name: '.$_POST['lastname'].', '.$_POST['firstname'].' '.$_POST['middlename']);
                    }
                    return $this->respond(['status' => 1, 'message' => 'User list updated successfully!'], 200);
                }

                return $this->respond(json_encode($user), 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    //for residents
    public function getresidents(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $residents = new \App\Entities\Resident();
                $residentModel = new \App\Models\ResidentModel();
                $residents = $residentModel->where('deleted_at', null)->findAll();
                return $this->respond($residents, 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function getresident($residentid){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $residents = new \App\Entities\Resident();
                $residentModel = new \App\Models\ResidentModel();
                $residents = $residentModel->where('deleted_at', null)->find($residentid);
                return $this->respond($residents, 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function updateResident(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $resident = new \App\Entities\Resident();
                $residentModel = new \App\Models\ResidentModel();
                $data = array(
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'middlename' => $_POST['middlename'],
                    'address' => $_POST['address'],
                    'gender' => $_POST['gender'],
                    'civilstatus' => $_POST['civilstatus'],
                    'birthday' => $_POST['birthday'],
                    'contactnumber' => $_POST['contactnumber'],
                    'email' => $_POST['email']
                );
                if(isset($_POST['residentid'])){
                    $data['residentid'] = $_POST['residentid'];
                }
                $resident->fill($data);
                if($residentModel->save($resident)){
                    if(isset($_POST['residentid'])){
                        $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Added a new resident with a name: '.$_POST['lastname'].', '.$_POST['firstname'].' '.$_POST['middlename']);
                    }
                    else{
                        $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Updated resident with Resident ID: '.$_POST['residentid']);
                    }
                    return $this->respond(['status' => 1, 'message' => 'Resident list updated successfully!'], 200);
                }
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function removeresident(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $residentModel = new \App\Models\ResidentModel();
                if($residentModel->delete($_POST['residentid'])){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Removed resident with Resident ID: '.$_POST['residentid']);
                    return $this->respond(['status'=> 1, 'message'=>'Resident has been deleted'], 200);
                }
                else{
                    return $this->failNotFound('User not found in the database');
                }
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    //for complaints
    public function getcomplaints($status){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $complaints = new \App\Entities\Complaint();
                $complaintModel = new \App\Models\ComplaintsModel();
                $complaintModel->where('deleted_at = ', null);
                $complaintModel->where('status', $status);
                $complaints = $complaintModel->findAll();
                return $this->respond(json_encode($complaints), 200);
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function getcomplaint($status, $id){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $complaints = new \App\Entities\Complaint();
                $complaintModel = new \App\Models\ComplaintsModel();
                $complaintModel->where('deleted_at = ', null);
                $complaintModel->where('status', $status);
                $complaints = $complaintModel->find($id);

                return $this->respond(json_encode($complaints), 200);
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function updatecomplaints(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $complaints = new \App\Entities\Complaint();
                $complaintModel = new \App\Models\ComplaintsModel();
                $data = array(
                    'complainant' => $_POST['complainant'],
                    'complainee' => $_POST['complainee'],
                    'complaint' => $_POST['complaint'],
                    'status' => 'Open'
                );
                $complaints->fill($data);
                if(isset($_POST['id'])){
                    $data['id'] = $_POST['id'];
                }
                if($complaintModel->save($data)){
                    if(isset($_POST['residentid'])){
                        $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Added a new complaint from: '.$_POST['complainee']);
                    }
                    else{
                        $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Updated complaint with ID: '.$_POST['id']);
                    }
                    return $this->respond(['status' => 1, 'message' => 'Complaint has been saved'], 200);
                }
                else{
                    return $this->fail(['status' => -1, 'message' => 'Database error occured. Please contact administrator']);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function resolve(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $complaints = new \App\Entities\Complaint();
                $complaintModel = new \App\Models\ComplaintsModel();
                $data = array(
                    'id' => $_POST['id'],
                    'resolution' => $_POST['resolution'],
                    'status' => 'Resolved'
                );
                $complaints->fill($data);
                if($complaintModel->save($data)){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Resolved complaint with ID: '.$_POST['id']);
                    return $this->respond(['status' => 1, 'message' => 'Complaint has been resolved'], 200);
                }
                else{
                    return $this->fail(['status' => -1, 'message' => 'Database error occured. Please contact administrator']);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function getnotes(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $notes = new \App\Entities\Notes();
                $notesModel = new \App\Models\NotesModel();
                $notesModel->where('deleted_at =', null);
                $notesModel->where('complaintid', $_GET['complaintid']);
                $notes = $notesModel->findAll();
                return $this->respond(json_encode($notes), 200);
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function removenotes(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $notes = new \App\Entities\Notes();
                $notesModel = new \App\Models\NotesModel();
                if($notesModel->delete($_POST['noteid'])){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Remove notes on complaint with Note ID: '.$_POST['noteid']);
                    return $this->respond(['status' => 1, 'message' => 'Complaint note has been deleted']);
                }
                else{
                    return $this->fail('Failed to remove to database. Contact administrator for assistance');
                }
                
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function addnotes(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $notes = new \App\Entities\Notes();
                $notesModel = new \App\Models\NotesModel();
                $data = array(
                    'complaintid' => $_POST['complaintid'],
                    'notes' => $_POST['notes'],
                    'enteredby' => $session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename')
                );
                $notes->fill($data);
                if($notesModel->save($notes)){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Added notes on complaint with Complaint ID: '.$_POST['complaintid']);
                    return $this->respond(['status' => 1, 'message' => 'Notes has been added to complaint']);
                }
                else{
                    return $this->fail(['status' => -1, 'message' => 'Database connection error. Please contact your administrator']);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function getclearancerequests(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $clearance = new \App\Entities\Clearance();
                $clearanceModel = new \App\Models\ClearanceModel();
                $clearanceModel->where('deleted_at =', null);
                if(isset($_GET['status'])){
                    $clearanceModel->where('status', $_GET['status']);
                }
                else{
                    $clearanceModel->where('status != ', 'Completed');
                }
                $clearance = $clearanceModel->findAll();
                return $this->respond(json_encode($clearance), 200);
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function addclearancerequest(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $clearance = new \App\Entities\ClearanceMain();
                $clearanceModel = new \App\Models\ClearanceMainModel();
                $data = array(
                    'requestedby' => $_POST['residentid'],
                    'purpose' => $_POST['purpose']
                );
                $clearance->fill($data);
                if($clearanceModel->save($clearance)){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Added clearance request requested by Resident ID: '.$_POST['residentid']);
                    return $this->respond(['status' => 1, 'message' => 'Clearance request has been added!'], 200);
                }
                else{
                    return $this->fail(['status' => -1, 'message' => 'Database connection failure. Please contact administrator']);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function gettransactions(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                if($_GET['status'] == 'Pending'){
                    $clearance = new \App\Entities\Clearance();
                    $clearanceModel = new \App\Models\ClearanceModel();
                    $clearanceModel->where('deleted_at =', null);
                    $clearanceModel->where('status != ', 'Completed');
                    $clearance = $clearanceModel->findAll();
                    return $this->respond(json_encode($clearance), 200);
                }
                elseif($_GET['status'] == 'Completed'){
                    $clearance = new \App\Entities\Clearance();
                    $clearanceModel = new \App\Models\ClearanceModel();
                    $clearanceModel->where('deleted_at =', null);
                    $clearanceModel->where('status', 'Completed');
                    $clearance = $clearanceModel->findAll();
                    return $this->respond(json_encode($clearance), 200);
                }
                else{
                    $transactionView = new \App\Entities\TransactionView();
                    $transactionViewModel = new \App\Models\TransactionViewModel();
                    $transactionViewModel->where('deleted_at =', null);
                    $transactionViewModel->where('status !=', 'Pending');
                    $transactionView = $transactionViewModel->findAll();
                    return $this->respond(json_encode($transactionView), 200);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function completeclearance(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $clearance = new \App\Entities\Clearance();
                $clearanceModel = new \App\Models\ClearanceModel();
                $data = array(
                    'id' => $_POST['id'],
                    'status' => 'Completed'
                );
                $clearance->fill($data);
                if($clearanceModel->save($clearance)){
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Completed clearance request with Clearance ID: '.$_POST['id']);
                    return $this->respond(['status' => 1, 'message' => 'Request completed successfully'], 200);
                }
                else{
                    return $this->respond(['status' => -1, 'message' => 'Database could not be updated. Please contact your administrator for support']);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    public function createpayment(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $transaction = new \App\Entities\Transactions();
                $transactionModel = new \App\Models\TransactionModel();
                $data = array(
                    'requestid' => $_POST['requestid'],
                    'ornumber' => $_POST['ornumber'],
                    'amountpaid' => $_POST['amountpaid']
                );
                $transaction->fill($data);
                if($transactionModel->save($transaction)){
                    $request = new \App\Entities\ClearanceMain();
                    $requestModel = new \App\Models\ClearanceMainModel();
                    $request->fill(array(
                        'id' => $_POST['requestid'],
                        'status' => 'Paid'
                    ));
                    $requestModel->save($request);
                    $this->addToSystemActivities($session->get('lastname').', '.$session->get('firstname').' '.$session->get('middlename'), 'Created payment for Request ID: '.$_POST['requestid']);
                    return $this->respond(['status' => 1, 'message' => 'Payment complete'], 200);
                }
                else{
                    return $this->fail(['status' => -1, 'message' => 'Failed to create payment. Please contact administrator for support']);
                }
            }
            else{
                echo view('errors/html/error_404');
            }
        }
    }

    //for profile management
    public function getprofile(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $user = new \App\Entities\User();
                $userModel = new \App\Models\UserModel();
                $user = $userModel->find($session->get('userid'));
                return $this->respond(json_encode($user), 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function updateprofile(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $user = new \App\Entities\User();
                $userModel = new \App\Models\UserModel();
                $data = array(
                    'userid' => $session->get('userid'),
                    'lastname' => $_POST['lastname'],
                    'firstname' => $_POST['firstname'],
                    'middlename' => $_POST['middlename'],
                    'contactnumber' => $_POST['contactnumber'],
                    'address' => $_POST['address'],
                    'email' => $_POST['email']
                );
                $user->fill($data);
                if($userModel->save($user)){
                    $session->set($data);
                    $this->addToUserActivity($session->get('userid'), 'Updated profile information');
                    return $this->respond(['status' => 1, 'message' => 'Profile updated successfully']);
                }
                else{
                    return $this->respond(['status' => -1, 'message' => 'Database could not be updated. Please contact administrator for support']);
                }
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function updatepassword(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $user = new \App\Entities\User();
                $userModel = new \App\Models\UserModel();
                $data = array(
                    'userid' => $session->get('userid'),
                    'loginpassword' => $_POST['password']
                );
                $user->fill($data);
                if(!password_verify($_POST['oldpassword'], $session->get('loginpassword'))){
                    return $this->respond(['status' => -1, 'message' => 'Your old password is incorrect']);
                }
                elseif($userModel->save($user)){
                    $session->set($data);
                    $this->addToUserActivity($session->get('userid'), 'Changed login password');
                    return $this->respond(['status' => 1, 'message' => 'Password updated successfully']);
                }
                else{
                    return $this->respond(['status' => -1, 'message' => 'Database could not be updated. Please contact administrator for support']);
                }
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function getuseractivities(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $activity = new \App\Entities\UserActivity();
                $activityModel = new \App\Models\UserActivityModel();
                $activityModel->where('userid', $session->get('userid'));
                $activity = $activityModel->findAll();
                return $this->respond(json_encode($activity), 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

    public function getsystemactivities(){
        if(!$this->request->isAJAX()){
            echo view('errors/html/error_404');
        }
        else{
            $session = session();
            if($session->get('islogged')){
                $activity = new \App\Entities\SystemActivity();
                $activityModel = new \App\Models\SystemActivitiesModel();
                $activity = $activityModel->findAll();
                return $this->respond(json_encode($activity), 200);
            }
            else{
                return $this->failForbidden('You are not allowed to access');
            }
        }
    }

}