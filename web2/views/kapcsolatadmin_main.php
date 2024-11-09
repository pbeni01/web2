<h2>
    <?php
        switch($viewData['eredmeny']) {
            case "OK":
                echo "<p>Felhasználók üzenetei:<p>";
                ?>
                <table>
                <tr>
                    <th></th><th>Név</th><th>Email</th><th>Telefonszám</th><th>Üzenet</th><th></th>
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
