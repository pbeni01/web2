<h1>Kapcsolat</h1>
<form action="<?= SITE_ROOT ?>kapcsolat" method="post">
    <label for="name">Name: </label><br><input type="text" name="name" id="name"><br>
    <label for="email">E-mail: </label><br><input type="text" name="email" id="email" required ><br>
    <label for="number">Phone Number: </label><br><input type="text" name="number" id="number"><br>
    <label for="message">Message</label><br><input type="text" style="padding: 10px; font-size: 16px;" name="message" id="message"><br>
    <input type="submit" value="Küldés">
</form>
<h2><br><?= (isset($viewData['mess']) ? $viewData['mess'] : "") ?><br></h2>