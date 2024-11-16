<?php
// Csak bejelentkezett felhasználók láthatják
if(!isset($_SESSION['userid'])) { 
    echo "<h1>Az üzenőfal megtekintéséhez be kell jelentkezni!</h1>";
    die(); 
}
?>

<div class="uzenetfal">
    <h2>Üzenőfal</h2>
    
    <!-- Üzenet küldő űrlap -->
    <div class="uzenet-kuldes">
        <h3>Új üzenet írása</h3>
        <form method="post">
            <textarea name="uzenet" required placeholder="Írja be üzenetét..."></textarea><br>
            <input type="submit" value="Küldés">
        </form>
    </div>

    <!-- Üzenetek listázása -->
    <div class="uzenetek-lista">
        <h3>Üzenetek</h3>
        <?php
        if(isset($viewData['uzenetek'])) {
            foreach($viewData['uzenetek'] as $uzenet) {
                echo "<div class='uzenet'>";
                echo "<div class='uzenet-fejlec'>";
                echo "<span class='szerzo'>" . htmlspecialchars($uzenet['nev']) . "</span>";
                echo "<span class='datum'>" . $uzenet['datum'] . "</span>";
                echo "</div>";
                echo "<div class='uzenet-tartalom'>" . htmlspecialchars($uzenet['uzenet']) . "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
</div>

<?php
if(isset($viewData['uzenet'])) {
    echo "<p class='uzenet-" . ($viewData['eredmeny'] == "OK" ? "siker" : "hiba") . "'>";
    echo $viewData['uzenet'];
    echo "</p>";
}
?>