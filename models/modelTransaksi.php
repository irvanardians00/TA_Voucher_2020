<?php 
require 'auth.php';

class modelTransaksi extends auth 
{
	private $datatransaksi;

	function select()
	{
		$sqltext="SELECT * FROM TRANSAKSI_06847";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);


		while ($row=oci_fetch_array($statement,OCI_BOTH))
			{
				$temp[]=$row;	
			}
			$this->datatransaksi=$temp;

			oci_free_statement($statement);
	}

	function insert($id,$id2,$no,$id3,$bank)
	{
		$sqltext ="INSERT INTO TRANSAKSI_06847 VALUES('$id','$id2','$no','$id3','$bank')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datatransaksi; 
	}
	function viewData()
	{
		foreach ($this->datatransaksi as $key) 
		{
			echo $key['ID_TRANSAKSI'];
			echo " -> ";
			echo $key['ID_PEMBELI'];
			echo " -> ";
			echo $key['NO'];
			echo " -> ";
			echo $key['ID_VOUCHER'];
			echo " -> ";
			echo $key['BANK'];
			echo "<br>";

		}
	}
	function delete($id)
	{
		$sqltext ="DELETE FROM TRANSAKSI_06847 WHERE ID_TRANSAKSI='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);		
	}
	function update($id,$id2,$no,$id3,$bank)
	{
		$sqltext ="UPDATE TRANSAKSI_06847 SET ID_PEMBELI='$id2', BANK='$bank', NO='$no', ID_VOUCHER='$id3' WHERE ID_TRANSAKSI='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);	
	}
}


//$objModelTransaksi=new modelTransaksi();
//$objModelTransaksi->insert('5','5','5','5','5');
//$objModelTransaksi->delete('5');
//$objModelAdmin->edit('1','dindin','coba');
//$objModelTransaksi->select();
//$objModelTransaksi->viewData();
?>