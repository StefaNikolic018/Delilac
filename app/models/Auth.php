<?php 

class Auth {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    function getMemberByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE name =:named');
        $this->db->bind(':named',$username);
        $result = $this->db->single();
        return $result;
    }
    
	function getTokenByUsername($username,$expired) {
        $this->db->query('SELECT * FROM token_auth WHERE username =:username AND is_expired =:expired');
        $this->db->bind(':username',$username);
        $this->db->bind(':expired',$expired,1);
	    $result = $this->db->single();
	    return $result;
    }
    
    function markAsExpired($tokenId) {
        $this->db->query('UPDATE token_auth SET is_expired =1 WHERE id =:id');
        $this->db->bind(':id',$tokenId,1);
        $result = $this->db->execute();
        return $result;
    }
    
    function insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date) {
        $this->db->query('INSERT INTO token_auth (username, password_hash, selector_hash, expiry_date) VALUES (:username,:pass_hash,:select_hash,:expiry)');
        $this->db->bind(':username',$username);
        $this->db->bind(':pass_hash',$random_password_hash);
        $this->db->bind(':select_hash',$random_selector_hash);
        $this->db->bind(':expiry',$expiry_date);

        return $this->db->execute() ? true : false;

    }
    
    function update($query) {
        $this->db->query($this->conn,$query);
    }



}
