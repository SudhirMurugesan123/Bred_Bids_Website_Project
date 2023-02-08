<?php 

class DB_operations { 
    private $dbHost     = 'studentdb-maria.gl.umbc.edu'; 
    private $dbUsername = 'sudhirm1'; 
    private $dbPassword = 'sudhirm1'; 
    private $dbName     = 'sudhirm1'; 
     
    function __construct(){ 
        if(!isset($this->db)){ 
            // Connect to the database 
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); 
            if($conn->connect_error){ 
                die("Failed to connect with MySQL: " . $conn->connect_error); 
            }else{ 
                $this->db = $conn; 
            } 
        } 
    } 
    
    function get_all_products(){
        $query = "select * from products"; 
        $result = $this->db->query($query); 
        if ($result->num_rows > 0){
            $all_prod = $result->fetch_all(MYSQLI_ASSOC);
            return $all_prod;
        }else{
            return [];
        }
    }

    function get_product_info($product_id){
        $query = "select * from products where id=".$product_id; 
        $result = $this->db->query($query); 
        if ($result->num_rows > 0){
            $product = $result->fetch_array(MYSQLI_ASSOC);
            return $product;
        }else{
            return [];
        }
    }

    function update_bid__price($bid_price,$product_id){
        $query = "UPDATE products SET price=".$bid_price. " where id=".$product_id; 
        $update = $this->db->query($query); 
        if($update){
            return true;
        }else{
            return false;
        }
    }

    function new_order($data){
        $columns = $values = ''; 
        $i = 0; 
        foreach($data as $key=>$val){ 
            $pre = ($i > 0)?', ':''; 
            $columns .= $pre.$key; 
            $values  .= $pre."'".$this->db->real_escape_string($val)."'"; 
            $i++; 
        } 
        //Insert order data in the database 
        $query = "INSERT INTO orders "." (".$columns.") VALUES (".$values.")"; 
        $insert = $this->db->query($query);
        if($insert){
            return true;
        }else{
            return false;
        }
    }

    // function checkUser($data = array()){ 
    //     if(!empty($data)){ 
    //         // print_r($data);exit();
    //         // Check whether the user already exists in the database 
    //         $checkQuery = "SELECT * FROM ".$this->userTbl." WHERE email = '".$data['email']."'"; 
    //         $checkResult = $this->db->query($checkQuery); 
             
    //         // Add modified time to the data array 
    //         // if(!array_key_exists('modified',$data)){ 
    //         //     $data['modified'] = date("Y-m-d H:i:s"); 
    //         // } 
             
    //         if($checkResult->num_rows > 0){ 
    //             // Prepare column and value format 

    //             // $colvalSet = ''; 
    //             // $i = 0; 
    //             // foreach($data as $key=>$val){ 
    //             //     $pre = ($i > 0)?', ':''; 
    //             //     $colvalSet .= $pre.$key."='".$this->db->real_escape_string($val)."'"; 
    //             //     $i++; 
    //             // } 

    //             $colvalSet=" google_access_token='".$data['google_access_token']."', refresh_token='".$data['refresh_token']."'";
    //             $whereSql = " WHERE email = '".$data['email']."'"; 
    //             // Update user data in the database 
    //             $query = "UPDATE ".$this->userTbl." SET ".$colvalSet.$whereSql; 
    //             $update = $this->db->query($query); 

    //             $result = $this->db->query($checkQuery); 
    //             $userData = $result->fetch_assoc(); 
    //             return !empty($userData)?$userData:false; 
    //         }else{ 
    //             return false;
    //             // Add created time to the data array 
    //             // if(!array_key_exists('created',$data)){ 
    //             //     $data['created'] = date("Y-m-d H:i:s"); 
    //             // } 
                 
    //             // Prepare column and value format 
    //             // $columns = $values = ''; 
    //             // $i = 0; 
    //             // foreach($data as $key=>$val){ 
    //             //     $pre = ($i > 0)?', ':''; 
    //             //     $columns .= $pre.$key; 
    //             //     $values  .= $pre."'".$this->db->real_escape_string($val)."'"; 
    //             //     $i++; 
    //             // } 
                 
    //             // Insert user data in the database 
    //             // $query = "INSERT INTO ".$this->userTbl." (".$columns.") VALUES (".$values.")"; 
    //             // $insert = $this->db->query($query); 
    //         } 
    //     }
    // } 
}