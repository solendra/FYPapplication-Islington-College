<?php

class MY_Model extends CI_Model
{
    protected $table = null;
    protected $primary_key = null;
    
    // ------------------------------------------------------------------------
    
    /**
     * @usage
     * All: $this->user_model->get();
     * Single: $this->user_model->get(2);
     * Multiple Criteria: $this->user_model->get(array('user_id' => 2, 'name' => 'solen'));
     * Custom: 
     * 
     * @param int $id
     * @param varchar $order_by
     * @return array
     */
    public function get($id = null, $order_by = null, $order_type = null)
    {
        if(is_numeric($id))
        {
            $q = $this->db->where($this->primary_key, $id);
        }
        if(is_array($id))
        {
            foreach ($id as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        
        
        if(is_string($id) && !(is_numeric($id)))
        {
            $this->db->where($id);
        }
        
        // if order by is set
        if(isset($order_by))
        {
            if(isset($order_type)) $this->db->order_by($order_by, $order_type);
            else $this->db->order_by($order_by);
        }
        
        
        $q = $this->db->get($this->table);
        return $q->result_array();
    }
    
    // ------------------------------------------------------------------------
    
    /**
     * @usage $this->user_model->insert(['login' => 'solen']);
     * @param array $data
     * @return type
     */
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    
    // ------------------------------------------------------------------------
    
    /**
     * @usage $this->url_model->update(['password' => 'pass'], array('url' => 'google.com'));
     * @param array $new_data
     * @param int / array $where
     * @return int
     */
    
    
    public function update($new_data, $where)
    {
        if(is_numeric($where))
        {
            $this->db->where($this->primary_key, $where);
        }
        else if(is_array($where))
        {
            foreach ($where as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        else die("You must pass second parameter to the UPDATE() method.");
        
        $this->db->update($this->table, $new_data);
        return $this->db->affected_rows();
    }
    
    
    // ------------------------------------------------------------------------
    
    /**
     * @usage 
     * $this->user_model->delete(5);
     * $this->user_model->delete(array('name' => 'solen'));
     * @param int $id
     */
    
    public function delete($id)
    {
        if(is_numeric($id))
        {
            $this->db->where($this->primary_key, $id);
        }
        else if(is_array($id))
        {
            foreach ($id as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        else
        {
            die("You must pass a parameter to the DELETE() method.");
        }
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    
    // ------------------------------------------------------------------------
    
    
    /**
     * @usage 
     * $this->user_model->count_rows(array('name' => 'solen'));
     * @param $id
     */
    
    
    public function count_rows($id = null)
    {
        if(is_numeric($id))
        {
            $q = $this->db->where($this->primary_key, $id);
        }
        if(is_array($id))
        {
            foreach ($id as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
        
        if(is_string($id) && !(is_numeric($id)))
        {
            $this->db->where($id);
        }
        
        $this->db->from($this->table);
        return $this->db->count_all_results();
        
    }
    
    // ------------------------------------------------------------------------
    
}

?>
