<?php 

    class Users{


        public function get_all_users(){
            try{            
                $db = new DB();
                $dbu = $db->getDB();
                $data = $dbu->prepare("SELECT * FROM users");
                $data->execute();
    
                return $data->fetchAll();
              }catch(Exception $e){
                die($e->getMessage());
            }
        }



        
    }