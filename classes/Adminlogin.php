<?php 
  include_once ('../lib/Session.php');
  include_once ('../helpers/Format.php');
  include_once ('../lib/Database.php');
     Session::checkLogin();
 ?>

<?php

class Adminlogin{

	private $db;
	private $fm;
  public function __construct(){
  $this->db=new Database();
  $this->fm=new Format();

   }

   public function adminlogin($adminUser,$adminPass){
    $adminUser=$this->fm->validation($adminUser);
    $adminPass=$this->fm->validation($adminPass);

    	$adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
    	$adminPass=mysqli_real_escape_string($this->db->link,$adminPass);
    	if(empty($adminUser)||empty($adminPass)){

      $loginmsg="UserName And Password must not be empty" ;
      return $loginmsg;

    	}else{
    		$query="SELECT * from tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
    		$result=$this->db->select($query);
    		if($result !=false){

    			$value=$result->fetch_assoc();
    			Session::set("adminlogin",true);
    			Session::set("adminId",$value['adminId']);
    			Session::set("adminUser",$value['adminUser']);
    			Session::set("adminName",$value['adminName']);
    			header("Location:dashboard.php");
    		}else{

    			   $loginmsg="UserName And Password  not Match !" ;
    			      return $loginmsg;
    		}



    	}
   }
}
?>