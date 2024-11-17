<h1>Kapcsolat</h1>
<form action="<?= SITE_ROOT ?>kapcsolat" method="post">
    <label for="name">Name: </label><br><input type="text" name="name" id="name"><br>
    <label for="email">E-mail: </label><br><input type="text" name="email" id="email" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Kérem adjon meg egy rendes emailt"><br>
    <label for="number">Phone Number: </label><br><input type="text" name="number" id="number" maxlength="12"><br>
    <label for="message">Message</label><br><textarea class="message-input" type="text" name="message" id="message" required title="Kérem adja meg az elküldeni kívánt üzenetet"></textarea><br>
    <input type="submit" value="Küldés">
</form>
<h2><br><?= (isset($viewData['mess']) ? $viewData['mess'] : "") ?><br></h2>
