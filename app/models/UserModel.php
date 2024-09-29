<?php
class UserModel{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function insertUser($username, $email, $password){
        $insert =$this->con->prepare('INSERT INTO users(username, email, password) VALUES(?, ?, ?)');
        return $insert->execute([$username, $email, $password]);
    }
    public function getAllUser(){
        $req = 'SELECT * FROM users';
        $stmt = $this->con->query($req);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserById(string $id)
    {
        $query = $this->con->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function searchUser($r){
        $req = 'SELECT * FROm users WHERE username LIKE "%'.$r.'%" ';
        $stmt = $this->con->query($req);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateUser($id, $username, $email, $password){
        $updateUser = $this->con->prepare('UPDATE users SET username=?, email=?, password=? WHERE id=?');
        return $updateUser->execute(array($username, $email, $password, $id));
    }
    public function deleteUser($id){
        $users = $this->getUserById($id);
        if ($users->rowCount() > 0){
            $suppr = $this->con->prepare('DELETE FROM users WHERE id = ?');
            $suppr->execute(array($id));
        }else{echo "aucun user n'a eté trouver";}
    }
}
?>