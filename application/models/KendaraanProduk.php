<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class KendaraanModel extends CI_Model {
                        
public function login(){
                        
                                
}
	public function data_AllProduk($post)

	{
		$columns = array(
			'nama_produk','status'
		);
		// untuk search
		$columnsSearch = array(
			'nama_produk',		
		);
		$from = 'produk u';
		// custom SQL

		$sql = "SELECT* FROM {$from} 
		";
		$where = "";
		// if (isset($post['id_kelas']) && $post['id_kelas'] != 'default') {
		// 	if ($where != "") $where .= "AND";

		// 	$where .= " (s.id_kelas='" . $post['id_kelas'] . "')";
		// }

		$whereTemp = "";

		if ($whereTemp != '' && $where != ''
		) $where .= " AND (" . $whereTemp . ")";

		else if ($whereTemp != ''
		) $where .= $whereTemp;

		if (isset($post['search']['value']) && $post['search']['value'] != '') {
			$search = $post['search']['value'];
			$whereTemp = "";

			for ($i = 0; $i < count($columnsSearch); $i++) {

				$whereTemp .= $columnsSearch[$i] . ' LIKE "%' . $search . '%"';

				if ($i < count($columnsSearch) - 1) {

					$whereTemp .= ' OR ';
				}
			}
			if ($where != '') $where .= " AND (" . $whereTemp . ")";
			else $where .= $whereTemp;
		}

		if ($where != '') $sql .= ' WHERE (' . $where . ')';
		$sortColumn = isset($post['order'][0]['column']) ? $post['order'][0]['column'] : 1;

		$sortDir    = isset($post['order'][0]['dir']) ? $post['order'][0]['dir'] : 'asc';
		$sortColumn = $columns[$sortColumn - 1];
		$sql .= " ORDER BY {$sortColumn} {$sortDir}";

		$count = $this->db->query($sql);
		$totaldata = $count->num_rows();
		$start  = isset($post['start']) ? $post['start'] : 0;
		$length = isset($post['length']) ? $post['length'] : 10;
		$sql .= " LIMIT {$start}, {$length}";
		$data  = $this->db->query($sql);
		return array(

			'totalData' => $totaldata,

			'data' => $data,

		);
	}
	public function tambah_admin($in)
	{
		// var_dump($in);die;

		if ($this->db->insert('produk', $in)) {
			$status =  true;
		} else {
			var_dump($this->db->error());
			die();
			$status = false;
		}
		return $status;
	}
	public function editDariTable($table, $in, $id_admin,$id_table)
	{
		$this->db->where($id_table, $id_admin);

		return $this->db->update($table, $in);

		//  $sql2 = "UPDATE admin WHERE id_admin='$id_admin'";

		// return	$this->db->query($sql2);
		// die();
	}
	public function getById($id_admin)
	{
		$this->db->where('id_produk', $id_admin);
		return $this->db->get('produk')->result();
	}
	public function hapusDariTable($table, $id_admin,$id_table)
	{
		$this->db->where($id_table, $id_admin);
		$this->db->delete($table);
	}
                        
                            
                        
}
                        
/* End of file Produk.php */
    
                        