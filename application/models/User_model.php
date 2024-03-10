<?php
class User_model extends CI_model{

    function create($formArray)
{
    $this->db->insert('users', $formArray); // Insert INto users (name, email) values (? , ?);
}
function all() {
    return $users = $this->db->get('users')->result_array(); // select * from users
}
function getUser($userID){
    $this->db->where('user_id',$userID);
    return $user = $this->db->get('users')->row_array(); // select * from users wherre userid = ?
}
  function updateUser($user_ID, $formArray){

    $result = $this->db->where('user_id',$user_ID)->update('users',$formArray);
    return $result;

  }
  function deleteUser($user_ID){
    $this->db->where('user_id',$user_ID);
    $this->db->delete('users');   //DELETE from users where user_id = ?
    return $result;
}
}
