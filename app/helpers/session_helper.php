<?php 
session_start();

//Flash message helper
//EXAMPLE -> flash('register_success','You are now registered','alert alert danger');
//DISPLAY IN VIEW -> echo flash('register_success'); 
function flash($name='',$message='',$class='alert alert-success'){
    //If name is not empty
    if(!empty($name)){
        //If there is message that is not in session
        if(!empty($message) && empty($_SESSION[$name])){
            //Unseting sessions just in case
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name.'_class'])){
                unset($_SESSION[$name.'_class']);
            }
            //Giving that session a message
            $_SESSION[$name]=$message;
            //Giving class to class session
            $_SESSION[$name.'_class']=$class;
        } elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
            echo "<div class='".$class." text-center' id='msg-flash'>".$_SESSION[$name]."</div>";
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}


    //Is logged in
    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }