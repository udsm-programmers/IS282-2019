<?php
/**
 * Created by PhpStorm.
 * User: erickjustin
 * Date: 26/10/2018
 * Time: 15:12
 */

class Api extends CI_Controller{
    public function index()
    {
        // take the data post and post it in the variable request.
        $request = $this->input->post();

        // make sure its a true string
        $request = file_get_contents("php://input");

        //json decode the client request into a php array
        $request = json_decode($request, true);

        // take the code from the array
        // the code tell server what to do with the incoming data.
        $code = $request["code"];



        // code 100 if for registering new user
        if ($code == 100){
            echo $this->user_model->create_user($request["data"]);
        }


        // code 101 is for user sign in
        if ($code == 101){
            echo  $this->user_model->user_sign_in($request['data']);
        }


        // code 102 is for adding new user.
        if ($code == 102)
        {
            echo  $this->data_model->add_category($request['data']);
        }

        //code 103 is for adding new region
         if ($code == 103){
            echo $this->data_model->add_region($request["data"]);
         }

         //code 104 is for adding item for service
        if ($code == 104){
            echo $this->item_model->add_item($request['data']);
        }

        //code 105 is for getting all categories from the server
        if ($code == 105){
            echo $this->data_model->get_all_categories();
        }


        // code 106 is for getting category items
        if ($code == 106){
            echo $this->item_model->get_category_items($request["category_id"]);
        }


        // code 107 is for getting all items
        if ($code == 107){
            echo $this->item_model->get_all_items();
        }


        //code 108 is for getting specific user details
        if ($code == 108){
            echo $this->user_model->get_specific_user_details($request["email"]);
        }

        // code 109 is for getting all categories and locations
        if ($code == 109){
            echo $this->data_model->get_all_categories_and_locations();
        }

        //code 110 is for getting specific user items list
        if ($code == 110){
            echo $this->item_model->get_user_items($request['user_id']);
        }


        //code 111 is for creating order and  initiate payment
        if ($code == 111){
            echo  $this->order_model->create_order($request["data"]);
        }







    }




}

