<?php 

    class Session{

        public function get_worker($email){
            try{
                $db = new DB();
                $dbu = $db->getDB();
                $user = $dbu->prepare("SELECT * FROM users_dashboard WHERE user_email = :email");
                $user->execute(['email' => $email]);
                return $user->fetch();
              }catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function save_info_worker($id,$ip)
        {
            try{
                $db = new DB();
                $dbu = $db->getDB();
                $sql = "UPDATE users_dashboard SET user_ip=:user_ip WHERE user_id = :id";
                $status = $dbu->prepare($sql)->execute([
                  'id' => $id,
                  'user_ip' => $ip,
                ]);
            } catch (Exception $e){
                die($e->getMessage());
            }
        }


        
    }