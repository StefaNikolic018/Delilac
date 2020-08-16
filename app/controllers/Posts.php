<?php 
//Define a class
class Posts extends Controller {

    //Constructor
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');

        if(!isLoggedIn()){
            flash('login_err','You need to login first!','alert alert-danger');
            redirect('users/login');
        }
    }

    //Listing posts
    public function index(){
        //Get posts
        $posts = $this->postModel->getPosts();

        $data=[
            'view' =>'posts/index',
            'title'=>'Posts',
            'posts'=>$posts

        ];
        $this->view('posts/layout',$data);
    }

    //Listing single post
    public function show($id){
        //Get post
        $post=$this->postModel->singlePost($id);

        $data=[
            'view'=>'posts/show',
            'title'=>'Post',
            'post'=>$post
        ];
        $this->view('posts/layout',$data);
    }

    //Adding post
    public function add(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            //Sanitizing input array
             $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             $data= [
                 'view'=>'posts/addpost',
                 'title'=>'Add post',
                 'post_body'=>isset($_POST['body1']) ? trim($_POST['body1']) : '',
                 'post_user_id'=>$_SESSION['user_id'],
                 'img'=>'',
                 'error'=>[
                     'title_err'=>'',
                     'body_err'=>'',
                     'img_err'=>''
                 ]
             ];

            if(isset($_FILES['image'])){
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $tmp = explode('.', $file_name);
                $file_ext = end($tmp);
                $file_ext=strtolower($file_ext);

                $extensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$extensions) === false){
                   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152){
                   $errors[]='File size must be exactely 2 MB';
                }

                if(empty($errors)==true){
                   move_uploaded_file($file_tmp,"./img/".$file_name);
                   $data['img']=$file_name;
                }else{
                    //If file is empty
                   $data['error']['img_err']='Please upload an image';
                }
            }


            //Validate title
            if(empty($data['post_title'])){
                $data['error']['title_err']='Please fill the title';
            } else {
                if(strlen($data['post_title'])<3){
                    $data['error']['title_err']='Title must be greater than 3 characters';
                }
            }

            //Validating body input
            if(empty($data['post_body'])){
                $data['error']['body_err']='Please fill the body';
            } else {
                if(strlen($data['post_body'])<10){
                    $data['error']['body_err']='Body text must be greater than 10 characters';
                }
            }

            //Make shure no errors
            if(empty($data['error']['title_err']) && empty($data['error']['body_err']) && empty($data['error']['img_err'])){
                if($this->postModel->store($data)){
                    flash('post_success','Post added');
                    redirect('posts');
                } else {
                    DIE('something went wrong');
                }

                
            } else {
                $this->view('posts/layout',$data);

            }




        } else {
            
            $data= [
                'view'=>'posts/addpost',
                'title'=>'Add post',
                'post_body'=>'',
                'img'=>'',
                'post_user_id'=>$_SESSION['user_id'],
                'error'=>[
                    'title_err'=>'',
                    'body_err'=>''
                ]
            ];

            $this->view('posts/layout',$data);
            
        }


        
            

        }

    //Update
    public function edit($id){

if($_SERVER['REQUEST_METHOD']=='POST'){

            //Sanitizing input array
             $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data= [
                'view'=>'posts/edit',
                'title'=>'Edit post',
                'post_body'=>isset($_POST['body1']) ? trim($_POST['body1']) : '',
                'post_user_id'=>$_SESSION['user_id'],
                'post_id'=>$id,
                'img'=>'',
                'error'=>[
                    'title_err'=>'',
                    'body_err'=>''
                ]
            ];

            //Validate title
            if(empty($data['post_title'])){
                $data['error']['title_err']='Please fill the title';
            } else {
                if(strlen($data['post_title'])<3){
                    $data['error']['title_err']='Title must be greater than 3 characters';
                }
            }

            //Validating body input
            if(empty($data['post_body'])){
                $data['error']['body_err']='Please fill the body';
            } else {
                if(strlen($data['post_body'])<10){
                    $data['error']['body_err']='Body text must be greater than 10 characters';
                }
            }

            //Make shure no errors
            if(empty($data['error']['title_err']) && empty($data['error']['body_err'])){
                if($this->postModel->editPost($data)){
                    flash('post_success','Post Edited');
                    redirect('posts/show/'.$id);
                } else {
                    DIE('something went wrong');
                }

                
            } else {
                $this->view('posts/layout',$data);

            }




        } else {

            $post=$this->postModel->singlePost($_SESSION['user_id']);
            
            $data= [
                'view'=>'posts/edit',
                'title'=>'Edit post',
                'post_body'=>isset($post->body) ? $post->body : '',
                'post_user_id'=>$_SESSION['user_id'],
                'img'=>isset($post->img) ? $post->img : 'img.jpg',
                'post'=>$post,
                'error'=>[
                    'title_err'=>'',
                    'body_err'=>''
                ]
            ];

            $this->view('posts/layout',$data);
            
        }


    }

    //Delete
    public function delete($id){
        if($this->postModel->deletePost($id)){
            flash('post_success','Post Deleted');
            redirect('posts');
        } else {
            flash('post_err','Error');
            redirect('posts');
        }
    }
}