<?php 

//Define a class
class Post {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts(){
        $this->db->query('SELECT *,
                          posts.id as postId,
                          users.id as userId,
                          posts.created_at as created
                          FROM posts
                          INNER JOIN users
                          ON posts.user_id=users.id
                          ORDER BY posts.created_at DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function singlePost($user_id1){
        $this->db->query('SELECT *,
                          posts.id as postId,
                          users.id as userId,
                          posts.created_at as created
                          FROM posts
                          INNER JOIN users
                          ON posts.user_id=users.id
                          WHERE posts.user_id=:user_id1
                          ORDER BY posts.created_at DESC');
        $this->db->bind(':user_id1',$user_id1,1);

        $results = $this->db->single();

        return $results;

    }

    //Inserting post in database
    public function store($data){
        $this->db->query('INSERT INTO posts (user_id,body,img) VALUES(:user_id1,:body1,:img1)');
        
        //Bind values
        $this->db->bind(':user_id1',$data['post_user_id']);
        $this->db->bind(':body1',$data['post_body']);
        $this->db->bind(':img1',$data['img']);

       return $this->db->execute() ? true : false;
        
    }

    //Edit post
    public function editPost($data){
        $this->db->query('UPDATE posts 
                          SET
                              title = :title1,
                              body = :body1,
                              img = :img1 
                          WHERE id=:id1;');
        
        //Bind values
        $this->db->bind(':title1',$data['post_title']);
        $this->db->bind(':body1',$data['post_body']);
        $this->db->bind(':id1',$data['post_id']);
        $this->db->bind(':img1',$data['img']);

       return $this->db->execute() ? true : false;
        
    }

    //Delete post
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id=:id1');
        //Bind
        $this->db->bind(':id1',$id);

        return $this->db->execute() ? true : false;
    }


}