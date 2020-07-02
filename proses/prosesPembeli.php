<?php
require '../models/modelPembeli.php';

class prosesPembeli
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel=new modelPembeli();
		if ($this->action=="tambah")
		{
			$id=$_POST['inputIdPembeli'];
			$nm=$_POST['inputUsername'];
			$pass=$_POST['inputPassword'];
			$hp=$_POST['inputNO'];
			$objmodel->insert($id,$nm,$pass,$hp); 
			header("location:../views/datapembeli.php");
		}
		elseif ($this->action=="hapus")
		{
			$namapembeli=$_GET['namapembeli'];
			$objmodel->delete($namapembeli);
			header("location:../views/datapembeli.php");
		}
		elseif ($this->action=="edit")
		{
			$id=$_POST['idPembeli'];
			$nm=$_POST['username'];
			$pass=$_POST['password'];
			$hp=$_POST['nomer'];
			$objmodel->update($id,$nm,$pass,$hp);
			header("location:../views/datapembeli.php");
		}
	}
}

$objprosespembeli=new prosesPembeli($_GET['aksi']);
$objprosespembeli->proses();
?>