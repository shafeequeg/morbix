<?php
class Order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

/***************************************************BATCH**********************************************************************/
    
    public function select_order($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('orders');
        $this->db->join('customers','customers.cid=orders.order_customer');
        $this->db->join('users','users.user_id=orders.order_created_by');
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
    
    

    public function insert_order($data)
    {
        $query=$this->db->insert('orders', $data);
        $result['status']= $query;
        $result['insert_id']=$this->db->insert_id();
        return $result;
    }
    
    public function update_order($data)
    {

        $this->db->where('order_id',$data['order_id']);
        $query=$this->db->update('orders',$data);
        return $query;

    }

    public function insert_items($data)
    {
        $result=$this->db->insert('order_items', $data);
        return $result;
    }

    public function select_order_billing($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('orders');
        // $this->db->join('customers','customers.cid=orders.order_customer','left');
        $this->db->join('order_items','order_items.oid=orders.order_id','left');
        $this->db->join('batch','batch.batch_id=order_items .batch','left');
        $this->db->join('items','items.item_id=order_items .item','left');
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

    public function select_order_customer($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('orders');
        $this->db->join('customers','customers.cid=orders.order_customer','left');
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
    public function delete_item($data)
    {

        $this->db->where('id',$data['id']);
        $query=$this->db->delete('order_items',$data);
        return $query;

    }


    public function select_order_billing_details($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('orders');
        $this->db->join('customers','customers.cid=orders.order_customer','left');
        $this->db->join('order_items','order_items.oid=orders.order_id','left');
        $this->db->join('batch','batch.batch_id=order_items .batch','left');
        $this->db->join('items','items.item_id=order_items .item','left');
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


    public function select_billing($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('orders');
        // $this->db->join('customers','customers.cid=orders.order_customer','left');
        $this->db->join('order_items','order_items.oid=orders.order_id','left');
        $this->db->join('batch','batch.batch_id=order_items .batch','left');
        $this->db->join('items','items.item_id=order_items .item','left');
        
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

    public function select_hold_items($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('order_items');
       
        
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

    public function select_stock_item($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
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

    public function update_stock($data)
    {

        $this->db->where('stock_id',$data['stock_id']);
        $query=$this->db->update('stock',$data);
        return $query;

    }

    public function delete_order_item($data)
    {

        $this->db->where('oid',$data['oid']);
        $query=$this->db->delete('order_items',$data);
        return $query;

    }
    public function delete_order($data)
    {

        $this->db->where('order_id',$data['order_id']);
        $query=$this->db->delete('orders',$data);
        return $query;

    }

    // SELECT COUNT(CustomerID), Country
    // FROM Customers
    // GROUP BY Country;
    public function select_category_frm_stock($columns='',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('category','category.cat_id=stock.stock_category','left');
        $this->db->group_by('stock_category');
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

    public function select_batch_frm_stock($columns='',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('batch','batch.batch_id=stock.stock_batch','left');
        $this->db->group_by('stock_batch');
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


    public function select_item_frm_stock($columns='',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('items','items.item_id=stock.stock_item','left');
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