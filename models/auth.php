<?php
class auth
{
	private $uname='IrvanArdi_06847';
	private $pass='IrvanArdi';
	private $host='localhost/xE';
	protected $koneksi;

	function __construct()
	{
		$konek=oci_connect($this->uname, $this->pass, $this->host);
		if($konek)
		{
			//echo "Berhasil Konek";
			$this->koneksi=$konek;
		}
		else
		{
			echo "gagal";
		}
	}
}
?>