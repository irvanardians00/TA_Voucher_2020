<?php 
require 'auth.php';

class modelVoucher extends auth 
{
	private $datavoucher;

	function select()
	{
		$sqltext="SELECT * FROM VOUCHER_06847";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);


		while ($row=oci_fetch_array($statement,OCI_BOTH))
			{
				$temp[]=$row;	
			}
			$this->datavoucher=$temp;

			oci_free_statement($statement);
	}

	function insert($id,$stok,$nomi,$nm)
	{
		$sqltext ="INSERT INTO VOUCHER_06847 VALUES('$id','$stok','$nomi','$nm')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datavoucher; 
	}
	function viewData()
	{
		foreach ($this->datavoucher as $key) 
		{
			echo $key['ID_VOUCHER'];
			echo " -> ";
			echo $key['STOK'];
			echo " -> ";
			echo $key['NOMINAL'];
			echo " -> ";
			echo $key['NAMA_VOUCHER'];
			echo "<br>";

		}
	}
	function delete($id)
	{
		$sqltext ="DELETE FROM VOUCHER_06847 WHERE ID_VOUCHER='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);		
	}
	function update($id,$stok,$nomi,$nm)
	{
		$sqltext ="UPDATE VOUCHER_06847 SET NAMA_VOUCHER='$nm', STOK='$stok', NOMINAL='$nomi' WHERE ID_VOUCHER='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);	
	}
}


//$objModelVoucher=new modelVoucher();
//$objModelVoucher->insert('1','120','30000','Lyto');
//$objModelPembeli->delete('1');
//$objModelVoucher->update('1','121','212121','Lyto');
//$objModelVoucher->select();
//$objModelVoucher->viewData();
?>