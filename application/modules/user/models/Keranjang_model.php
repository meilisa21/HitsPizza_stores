<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

	public function get_produk_all()
	{
		$query = $this->db->get('products');
		return $query->result_array();
	}
	
	public function get_produk_kategori($kategori)
	{
		if($kategori>0)
			{
				$this->db->where('category',$kategori);
			}
		$query = $this->db->get('products');
		return $query->result_array();
	}
	
	public function get_kategori_all()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	
	public  function get_produk_id($id)
	{
		$this->db->select('products.*,category_name');
		$this->db->from('products');
		$this->db->join('category', 'kategori=category.id','left');
   		$this->db->where('product_id',$id);
        return $this->db->get();
    }	
	
	public function tambah_pelanggan($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function tambah_order($data)
	{
		$this->db->insert('tbl_order', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function tambah_detail_order($data)
	{
		$this->db->insert('tbl_detail_order', $data);
	}
}
?>