<?php

class Regisztracio_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        if (!isset($vars['csaladi_nev'], $vars['utonev'], $vars['login'], $vars['password'])) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Hiányzó adatok!";
            return $retData;
        }
        try {
            $connection = Database::getConnection();
            $sql = "SELECT COUNT(*) FROM felhasznalok WHERE bejelentkezes = :login";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':login', $vars['login']);
            $stmt->execute();
            $count = $stmt->fetchColumn();
    
            if ($count > 0) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Ez a felhasználónév már foglalt!";
                return $retData;
            }
    
            $hashedPassword = password_hash($vars['password'], PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO felhasznalok (csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag) 
                    VALUES (:csaladi_nev, :utonev, :login, :jelszo, '1__')";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':csaladi_nev', $vars['csaladi_nev']);
            $stmt->bindParam(':utonev', $vars['utonev']);
            $stmt->bindParam(':login', $vars['login']);
            $stmt->bindParam(':jelszo', $hashedPassword);
            $stmt->execute();
    
            $retData['eredmeny'] = "OK";
            $retData['uzenet'] = "Sikeres regisztráció!";
        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }

        return $retData;
    }
}

?>
