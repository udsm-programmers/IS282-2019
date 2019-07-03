<?php
/**
 * Created by PhpStorm.
 * User: erickjustin
 * Date: 26/10/2018
 * Time: 14:26
 * @property  data_model
 */


class User_model extends CI_Model {

    // function to create new user
    // into the database



    function create_user($data){
       // create unique user id for the user
        $data['user_id'] = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10));
            //encrypting the user password
        $options = array('cost' => 12);
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, $options);
        //preparing data to check duplications
        $phone_number = $data['phone_number'];
        //checking for phone number duplication
        // if the phone has ever been used
        if ($this->data_model->check_details_duplication($phone_number,"users","phone_number")) {
                $res['code'] = 300;
                $res['msg'] = "The Phone Number Already Exist";
                $response = json_encode($res);
                return $response;
            } else {
                $query = $this->db->insert('users', $data);
                if ($query == true) {
                    $res['code'] = 200;
                    $res['msg'] = "User Successfull Registered";
                    $response = json_encode($res);
                } else {
                    $res['code'] = 300;
                    $res['msg'] = "Something Went Wrong";
                    $response = json_encode($res);
                }
                return $response;
            }
        }


    //function for user to sign in
    public function user_sign_in($data){
        //preparing query
        $this->db->where('phone_number',$data['phone_number']);
        $query=$this->db->get('users');
        if($query->num_rows()==1){
            //taking the database password
            $hash_password=$query->row()->password;
            //verifying the password
            if(password_verify($data['password'],$hash_password)){
                //taking the profile details
               // $res['data']=$this->get_specific_tutor_details($phone_number);
                $res['code']=200;
                $res['user_details']=$query->row();
                $res['msg']="successfully logged in ";
                $response=json_encode($res);
                return $response;
            }else {
                $res['code'] = 300;
                $res['msg'] = "Incorrect number or password";
                $response = json_encode($res);
                return $response;
            }

        }else{
            $res['code']=300;
            $res['msg']="Incorrect email or password";
            $response=json_encode($res);
            return $response;
        }

    }


    //function to get specific user profile data by phone number
    public function get_specific_user_details($email){
        //preparing query
        $this->db->where('email',$email);
        $query=$this->db->get('users');
        if($query==true){
            return json_encode($query->row());
        }else{
            return false;
        }
    }














}