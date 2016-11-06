<?php
 include_once ('../helpers/Format.php');
  include_once ('../lib/Database.php');
?>


<?php 
class Category{

	private $db;
	private $fm;

 public function __construct(){
  $this->db=new Database();
  $this->fm=new Format();

   }
   public function catInsert($catName){

    $catName=$this->fm->validation($catName);
    	$catName=mysqli_real_escape_string($this->db->link,$catName);


    	if(empty($catName)){

      $msg="<spanclass='error' >UserName And Password must not be empty</span>" ;
      return $msg;

    	}else{
    		$query="INSERT INTO tbl_category (Catname) VALUES($catName)"
    			$catinsrt=$this>db->INSERT($query);
    			if($catinsrt){
                  $msg="<spanclass='success' >UserName And Password must not be empty</span>";
    			}

    	}

   }

}