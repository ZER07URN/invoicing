<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
        public function tambah_admin($in)
    {
        // var_dump($in);die;
        
        if ($this->db->insert('user', $in)) {
            $status =  true;
        } else {
            var_dump($this->db->error());
            die();
            $status = false;
        }
        return $status;
    }
    public function data_AllAdmin($post)

	{
		$columns = array(
			'nama_admin',			'email',
			'status',			'created',
		);
		// untuk search
		$columnsSearch = array(
			'nama_admin',			'email',
		);
		$from = 'user u';
		// custom SQL

		$sql = "SELECT* FROM {$from} join user_role ur on ur.id_user=u.id_user
		";
		$where = "";
		// if (isset($post['id_kelas']) && $post['id_kelas'] != 'default') {
		// 	if ($where != "") $where .= "AND";

		// 	$where .= " (s.id_kelas='" . $post['id_kelas'] . "')";
		// }

		$whereTemp = "";
		
		if ($whereTemp != '' && $where != '') $where .= " AND (" . $whereTemp . ")";

		else if ($whereTemp != '') $where .= $whereTemp;
		
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
	public function editDariTable($table,$in, $id_admin)
	{
		$this->db->where('id_user', $id_admin);

		return $this->db->update($table, $in);

		//  $sql2 = "UPDATE admin WHERE id_admin='$id_admin'";

		// return	$this->db->query($sql2);
		// die();
	}
	public function getAdminById($id_admin)
	{
		$this->db->where('id_user', $id_admin);
		return $this->db->get('user')->result();
	}
	public function hapusDariTable($table,$id_admin)
	{
		// // $this->db->trans_start();

		// $this->db->where('id_admin', $id_admin)
		// 	->delete('admin');
		// $this->db->reset_query();
		// $this->db->where('id_admin', $id_admin)
		// 	->delete('admin_role');

		// if ($this->db->trans_status() === FALSE) {
		// 	$this->db->trans_rollback();
		// 	return false;
		// } else {
		// 	$this->db->trans_commit();
		// 	return true;
		// }
		$this->db->where('id_user', $id_admin);
		$this->db->delete($table);

	}
	public function login($username)
	{
		$this->db->select('*');
		$this->db->where('email', $username);
		// $this->db->where('password', $password);
		return $this->db->get('user');
	}


    
}
