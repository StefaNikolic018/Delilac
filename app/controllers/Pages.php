<?php 
//Define a class
class Pages extends Controller {

    //Constructor
    public function __construct(){
        //Instance of models here
        $this->userModel=$this->model('User');
        $this->postModel=$this->model('Post');
    }

    //Index method
    public function index()
    {
        if(isLoggedIn()){
            redirect('posts/');
        } else {
            redirect('users/login');
        }

        // TODO: IF USER IS HAS SAVED COOKIES IN BROWSER HE IS GOING TO LOGIN, IF NOT HE IS GOING TO REGISTER

        // //Data array
        // $data = [
        //     'view'=>'pages/index',
        //     'title' => 'Welcome to Delilac !'
        // ];

        

        // //Returning view
        // $this->view('pages/layout',$data);
    }

    //Pages method
    public function about()
    {
        $data = [
            'view'=>'pages/about',
            'title'=>'About'
        ];
        //Returning view
        $this->view('pages/layout',$data);
    }

    public function profile($username){
        

        //Showing profile
        if($_SERVER['REQUEST_METHOD']=='GET'){

            $user=$this->userModel->findUserByUsername($username);
            $posts=$this->postModel->getUserPosts($username);

            $posts_num=count($posts->id);

            $data = [
                'view'=>'pages/profile',
                'title'=>'Profile',
                'username'=>$user->name,
                'bio'=>'',
                'img'=>'',
                'posts'=>$posts,
                'posts_num'=>$posts_num
            ];

            $this->view('pages/layout',$data);

        } else {

        }
    }


}