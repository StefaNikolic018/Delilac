<?php 
//Define a class

class User {

    public function __construct()
    {
        $this->db=new Database;
    }

    //Register user
    public function register($data){
        $this->db->query('INSERT INTO users (name,email,password) VALUES(:name,:email,:password)');
        //Bind values
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);

        //Executing query
        return $this->db->execute() ? true : false;

    }

    //Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email=:email');
        //Bind values
        $this->db->bind(':email',$email);

        //Returning one user
        $row=$this->db->single();

        //Check row
        if($this->db->rowCount()>0){
            return true;
        } else {
            return false;
        }
    }

    //Find user by username
    public function findUserByUsername($username){
        $this->db->query('SELECT * FROM users WHERE username=:username');
        $this->db->bind(':username',$username);

        return $this->db->single();
    }

    //Login User
    public function login($email,$password){
        $this->db->query('SELECT * FROM users WHERE email =:email');
        $this->db->bind(':email',$email);

        $row=$this->db->single();

        $hashed_pass=$row->password;
        if(password_verify($password,$hashed_pass)){
            //SUCCESSFUL LOGIN
            return $row;
        } else {
            return false;
        }
    }
}