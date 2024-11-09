<?php

class Kapcsolatadmin_Model
{
	public function get_data()
	{
		$retData['eredmeny'] = "OK";
		$retData['rows'] = Array();
		
		try {
			$connection = Database::getConnection();
			$sql = "select id, submitdate, name, email, number, message from kapcsolat order by submitdate";
			$stmt = $connection->query($sql);
			$retData['rows'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			$retData['eredmeny'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba:<br>".$e->getMessage()."!";
		}
		return $retData;
	}
	public function delete_data($vars)
    {
        $retData["eredmeny"]="OK";
		$retData['rows'] = Array();
        try
        {
            $connection = Database::getConnection(); //„DELETE FROM kapcsolat WHERE `kapcsolat`.`id` = 2”
            $sql = "delete from kapcsolat where id=".$vars['rowid'];
			$stmt = $connection ->query($sql);
			$sql = "select id, submitdate, name, email, number, message from kapcsolat order by submitdate";
			$stmt = $connection->query($sql);
			$retData['rows'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
        }
        catch (PDOException $e)
        {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
        }
        return $retData;
    }
}

?>