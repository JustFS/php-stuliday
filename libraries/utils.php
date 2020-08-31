<?php

/**
 * Met en tampon le contenu des pages pour le rendre autour de l'architecture du layout
 */
function render(string $path, string $layout)
{
  // ouverture tampon
  ob_start();
  require $path . '.html.php';
  // mise en tampon de la page dans une variable
  $pageContent = ob_get_clean();

  require $layout . 'templates/layout.html.php';
}
