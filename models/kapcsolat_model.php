<?php

class Kapcsolat_Model
{
    public function send_data($vars)
    {
        $returning["result"]="";
        try{
            $connection = Database::getConnection();
            $sql = "INSERT INTO `kapcsolat`(`id`, `name`, `email`, `number`, `message`) VALUES (NULL,'".$vars["name"]."','".$vars["email"]."','".$vars["number"]."','".$vars["message"]."')";
            $stmt = $connection->query($sql);
            $returning["eredmény"]="Ok";
            $returning["mess"]="Üzenetét rögzítettük";
            //$stmt->bindParam(':name', $vars['name']);
           // $stmt->bindParam(':email', $vars['email']);
            //$stmt->bindParam(':number', $vars['number']);
           // $stmt->bindParam(':message', $vars['message']);
          //  $stmt->execute();
            
        }
        catch (PDOException $e) 
        {
            $returning['result'] = "ERROR";
            $returning['mess'] = "Adatbázis hiba: ".$e->getMessage()."!";
        }
        return $returning;
    }
}