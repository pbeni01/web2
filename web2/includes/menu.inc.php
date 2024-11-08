<?php

Class Menu {
    public static $menu = array();
    
    public static function setMenu() {
        self::$menu = array();
        $connection = Database::getConnection();
        $stmt = $connection->query("select url, nev, szulo, jogosultsag from menu where jogosultsag like '".$_SESSION['userlevel']."'order by sorrend");
        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($menuitem['url'] == 'nyitolap') {
                self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['szulo'], $menuitem['jogosultsag']);
                continue;
            }
    
            // Csak akkor adjuk hozzá a "Belépés" és "Regisztráció" menüpontokat, ha a felhasználó nincs bejelentkezve
            if ($_SESSION['userid'] == 0 && ($menuitem['url'] == 'belepes' || $menuitem['url'] == 'regisztracio')) {
                self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['szulo'], $menuitem['jogosultsag']);
            }
    
            // Ha be van jelentkezve, akkor az összes többi menüpontot adjuk hozzá, kivéve a "Belépés" és "Regisztráció"
            if ($_SESSION['userid'] != 0 && $menuitem['url'] != 'belepes' && $menuitem['url'] != 'regisztracio') {
                self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['szulo'], $menuitem['jogosultsag']);
            }
        }
        if ($_SESSION['userid'] != 0) {
            self::$menu['kilepes'] = array('Kilépés', '', '1__');
        }
    }

    public static function getMenu($sItems) {
        $submenu = "";
        
        $menu = "<ul class=\"menu\">";
        foreach(self::$menu as $menuindex => $menuitem)       
        {
            if($menuitem[1] == "")
            { $menu.= "<li><a href='".SITE_ROOT.$menuindex."' ".($menuindex==$sItems[0]? "class='selected'":"").">".$menuitem[0]."</a></li>"; }
            else if($menuitem[1] == $sItems[0])
            { $submenu .= "<li><a href='".SITE_ROOT.$sItems[0]."/".$menuindex."' ".($menuindex==$sItems[1]? "class='selected'":"").">".$menuitem[0]."</a></li>"; }
        }
        $menu.="</ul>";
        
        if($submenu != "")
            $submenu = "<ul class=\"menu\">".$submenu."</ul>";
        
        return $menu.$submenu;;
    }
}

Menu::setMenu();
?>
