<?php 
//Define a class

class Users extends Controller{

    //Constructor
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->authModel = $this->model('Auth');
    }

    //Form handling and geting register page
    public function register()
    {
        //Check for POST
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //Process form

            //Filtering post input
            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'=>'Register',
                'view'=>'users/register',
                'name'=>trim($_POST['name']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'error'=>[
                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>''
                    ]
                ];

                //Validate email
                if(empty($data['email'])){
                    $data['error']['email_err'] = 'Please enter email ';
                } else {
                    //Check email in db
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['error']['email_err']='Email is already taken!';
                    }
                }

                
                //Validate name
                if(empty($data['name'])){
                    $data['error']['name_err'] = 'Please enter name';
                }

                
                //Validate password
                if(empty($data['password'])){
                    $data['error']['password_err'] = 'Please enter password';
                } elseif(strlen($data['password'])<6) {
                    $data['error']['password_err'] = 'Password must be at least 6 characters';
                }

                
                //Validate confirm password
                if(empty($data['confirm_password'])){
                    $data['error']['confirm_password_err'] = 'Please confirm password!';
                } elseif( $data['password'] != $data['confirm_password']) {
                    $data['error']['confirm_password_err']= ' Passwords do not match';
                }

                //Make sure error are empty
                $br=0;
                foreach($data['error'] as $err)
                {
                    if(!empty($err)){
                        $br++;
                    }
                }
                if($br==0){
                          
                    // VALIDATED

                   //Hash password
                   $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);

                   //Register user
                   if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                   } else {
                       $data['title']='Something went wrong!';
                       $this->view('users/layout',$data);
                   }

                } else {
                    
                                    //Load view
                                    
                                    $this->view('users/layout',$data);

                }

        } else {
            //Init data
            $data = [
                'title'=>'Register',
                'view'=>'users/register',
                'name'=>'',
                'email'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'error'=>[
                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>''
                    ]
                ];

                //Load view
                if(isLoggedIn()){
                    redirect('posts/');
                } else {

                    $this->view('users/layout',$data);
                }
            
        }

    }

    //Form handling and getting login page
    public function login()
    {

        //Check for POST
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $isAuth=false;
            //Process form
            //Filtering post input
            $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'=>'Login',
                'view'=>'users/login',
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'error'=>[
                    'email_err'=>'',
                    'password_err'=>''
                    ]
                ];

                //Validate email
                if(empty($data['email'])){
                    $data['error']['email_err'] = 'Please enter email ';
                }
                
                //Validate password
                if(empty($data['password'])){
                    $data['error']['password_err'] = 'Please enter password ';
                }

                //Check for user/email
                if($this->userModel->findUserByEmail($data['email'])){
                    //User found
                    $isAuth=true;
                } else {
                    //User not found
                    $data['error']['email_err']='No user found!';
                }

                //Make sure error are empty
                $br=0;
                foreach($data['error'] as $err)
                {
                    if(!empty($err)){
                        $br++;
                    }
                }
                if($br==0){
                          
                           //Validated
                           //Check and set logged in user
                           $loggedInUser = $this->userModel->login($data['email'],$data['password']);

                           if($loggedInUser){
                               //Create session
                               if(empty($_POST['rememberMe'])){
                                   
                                   $this->createUserSession($loggedInUser);

                               } else {
                                   $cookie_expiration_time = time()+60*60*24*30;
                                   $username=$loggedInUser->name;
                                   
                                   setcookie("member_login", $username, $cookie_expiration_time);
                                   
                                   $random_password = random_bytes(16);
                                   $random_password = bin2hex($random_password);
                                   setcookie("random_password", $random_password, $cookie_expiration_time);
                                   
                                   $random_selector = random_bytes(32);
                                   $random_selector = bin2hex($random_selector);
                                   setcookie("random_selector", $random_selector, $cookie_expiration_time);
            
                                   $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
                                   $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
                                   
                                   $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
                                   
                                   // mark existing token as expired
                                   $auth=$this->authModel;
                                   $userToken = $auth->getTokenByUsername($username, 0);
                                   if (! empty($userToken->id)) {
                                       $auth->markAsExpired($userToken->id);
                                    }
                                    // Insert new token
                                    $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
                                    $this->createUserSession($loggedInUser);

                               }
                           } else {
                               $data['error']['password_error']='Password inccorect, try again';

                               $this->view('users/layout',$data);
                           }
                } else {
                    
                                    //Load view
                                    
                                    $this->view('users/layout',$data);

                }

        } else {
            //Init data
            $data = [
                'title'=>'Login',
                'view'=>'users/login',
                'email'=>'',
                'password'=>'',
                'error'=>[
                    'email_err'=>'',
                    'password_err'=>''
                ]
            ];

            if(!empty($_COOKIE['username'])){
                $username=$_COOKIE['username'];
                
                $user=$this->userModel->findUserByUsername($username);
                
                if($user){
                    $this->createUserSession($user);
                    
                } else {
                    $this->view('users/layout',$data);
                }
                
            }

                //Load view
                if(!isLoggedIn()){
                    $this->view('users/layout',$data);
                } else {
                    redirect('posts/');
                }
                
            
        }

    }

    //User session
    public function createUserSession($user){
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        
        redirect('posts/');

    }

    //Logout
    public function logout(){

        $auth=$this->authModel;
        $token_id=$auth->getTokenByUsername($_SESSION['user_name'],0);
        $auth->markAsExpired($token_id->id);

        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        setcookie('member_login','',time() - 3600);
        setcookie('random_password','',time() - 3600);
        setcookie('random_selector','',time() - 3600);

        redirect('users/login');

    }

    

}