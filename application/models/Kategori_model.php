<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    
    private $table = 'kategori';
    
    public function get_all() {
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get($this->table)->result();
    }
    
    public function get_by_id($id) {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }
    
    public function get_by_slug($slug) {
        return $this->db->get_where($this->table, array('slug' => $slug))->row();
    }
    
    public function create($data) {
        $insert_data = array(
            'nama_kategori' => $data['nama_kategori'],
            'slug' => url_title($data['nama_kategori'], 'dash', true),
            'description' => isset($data['description']) ? $data['description'] : null,
            'created_at' => date('Y-m-d H:i:s')
        );
        return $this->db->insert($this->table, $insert_data);
    }
    
    public function update($id, $data) {
        $update_data = array(
            'nama_kategori' => $data['nama_kategori'],
            'slug' => url_title($data['nama_kategori'], 'dash', true),
            'description' => isset($data['description']) ? $data['description'] : null,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        return $this->db->update($this->table, $update_data);
    }
    
    public function delete($id) {
        return $this->db->delete($this->table, array('id' => $id));
    }

	public function get_dropdown()
	{
		$result = $this->db->get('kategori')->result();
		$data = [];
		foreach ($result as $row) {
    	$data[$row->id] = $row->nama_kategori;
		}

	return $data;
	}
}
