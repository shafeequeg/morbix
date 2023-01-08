<?php
class Data_manage_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

/***************************************************BATCH**********************************************************************/
    
    public function select_batch($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('batch');
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
    
    

    public function insert_batch($data)
    {
        $query=$this->db->insert('batch', $data);
        $result['status']= $query;
        return $result;
    }
    
    public function update_batch($data)
    {

        $this->db->where('batch_id',$data['batch_id']);
        $query=$this->db->update('batch',$data);
        return $query;

    }
/******************************************************ITEMS***********************************************************************/
    public function select_items($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('items');
        // $this->db->join('batch', 'batch.batch_id = items.batch', 'left');
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
    public function insert_items($data)
    {
        $query=$this->db->insert('items', $data);
        $result['status']= $query;
        return $result;
    }
    public function update_items($data)
    {
        $this->db->where('item_id',$data['item_id']);
        $query=$this->db->update('items',$data);
        return $query;

    }


    /******************************************************Category***********************************************************************/
    public function select_category($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('category');
        // $this->db->join('batch', 'batch.batch_id = items.batch', 'left');
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
    public function insert_category($data)
    {
        $query=$this->db->insert('category', $data);
        $result['status']= $query;
        return $result;
    }
    public function update_category($data)
    {
        $this->db->where('cat_id',$data['cat_id']);
        $query=$this->db->update('category',$data);
        return $query;

    }


    /****************************************************** PURCHASE ITEMS ***************************************************************/

    public function select_purchase_item()
    {
        $this->db->select('*')->from('purchase_items');
        if(!empty($data)){
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_purchase_item($data)
    {
        $query=$this->db->insert('purchase_items', $data);
        $result['status']= $query;
        $result['insert_id']=$this->db->insert_id();
        return $result;
    }
    public function delete_purchase_item($data)
    {

        $this->db->where('item_id',$data['item_id']);
        $query=$this->db->delete('purchase_items',$data);
        return $query;

    }
    public function update_purchase_item($data)
    {

        $this->db->where('item_id',$data['item_id']);
        $query=$this->db->update('purchase_items',$data);
        return $query;

    }

    public function select_items_checking($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('items');
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
}
?>