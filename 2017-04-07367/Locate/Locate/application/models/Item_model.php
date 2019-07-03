<?php
/**
 * Created by PhpStorm.
 * User: erickjustin
 * Date: 26/10/2018
 * Time: 16:43
 */

class Item_model extends CI_Model {

    //function to add an item
    // into the database
    public function  add_item($data){
         //create unique item id
        $data['item_id'] = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10));
        $data["category_name"] = $this->data_model->get_category_name($data["category_id"]);
        $data["location_name"] = $this->data_model->get_location_name($data["location_id"]);
        $query = $this->db->insert('items', $data);
        if ($query == true) {
            $res['code'] = 200;
            $res['msg'] = "Item Successfull Registered";
            $response = json_encode($res);
        } else {
            $res['code'] = 300;
            $res['msg'] = "Something Went Wrong";
            $response = json_encode($res);
        }
        return $response;
        }


        // function to fetch all items from the server
    public  function  get_all_items(){
        //preparing query
        // $this->db->where('email',$email);
        $query=$this->db->get('items');
        if($query==true){
            $res["code"] = 200;
            $res["items"] = $query->result();
            $response = json_encode($res);
        }else{
            $res["code"] = 300;
            $res["msg"] = "Something Went Wrong";
            $response = json_encode($res);
        }

        return $response;
    }

    //function to get items of certain category
    public function get_category_items($category_id){
        //preparing query
        $this->db->select('items.*,users.phone_number,users.email,users.full_name');
        $this->db->where('category_id',$category_id);
        $this->db->join('users', 'users.user_id = items.user_id');
        $query=$this->db->get('items');
        if($query==true){
            $res["code"] = 200;
            $res["items"] = $query->result();
            $response = json_encode($res);
        }else{
            $res["code"] = 300;
            $res["msg"] = "Something Went Wrong";
            $response = json_encode($res);
        }

        return $response;
    }


    //function to get specific user items from the server
    public  function get_user_items($user_id){ //preparing query
        $this->db->select('items.*,users.phone_number,users.email,users.full_name');
        $this->db->where("items.user_id",$user_id);
        $this->db->join('users', 'users.user_id = items.user_id');
        $query=$this->db->get('items');
        if($query==true){
            $res["code"] = 200;
            $res["items"] = $query->result();
            $response = json_encode($res);
        }else{
            $res["code"] = 300;
            $res["msg"] = "Something Went Wrong";
            $response = json_encode($res);
        }

        return $response;
    }













}