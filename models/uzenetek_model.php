<?php
class Uzenetek_Model
{
    public function getMessages()
    {
        $retData = [];
        
        try {
            $connection = Database::getConnection();
            $sql = "SELECT id, nev, uzenet, datum FROM uzenetek ORDER BY datum DESC";
            $stmt = $connection->query($sql);
            $retData['uzenetek'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $retData['eredmeny'] = "OK";
        }
        catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }
        
        return $retData;
    }

    public function addMessage($vars)
    {
        $retData = [];
        
        try {
            $connection = Database::getConnection();
            
            $sql = "INSERT INTO uzenetek (nev, uzenet, datum) VALUES (:nev, :uzenet, NOW())";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                'nev' => $vars['nev'],
                'uzenet' => $vars['uzenet']
            ]);
            
            $retData['eredmeny'] = "OK";
            $retData['uzenet'] = "Üzenet sikeresen elküldve!";
        }
        catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }
        
        return $retData;
    }
}
?>