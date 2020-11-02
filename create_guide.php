<?php require_once("top.php");

if (!isset($_SESSION['authenticated']) || $_SESSION == false) {
    header("Location: index.php");
    exit();
}

$title_preset = "";
$guide_preset = "";
if (isset($_SESSION['form'])) {
  $title_preset = $_SESSION['form']['title'];
  $guide_preset = $_SESSION['form']['guide'];
  unset($_SESSION['form']);
}

?>
<div>
<form method="POST" action="guide_handler.php">
<label for="smash_char">Choose a character:</label>
<select name="smash_char" id="smash_char">
    <option value="mario">Mario</option>
    <option value="donkeykong">Donkey Kong</option>
    <option value="link">Link</option>
    <option value="samus">Samus</option>
    <option value="darksamus">Dark Samus</option>
    <option value="yoshi">Yoshi</option>
    <option value="kirby">Kirby</option>
    <option value="fox">Fox</option>
    <option value="pikachu">Pikachu</option>
    <option value="luigi">Luigi</option>
    <option value="ness">Ness</option>
    <option value="captainfalcon">Captain Falcon</option>
    <option value="jigglypuff">Jigglypuff</option>
    <option value="peach">Peach</option>
    <option value="daisy">Daisy</option>
    <option value="bowser">Bowser</option>
    <option value="iceclimbers">Ice Climbers</option>
    <option value="sheik">Sheik</option>
    <option value="zelda">Zelda</option>
    <option value="drmario">Dr. Mario</option>
    <option value="pichu">Pichu</option>
    <option value="falco">Falco</option>
    <option value="marth">Marth</option>
    <option value="lucina">Lucina</option>
    <option value="younglink">Young Link</option>
    <option value="ganondorf">Ganondorf</option>
    <option value="mewtwo">Mewtwo</option>
    <option value="roy">Roy</option>
    <option value="chrom">Chrom</option>
    <option value="gameandwatch">Mr. Game & Watch</option>
    <option value="metaknight">Meta Knight</option>
    <option value="pit">Pit</option>
    <option value="darkpit">Dark Pit</option>
    <option value="zss">Zero Suit Samus</option>
    <option value="wario">Wario</option>
    <option value="snake">Snake</option>
    <option value="ike">Ike</option>
    <option value="pkmtrainer">Pokemon Trainer</option>
    <option value="diddykong">Diddy Kong</option>
    <option value="lucas">Lucas</option>
    <option value="sonic">Sonic</option>
    <option value="dedede">King Dedede</option>
    <option value="olimar">Olimar</option>
    <option value="lucario">Lucario</option>
    <option value="rob">Rob</option>
    <option value="toonlink">Toon Link</option>
    <option value="wolf">Wolf</option>
    <option value="villager">Villager</option>
    <option value="megaman">Mega Man</option>
    <option value="wiifit">Wii Fit Trainer</option>
    <option value="rosalina">Rosalina</option>
    <option value="littlemac">Little Mac</option>
    <option value="greninja">Greninja</option>
    <option value="palutena">Palutena</option>
    <option value="pacman">Pac-Man</option>
    <option value="robin">Robin</option>
    <option value="shulk">Shulk</option>
    <option value="bowserjr">Bowser Jr.</option>
    <option value="duckhunt">Duck Hunt</option>
    <option value="ryu">Ryu</option>
    <option value="ken">Ken</option>
    <option value="cloud">Cloud</option>
    <option value="corrin">Corrin</option>
    <option value="bayonetta">Bayonetta</option>
    <option value="inkling">Inkling</option>
    <option value="ridley">Ridley</option>
    <option value="simon">Simon</option>
    <option value="richter">Richter</option>
    <option value="kkrool">Pit</option>
    <option value="isabelle">Isabelle</option>
    <option value="incineroar">Incineroar</option>
    <option value="piranha">Piranha Plant</option>
    <option value="joker">Joker</option>
    <option value="hero">Hero</option>
    <option value="banjo">Banjo & Kazooie</option>
    <option value="terry">Terry</option>
    <option value="byleth">Byleth</option>
    <option value="minmin">Min Min</option>
</select>
<div>Title: <input value="<?php echo $title_preset;?>" type="text" name="title" id="title"/></div>
<div>Text:</div>
<div><input value="<?php echo $guide_preset;?>" type="text" name="guide" id="guide_text"/></div>
<input type="submit" value="Submit">
</form>
</div>
<?php   
  if (isset($_SESSION['bad'])) {
    foreach ($_SESSION['bad'] as $message) {
      echo "<div class='bad'>{$message}</div>";
    }
    unset($_SESSION['bad']);
  }


require_once("footer.php"); ?>