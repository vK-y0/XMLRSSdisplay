<!-- Disabling warning errors -->
<?php
require('checks.php');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles XML</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id>
      <div id="navBar" class="textFormat">
        <div id="homeBtn">
          <a href="./xmldisplay.php">Accueil</a>
        </div>
        <div id="rightNav">
          <div>
            <button id='nightBtn' >MODE NUIT</button>
            <button id='dayBtn'>MODE JOUR</button>
          </div>
          <div id="flags">
            <div><a href=./xmldisplay.php><img src="./images/French.png" alt="French flag"></a></div>
            <div><a href=./xmldisplayENG.php><img src="./images/English.png" alt="English flag"></a></div>
          </div>
        </div>
      </div>
      <div id='documentBody'>
        <div id="mainDivForm">
          <!-- Form starts here -->
          <form action="" method="get" class="form">
            <div class="formText textFormat">
              <div>
                <label for="pageLink">Merci d'entrer votre lien RSS ci-dessous</label>
              </div>
              <div>
                <!-- The code below makes that if you enter a link, the link stays in the link bar till you delete it. Needed to pass it in the url. -->
                <?php if(isset($_GET['pageLink'])) {
                  $urlValue = $_GET['pageLink'];
                } else {
                  $urlValue = '';
                }
                ?>
                <!-- end -->
                <input type="text" name="pageLink" id="pageLink" class="textFormat" value=<?= $urlValue ?>>
              </div>
            </div>
            <!-- Default value for article number filter is 5, but if its more the code below get the number from url via GET and put it in the range input -->
            <div class="textFormat" id="numberChoice">
              <label for="articlesNumber">Nombre d'articles par page : </label>
              <?php if(isset($_GET['articlesNumber'])) {
                  $numberValue = $_GET['articlesNumber'];
                } else {
                  $numberValue = 5;
                }
                ?>
              <input type="number" class="textFormat" id="articlesNumberInput" name="articlesNumber" min="5" max="100" step="5" value=<?= $numberValue  ?>>
            </div>
            <!-- end -->
            <div class="formBtn">
              <input type="submit" value="C'est parti !" id="formBtn" class="textFormat">
            </div>
            <!-- This div is displaying all the fast link to some RSS flux -->
            <!-- This div is disapearing if a link is entered -->
            <?php if (empty($_GET['pageLink'])){ ?>
                    <div id="fastLinksDiv" class="textFormat">
                      <div id="fastLinksTitle"> Pas de lien ? Voici quelques suggestions ⬇️ 😉</div>
                      <div id="categoriesDiv">
                        <form action="" method="get" class="form">
                          <div class="fastLinkCategory">
                            <p class="categoryTitles">Sports</p>
                            <div class="categoryLinks">
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Esport/" name='pageLink' class="<?=classCheck()?> textFormat">E-sports</button></div>
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Basket/Nba " name="pageLink" class="<?=classCheck()?> textFormat">Basket</div>
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Football/" name="pageLink" class="<?=classCheck()?> textFormat">Football</button></div>
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Rugby/" name="pageLink" class="<?=classCheck()?> textFormat">Rugby</button></div>
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Tennis/" name="pageLink" class="<?=classCheck()?> textFormat">Tennis</button></div>
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Rallye/" name="pageLink" class="<?=classCheck()?> textFormat">Rallye</button></div>
                              <div><button type="submit" value="https://dwh.lequipe.fr/api/edito/rss?path=/Formule-1" name="pageLink" class="<?=classCheck()?> textFormat">Formule 1</button></div>
                            </div>
                          </div>
                          <div class="fastLinkCategory">
                            <p class="categoryTitles">Economie</p>
                            <div class="categoryLinks">
                              <div><button type="submit" value="https://services.lesechos.fr/rss/les-echos-economie.xml" name="pageLink" class="<?=classCheck()?> textFormat">Les echos</button></div>
                              <div><button type="submit" value="https://feeds.leparisien.fr/leparisien/rss/economie" name="pageLink" class="<?=classCheck()?> textFormat">Le parisien</button></div>
                              <div><button type="submit" value="https://www.lemonde.fr/economie/rss_full.xml" name="pageLink" class="<?=classCheck()?> textFormat">Le monde</button></div>
                              <div><button type="submit" value="https://www.courrierinternational.com/feed/rubrique/economie/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Courrier international</button></div>
                            </div>
                          </div>
                          <div class="fastLinkCategory">
                            <p class="categoryTitles">Technologie</p>
                            <div class="categoryLinks">
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/high-tech/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">High-tech</button></div>
                              <div><button type="submit" value="https://services.lesechos.fr/rss/les-echos-tech-medias.xml" name="pageLink" class="<?=classCheck()?> textFormat">Tech et médias</button></div>
                              <div><button type="submit" value="https://www.01net.com/actualites/feed/" name="pageLink" class="<?=classCheck()?> textFormat">Actualités 01 net</button></div>
                              <div><button type="submit" value="https://www.01net.com/actualites/produits/jeux-video-produits/feed/" name="pageLink" class="<?=classCheck()?> textFormat">Jeux vidéos</button></div>
                              <div><button type="submit" value="https://www.01net.com/actualites/produits/photo-produits/feed/" name="pageLink" class="<?=classCheck()?> textFormat">Photo</button></div>
                              <div><button type="submit" value="https://overclocking.com/feed/" name="pageLink" class="<?=classCheck()?> textFormat">Overclocking / Hardware</button></div>
                            </div>
                          </div>
                          <div class="fastLinkCategory">
                            <p class="categoryTitles">Sciences</p>
                            <div class="categoryLinks">
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/nutrition/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Nutrition</button></div>
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/sante/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Santé</button></div>
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/espace/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Espace</button></div>
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/nature-environnement/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Nature</button></div>
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/archeo-paleo/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Archéo & paléo</button></div>
                              <div><button type="submit" value="https://www.sciencesetavenir.fr/fondamental/rss.xml" name="pageLink" class="<?=classCheck()?> textFormat">Fondamental</button></div>
                            </div>
                          </div>
                      </div>
                    </div>
            <?php }?>
            <!-- This is the pages numbers buttons which are generated depending on how much articles per page there is -->
            <?php if (isset($_GET['pageLink']) && isset($_GET['articlesNumber']) && !empty($_GET['pageLink'])) {
              $url = $_GET['pageLink'];
              if (file_get_contents($url)) {
                $xml = file_get_contents($url);
                $xml = simplexml_load_string($xml);
                // intval function is there to get the number from the articlesNumber string
                $numberOfArticlesWantedInteger = intval($_GET['articlesNumber']);
                // The numberOfPages variable is there to count how much page we need
                $numberOfPages = count($xml->channel->item) / $numberOfArticlesWantedInteger;
                // Then we use numberOfPages to stop the loop when generating the pages buttons
                echo "<div id='pagesnumbers'>";
                if ($numberOfPages > 1) {
                  echo "<p class='textFormat'> Pages :</p>";
                  // In the for loop, we use two variables :
                  // $i to put the right value in the URL which is the one we gonna pass in the function later when we click and submit the page
                  // $k to DISPLAY the value inside the button since we are human and counting from page 1 and not 0
                  for ($j = 0, $k = 1; $j < $numberOfPages; $j++, $k++) {
                    echo "<div class='numberscards'>";
                    // If this is the active page it will echo the div with black background
                    if ($j == $_GET['page']) {
                      echo "<button type='submit' value='$j' name='page' class='pagenumber active textFormat'>$k</button>";
                    } else {
                      echo "<button type='submit' value='$j' name='page' class='pagenumber textFormat'>$k</button>";
                    }
                    echo "</div>";
                  }
                  echo "</div>";
                }
              }
            }
            ?>
            <!-- End of pages numbers buttons -->
          </form>
          <!-- End of form -->
        </div>
        <!-- The function div below is where all the articles are displayed -->
        <div id="xmlFunctionDiv">
          <?php
            require_once('xmlfunction.php');
            if (isset($_GET['pageLink']) && !empty($_GET['pageLink'])) {
                $url = $_GET['pageLink'];
                if ( isset($_GET['articlesNumber'])){
                  $numberOfArticles = $_GET['articlesNumber'];
                } else {
                  $numberOfArticles = 100;
                }
                if ( isset($_GET['page'])) {
              $page = $_GET['page'];
                } else {
                  $page = 1;
                }
                if (file_get_contents($url)) {
                  xmlToPage($url, $numberOfArticles, $page);
                } else {
                  // Invalid input error message
                  echo "<div id='invalink' class='textFormat'> Lien non valide, veuillez entrer un lien .XML valide </div>";
                  echo "<div id='willDiv'><img src='./images/will-smith-crying-meme.jpeg' alt='Will Smith crying' id='willSmithCrying'><div>";
                }
              }
          ?>
        </div>
        <!-- End of the function div -->
      </div>
    </div>
  </body>
  <!-- Javascript balise for night mode -->
  <script src="script.js"></script>
</html>
