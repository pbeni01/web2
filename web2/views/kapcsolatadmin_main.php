<h2>
    <?php
        switch($viewData['eredmeny']) {
            case "OK":
                echo "<p>Felhasználók üzenetei:<p>";
                ?>
                <table>
                <tr>
                    <th>ID</th><th>Dátum</th><th>Név</th><th>Email</th><th>Telefonszám</th><th>Üzenet</th><th></th>
                </tr>
                <?php
                $counter = 0;
                foreach($viewData['rows'] as $row) {
                    echo "<tr>";
                    foreach($row as $column) {
                        echo "<td>".$column."</td>";
                    }
                    ?>
                    <td>
                    <form action="<?= SITE_ROOT ?>kapcsolatadmin" method="post">
                        <input type="hidden" name="rowid" value="<?= $row["id"] ?>">
                        <input type="submit" value="Törlés">
                    </form>
                    </td>
                    </tr>
                    <?php
                }
                echo "</table>";
                break;
            case "ERROR":
                echo "<p>".$viewData['uzenet']."</p>";
                break;
            default:
                echo "error that is unkown to programmer";
                echo $viewData['eredmeny'];
        }
        
    ?>
</h2>
<h2>Felhasználói adatok exportálása:</h2>
<div>
<a href="/web2/controllers/kapcsolatadmin_export.php?type=pdf" target="_blank">Exportálás PDF-be</a>
<a href="/web2/controllers/kapcsolatadmin_export.php?type=excel" target="_blank">Exportálás Excel-be</a>


</div>
