<?php
require '../models/modelVoucher.php';

class prosesVoucher
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel=new modelVoucher();
		if ($this->action=="tambah")
		{
			$id=$_POST['inputId'];
			$stok=$_POST['inputstok'];
			$nomi=$_POST['inputNominal'];
			$nm=$_POST['inputNamaVoucher'];
			$objmodel->insert($id,$stok,$nomi,$nm);
			header("location:../views/voucher.php");
		}
		else if ($this->action=="hapus")
		{
			$namavoucher=$_GET['namavoucher'];
			$objmodel->delete($namavoucher);
			header("location:../views/voucher.php");
		}
		else if ($this->action=="edit") 
		{
			$id=$_POST['id'];
			$stok=$_POST['stok'];
			$nomi=$_POST['nominal'];
			$nm=$_POST['namavoucher'];
			$objmodel->update($id,$stok,$nomi,$nm);
			header("location:../views/voucher.php");
		}
	}
}

$objprosesvoucher=new prosesVoucher($_GET['aksi']);
$objprosesvoucher->proses();
?>