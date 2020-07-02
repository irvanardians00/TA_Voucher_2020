<?php
require '../models/modelAdmin.php';

class prosesAdmin
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel=new modelAdmin();
		if ($this->action=="tambah")
		{
			$id=$_POST['inputIdadmin'];
			$nm=$_POST['inputUsername'];
			$pass=$_POST['inputPassword'];
			$objmodel->insert($id,$nm,$pass);
			header("location:../views/dataadmin");
		}
		elseif ($this->action=="hapus")
		{
			$namaadmin=$_GET['namaadmin'];
			$objmodel->delete($namaadmin);
			header("location:../views/dataadmin.php");
		}
		elseif ($this->action=="edit") 
		{
			$id=$_POST['admin'];
			$nm=$_POST['username'];
			$pass=$_POST['password'];
			$objmodel->update($id,$nm,$pass);
			header("location:../views/dataadmin.php");
			
		}
	}
}

$objprosesadmin=new prosesAdmin($_GET['aksi']);
$objprosesadmin->proses();
?>