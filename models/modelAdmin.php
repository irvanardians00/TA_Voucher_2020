<?php 
require 'auth.php';

class modelAdmin extends auth 
{
	private $dataadmin;

	function select()
	{
		$sqltext="SELECT * FROM ADMIN_06847";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);


		while ($row=oci_fetch_array($statement,OCI_BOTH))
			{
				$temp[]=$row;	
			}
			$this->dataadmin=$temp;

			oci_free_statement($statement);
	}

	function insert($id,$nm,$pass)
	{
		$sqltext ="INSERT INTO ADMIN_06847 VALUES('$id','$nm','$pass')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
	}

	function getData()
	{
		return $this->dataadmin; 
	}
	function viewData()
	{
		foreach ($this->dataadmin as $key) 
		{
			echo $key['ID_ADMIN'];
			echo " -> ";
			echo $key['USERNAME'];
			echo " -> ";
			echo $key['PASSWORD'];
			echo "<br>";

		}
	}
	function delete($id)
	{
		$sqltext ="DELETE FROM ADMIN_06847 WHERE ID_ADMIN='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);		
	}
	function update($id,$nm,$pass)
	{
		$sqltext ="UPDATE ADMIN_06847 SET USERNAME='$nm', PASSWORD='$pass' WHERE ID_ADMIN='$id'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);	
	}
}


//$objModelAdmin=new modelAdmin();
//$objModelAdmin->insert('1','tes11','lul');
//$objModelAdmin->delete('9');
//$objModelAdmin->edit('1','dindin','coba');
//$objModelAdmin->select();
//$objModelAdmin->viewData();
?>