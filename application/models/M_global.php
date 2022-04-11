<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_global extends CI_Model
{

	public function tampil($tabel, $primary_key)
	{
		$this->db->from($tabel);
		$this->db->order_by($primary_key, 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function tampil_asc($tabel, $primary_key)
	{
		$this->db->from($tabel);
		$this->db->order_by($primary_key, 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function tampil_edit($tabel, $primary_key)
	{
		$this->db->from($tabel);
		// $this->db->order_by($primary_key, 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tampil_id($id, $tabel, $primary_key)
	{
		$this->db->where($primary_key, $id);
		return $this->db->get($tabel)->result();
	}
	public function tampil_id_desc($id, $tabel, $primary_key, $id_primary)
	{
		$this->db->where($primary_key, $id);
		$this->db->from($tabel);
		$this->db->order_by($id_primary, 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}


	public function edit($id, $tabel, $data, $primary_key)
	{
		$this->db->where($primary_key, $id);
		$this->db->update($tabel, $data);
	}

	public function hapus($id, $tabel, $primary_key)
	{
		$this->db->where($primary_key, $id);
		$this->db->delete($tabel);
	}

	public function tampil_file($tabel, $primary_key, $id)
	{
		$this->db->where($primary_key, $id);
		$query = $this->db->get($tabel);
		if ($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function login($email, $password)
	{
		$data = array(
			'email' => $email,
			'password' => $password,
		);

		$this->db->where($data);
		return $this->db->get('user');
	}

	public function login_admin($username, $password)
	{
		$data = array(
			'username' => $username,
			'password' => $password,
		);

		$this->db->where($data);
		return $this->db->get('admin');
	}


	public function tampil_dinamis($table, $kolom1, $id1, $kolom2, $id2)
	{
		$query = $this->db->query("	SELECT * FROM $table WHERE $kolom1 = '$id1' AND $kolom2 = '$id2' ");
		return $query->result();
	}
	public function join_dinamis_2($table, $table2, $id_table, $id_table2)
	{
		$query = $this->db->query("	SELECT * FROM $table,$table2 WHERE $table.$id_table = $table2.$id_table2 ");
		return $query->result();
	}
	public function join_id_dinamis_2($table, $table2, $id_table, $id_table2, $column, $id)
	{
		$query = $this->db->query("	SELECT * FROM $table,$table2 WHERE $table.$id_table = $table2.$id_table2 AND $table.$column = '$id'");
		return $query->result();
	}
	public function grup_by_item_price($id_game)
	{
		$query = $this->db->query("	SELECT * FROM `item_price` where id_game = '$id_game'  and kategori = 'npulsa' GROUP by id_game, qty ORDER BY qty * 1");
		return $query->result();
	}
	public function grup_by_item_price_detail($id_game_detail)
	{
		$query = $this->db->query("	SELECT * FROM `item_price_detail` where id_game_detail = '$id_game_detail'  and kategori = 'npulsa' GROUP by id_game_detail, qty ORDER BY qty * 1");
		return $query->result();
	}
	public function result_detail($id_game, $qty, $kategori)
	{
		$query = $this->db->query("	SELECT * FROM item_price where id_game = '$id_game' AND qty = '$qty' AND kategori = '$kategori' ");
		return $query->result();
	}
	public function result_detail2($id_game_detail, $qty, $kategori)
	{
		$query = $this->db->query("	SELECT * FROM item_price_detail where id_game_detail = '$id_game_detail' AND qty = '$qty' AND kategori = '$kategori' ");
		return $query->result();
	}
	public function result_item($id_game, $qty, $id_item)
	{
		$query = $this->db->query("	SELECT * FROM item_price where id_game = '$id_game' AND qty = '$qty' AND id_item = '$id_item' ");
		return $query->result();
	}
	public function item_rel_id($id_game)
	{
		$query = $this->db->query("	SELECT * FROM item_rel,item where item_rel.id_item = item.id_item AND item_rel.id_game = '$id_game'");
		return $query->result();
	}
	public function sosmed()
	{
		$query = $this->db->query("	SELECT * FROM konten, konten_detail where konten.id_konten = konten_detail.id_konten and konten_detail.id_konten = 5 or konten_detail.id_konten = 6");
		return $query->result();
	}

	public function tampilGame()
	{
	{
		$query = $this->db->query("SELECT * FROM game_detail
		JOIN game ON game_detail.id_game = game.id_game");
		return $query->result();
	}
}

/* End of file m_global.php */
/* Location: ./application/models/m_global.php */