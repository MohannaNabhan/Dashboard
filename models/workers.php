<?php 

    class workers{

        public function get_all_workers(){
            try{            
                $db = new DB();
                $dbu = $db->getDB();
                $data = $dbu->prepare("SELECT * FROM users_dashboard");
                $data->execute();
    
                return $data->fetchAll();
              }catch(Exception $e){
                die($e->getMessage());
            }
        }


        public function add_new_worker($rank,$email,$pass){
            try{
                $db = new DB();
                $dbu = $db->getDB();
                $sql = "INSERT INTO users_dashboard (user_email,user_pass,user_rank) VALUES (:user_email,:user_pass,:user_rank)";
                $status = $dbu->prepare($sql)->execute(
                [
                    'user_email' => $email,
                    'user_pass' => $pass,
                    'user_rank' => $rank,
                ]);
                
                return $status;
            } catch (Exception $e){
                die($e->getMessage());
            }
        }

        public function delete_worker($id){
            try{
                $db = new DB();
                $dbu = $db->getDB();
                $stm = $dbu->prepare("DELETE FROM users_dashboard WHERE user_id = :id");
                $status = $stm->execute([
                'id' => $id
                ]);
            } catch (Exception $e){
                die($e->getMessage());
            }
        }
        public function edit_worker($id,$rank,$email,$pass)
        {
            try{
                $db = new DB();
                $dbu = $db->getDB();
                $sql = "UPDATE users_dashboard SET user_email=:user_email,user_pass=:user_pass,user_rank=:user_rank WHERE user_id = :id";
                $status = $dbu->prepare($sql)->execute([
                  'id' => $id,
                  'user_email' => $email,
                  'user_pass' => $pass,
                  'user_rank' => $rank,
                ]);
            } catch (Exception $e){
                die($e->getMessage());
            }
        }
    }