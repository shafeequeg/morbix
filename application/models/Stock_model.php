<?php
class Stock_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

/***************************************************BATCH**********************************************************************/
    
    public function select_stock($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('stock');
        $this->db->join('items','items.item_id=stock.stock_item','left');
        $this->db->join('batch','batch.batch_id=stock.stock_batch','left');
        if(!empty($where_data)){
            $this->db->where($where_data);
        }
        if(!empty($order_by_c)&&!empty($order_by)){
            $this->db->order_by($order_by_c,$order_by);
        }
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query;
    }
    
    

    public function insert_stock($data)
    {
        $query=$this->db->insert('stock', $data);
        $result['status']= $query;
        return $result;
    }
    
    public function update_stock($data)
    {

        $this->db->where('stock_id',$data['stock_id']);
        $query=$this->db->update('stock',$data);
        return $query;

    }

    public function insert_return($data)
    {
        $query=$this->db->insert('return_history ', $data);
        return $query;
    }

    public function delete_damage_stock($data)
    {

        $this->db->where('stock_id',$data['stock_id']);
        $query=$this->db->delete('stock',$data);
        return $query;

    }
    public function update_stock_qty($data)
    {

        $this->db->where('stock_item',$data['stock_item']);
        $query=$this->db->update('stock',$data);
        return $query;

    }

    public function select_stock_batch($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('stock s','s.stock_batch as batch');
        $this->db->join('batch','batch.batch_id=stock.stock_batch','left');
        if(!empty($where_data)){
            $this->db->where($where_data);
        }
        if(!empty($order_by_c)&&!empty($order_by)){
            $this->db->order_by($order_by_c,$order_by);
        }
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query;
    }

    public function insert_stock_history($data)
    {
        $query=$this->db->insert('stock_history', $data);
        $result['status']= $query;
        return $result;
    }

}
?>