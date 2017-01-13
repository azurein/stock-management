<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

	function login($username, $password)
	{
		$this -> db -> select("*");
		$this -> db -> from("msemployee");
		$this -> db -> where("emailEmp = '$username'");
		$this -> db -> where("passEmp = '$password'");
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}
}
?>
