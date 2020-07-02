<?php 
require 'auth.php';

class modelPembeli extends auth 
{
	private $datapembeli;

	function select()
	{
		$sqltext="SELECT * FROM PEMBELI_06847";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);


		while ($row=oci_fetch_array($statement,OCI_BOTH))
			{
				$temp[]=$row;	
			}
			$this->datapembeli=$temp;

			oci_free_statement($statement);
	}

	function insert($id,$nm,$pass,$hp)
	{
		$sqltext ="INSERT INTO PEMBELI_06847 VALUES('$id','$nm','$pass',$hp)";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->datapembeli; 
	}
	function viewData()
	{
		foreach ($this->datapembeli as $key) 
		{
			echo $key['ID_PEMBELI'];
			echo " -> ";
			echo $key['USERNAME'];
			echo " -> ";
			echo $key['PASSWORD'];
			echo " -> ";
			echo $key['NO_HP'];
			echo "<br>";

		}
	}
	function delete($id)
	{
		$sqltext ="DELETE FROM PEMBELI_06847 WHERE ID_PEMBELI='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);		
	}
	function update($id,$nm,$pass,$hp)
	{
		$sqltext ="UPDATE PEMBELI_06847 SET USERNAME='$nm', PASSWORD='$pass', NO_HP='$hp' WHERE ID_PEMBELI='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);	
	}
}


//$objModelPembeli=new modelPembeli();
//$objModelPembeli->insert('6','tes1123','lul11','13123123');
//$objModelPembeli->delete('1');
//$objModelPembeli->edit('1','cob12a','coba132','6231231231231');
//$objModelPembeli->select();
//$objModelPembeli->viewData();
?>