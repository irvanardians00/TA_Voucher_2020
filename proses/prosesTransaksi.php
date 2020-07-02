<?php
require '../models/modelTransaksi.php';

class prosesTransaksi
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel=new modelTransaksi();
		if ($this->action=="tambah")
		{
			$id=$_POST['inputId'];
			$id2=$_POST['inputId2'];
			$no=$_POST['inputNo'];
			$id3=$_POST['inputId3'];
			$bank=$_POST['inputBank'];
			$objmodel->insert($id,$id2,$no,$id3,$bank); 
			header("location:../views/datatransaksi.php");
		}
		elseif ($this->action=="hapus")
		{
			$namatransaksi=$_GET['namatransaksi'];
			$objmodel->delete($namatransaksi);
			header("location:../views/datatransaksi.php");
		}
		elseif ($this->action=="edit")
	{
			$id=$_POST['id1'];
			$id2=$_POST['id2'];
			$no=$_POST['no'];
			$id3=$_POST['id3'];
			$bank=$_POST['bank'];
			$objmodel->update($id,$id2,$no,$id3,$bank);
			header("location:../views/datatransaksi.php");
	}
			
}
}

$objprosestransaksi=new prosesTransaksi($_GET['aksi']);
$objprosestransaksi->proses();
?>