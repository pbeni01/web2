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
                foreach($viewData['rows'] as $row) {
                    echo "<tr>";
                    foreach($row as $column) {
                        echo "<td>".$column."</td>";
                    }
                    echo "<tr>";
                }
                echo "</table>";
                break;
            case "ERROR":
                echo "<p>".$viewData['uzenet']."</p>";
                break;
        }
    ?>
</h2>
