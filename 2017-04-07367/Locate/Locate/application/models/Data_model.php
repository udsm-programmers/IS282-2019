<?php
/**
 * Created by PhpStorm.
 * User: erickjustin
 * Date: 26/10/2018
 * Time: 14:54
 */


class Data_model extends CI_Model {


    //function to check whether certain detail
    // exist  in the database
    public function check_details_duplication($detail_name,$table_name,$field_name){
        //preparing query
        $this->db->where($field_name,$detail_name);
        $query=$this->db->get($table_name);
        //if there is duplication it returns true else false
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }



    //function to add category to category table
    public function add_category($data)
    {
        //making the category in small letters
        $data['category_name'] = strtolower($data['category_name']);
        //checking for category duplication
        //
        if ($this->check_details_duplication($data['category_name'],"category","category_name")) {
            $res['code'] = 200;
            $res['msg'] = "category exist";
            $response = json_encode($res);
            return $response;
        } else {
            // if the category does not exist then
            // create a new category
            // first create a new category id
            $data['category_id'] = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10));
            $query = $this->db->insert('category', $data);
            if ($query == true) {
                $res['code'] = 200;
                $res['msg'] = "category added successfully";
                $response = json_encode($res);
                return $response;
            } else {
                $res['code'] = 300;
                $res['msg'] = "something went wrong";
                $response = json_encode($res);
                return $response;
            }
        }
    }

    //function to add category to category table
    public function add_region($data)
    {
        //making the category in small letters
        $data['region_name'] = strtolower($data['region_name']);
        //checking for category duplication
        //
        if ($this->check_details_duplication($data['region_name'],"regions","region_name")) {
            $res['code'] = 200;
            $res['msg'] = "Region Exist";
            $response = json_encode($res);
            return $response;
        } else {
            // if the category does not exist then
            // create a new category
            // first create a new category id
            $data['region_id'] = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10));
            $query = $this->db->insert('regions', $data);
            if ($query == true) {
                $res['code'] = 200;
                $res['msg'] = "Region added successfully";
                $response = json_encode($res);
                return $response;
            } else {
                $res['code'] = 300;
                $res['msg'] = "something went wrong";
                $response = json_encode($res);
                return $response;
            }
        }
    }

    //function to get all categories in the database
    public function get_all_categories()
    {
        //preparing query
        // $this->db->where('email',$email);
        $query = $this->db->get('category');
        if ($query == true) {
            $res["code"] = 200;
            $res["categories"] = $query->result('object');
            $response = json_encode($res);
        } else {
            $res["code"] = 300;
            $res["msg"] = "Something Went Wrong";
            $response = json_encode($res);
        }

        return $response;
    }

        //function to get all locations form  the database
        public function get_all_locations(){
            //preparing query
            // $this->db->where('email',$email);
            $query=$this->db->get('regions');
            if($query==true){
                $res["code"] = 200;
                $res["locations"] = $query->result();
                $response = json_encode($res);
            }else{
                $res["code"] = 300;
                $res["msg"] = "Something Went Wrong";
                $response = json_encode($res);
            }

            return $response;
        }

    //function to get the category name of given id
    public function get_category_name($category_id){
        //preparing query
        $this->db->where('category_id',$category_id);
        $query=$this->db->get('category');
        if($query==true){

           return $query->row()->category_name;

        }else{
            return false;
        }


    }

    //function to get the location name of given id
    public function get_location_name($location_id){
        //preparing query
        $this->db->where('location_id',$location_id);
        $query=$this->db->get('regions');
        if($query==true){

            return $query->row()->location_name;

        }else{
            return false;
        }


    }


    //function to get all categories and locations from the database
    public function get_all_categories_and_locations(){
        //preparing query
        // $this->db->where('email',$email);
        $query=$this->db->get('category');
        $query2 = $this->db->get("regions");
        if($query==true && $query2 == true){
            $res["code"] = 200;
            $res["categories"] = $query->result();
            $res["locations"] = $query2->result();
            $response = json_encode($res);
        }else{
            $res["code"] = 300;
            $res["msg"] = "Something Went Wrong";
            $response = json_encode($res);
        }

        return $response;
    } 

    











}