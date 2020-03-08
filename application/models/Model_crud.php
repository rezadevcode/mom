<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model {

    public function insert($table, $data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function insert_batch($table, $data) {
        if ($this->db->insert_batch($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function inserted_id() {
        return $this->db->insert_id();
    }

    public function update($table, $data, $where) {
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function select($table) {
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_query($query) {

        if (!$this->db->simple_query($query)) {
            return FALSE;
        } else {
            $get = $this->db->query($query);
            if ($get->num_rows() > 0) {
                return $get->result_array();
            } else {
                return FALSE;
            }
        }
    }

    public function select_where($table, $where) {
        $this->db->where($where);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_limit($table, $limit) {
        $this->db->limit($limit);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_like($table, $like) {
        $this->db->like($like);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_like_limit($table, $like, $limit) {
        $this->db->like($like);
        $this->db->limit($limit);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_like_limit_where($table, $like, $limit, $where) {
        $this->db->like($like);
        $this->db->limit($limit);
        $this->db->where($where);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_order($table, $order, $order_by) {
        $this->db->order_by($order, $order_by);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_where_order($table, $where, $order, $order_by) {
        $this->db->where($where);
        $this->db->order_by($order, $order_by);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function select_where_order_limit($table, $where, $order, $order_by, $limit) {
        $this->db->where($where);
        $this->db->order_by($order, $order_by);
        $this->db->limit($limit);
        $get = $this->db->get($table);
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }

    public function delete($table, $where) {
        $this->db->where($where);
        $flag = $this->db->delete($table);
        if ($flag) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sort($table, $sort, $sort_by, $offset, $dataPerPage) {
        $query = $this->db->query("SELECT * FROM $table ORDER BY $sort $sort_by LIMIT $offset, $dataPerPage");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    //ambil data mahasiswa dari database
    public function list_limit($table,$limit, $start){
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }

    public function sort_no_order($table, $offset, $dataPerPage) {
        $query = $this->db->query("SELECT * FROM $table LIMIT $offset, $dataPerPage");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function total_row($table) {
        $get = $this->db->get($table);

        if ($get->num_rows() > 0) {
            return $get->num_rows();
        } else {
            return 0;
        }
    }

    public function total_row_where($table, $where) {
        $this->db->where($where);
        $get = $this->db->get($table);

        if ($get->num_rows() > 0) {
            return $get->num_rows();
        } else {
            return 0;
        }
    }

    public function total_row_query($query) {
        if (!$this->db->simple_query($query)) {
            return FALSE;
        } else {
            $get = $this->db->query($query);
            if ($get->num_rows() > 0) {
                return $get->num_rows();
            } else {
                return 0;
            }
        }
    }

    public function check_duplicate($table, $where) {
        $this->db->where($where);
        $get = $this->db->get($table);

        if ($get->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function last_query() {
        return $this->db->last_query();
    }

    public function checkToken() {
        $now = date('Y-m-d H:i:s');

        $query = $this->db->query("SELECT * FROM `temp_forgot` WHERE expired < '$now'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $this->db->where('id', $row['id']);
                $this->db->delete('temp_forgot');
            }
        }
    }

    public function token_remember() {
        if (!$this->session->userdata('customer_id')) {
            $token = get_cookie('yukibabyshop_remember', TRUE);
            if ($token) {
                $this->db->where(array('remember_token' => $token));
                $get = $this->db->get('customer');
                if ($get) {
                    $result = $get->result_array();

                    // SET SESSION
                    $this->session->set_userdata('customer_id', $result[0]['customer_id']);
                    $this->session->set_userdata('customer_name', $result[0]['firstname']);
                    $this->session->set_userdata('customer_email', $result[0]['email']);

                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }
    
    public function category_parent() {
        $this->db->where(array('parent_id'=>0,'status'=>1));
        $this->db->order_by('sort_order', 'ASC');
        
        $get = $this->db->get('category');
        if ($get) {
            return $get->result_array();
        } else {
            return FALSE;
        }
    }
    
    public function category_child() {
        $this->db->where(array('parent_id'=>0,'status'=>1));
        $this->db->order_by('sort_order', 'ASC');
        
        $get = $this->db->get('category');
        if ($get) {
            $result = $get->result_array();
            $child = array();
            foreach ($result as $r) {
                $this->db->where(array('parent_id'=>$r['category_id'],'status'=>1));
                $this->db->order_by('sort_order', 'ASC');
                $rc = $this->db->get('category');
                if($rc) {
                    $child[$r['category_id']] = $rc->result_array(); 
                }
            }
            return $child;
        } else {
            return FALSE;
        }
    }
    
    public function category_banner() {
        $this->db->where(array('parent_id'=>0,'status'=>1));
        $this->db->order_by('sort_order', 'ASC');
        
        $get = $this->db->get('category');
        if ($get) {
            $result = $get->result_array();
            $banner = array();
            foreach ($result as $r) {
                $this->db->where('category_id', $r['category_id']);
                $this->db->order_by('sort_order', 'ASC');
                $rc = $this->db->get('category_image');
                if($rc) {
                    $banner[$r['category_id']] = $rc->result_array(); 
                }
            }
            return $banner;
        } else {
            return FALSE;
        }
    }

}
