<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link href="../Public/Css/theme.css" rel="stylesheet" />
    <link rel="../Public/Css/stylesheet.css" />
    <title>ARPP</title>
  </head>

  <body>
    <main class="main" id="top"  >
      <!-- Menu   -->
      <nav
        class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85"
        data-navbar-on-scroll="data-navbar-on-scroll"
      >
        <div class="container">
          <a class="navbar-brand" href="<?php Url::getUrl("Base/index")?>"
            ><img
              class="d-inline-block align-top img-fluid"
              src="../Public/images/logo.png"
              alt=""
              width="50"
            /><span class="text-theme font-monospace fs-4 ps-2">ARPP</span></a
          >
          <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2">
                <a
                  class="nav-link fw-medium active"
                  aria-current="page"
                  href="<?php Url::getUrl("Base/index")?>"
                  >Accueil</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="nav-link fw-medium" href="<?php Url::getUrl("Base/index#who");?>"
                  >Qui sommes nous?</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="nav-link fw-medium" href="<?php Url::getUrl("Base/index#contact");?>"
                  >Contactez-nous</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="nav-link fw-medium" href="?action=formations"
                  >Formations</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="nav-link fw-medium" href="?action=colloquia"
                  >Collaques</a
                >
              </li>
              <li class="nav-item px-2">
                <a
                  class="nav-link fw-medium"
                  href="?action=login"
                  id="admin-link"
                  >Accès admin</a
                >
              </li>
              <li class="nav-item px-2" id="disconnect" style="display: none">
                <a
                  class="nav-link fw-medium"
                  href="#"
                  <? //onclick="disconnect()" ?>
                  id="admin-link"
                  >Déconnexion</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php echo $___Render_Curent_View;?>
    </main>
    <script src="https: //unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="../Public/js/@popperjs/popper.min.js"></script>
    <script src="../Public/js/bootstrap/bootstrap.min.js"></script>
    <script src="../Public/js/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../Public/js/app.js"></script>
    <script src="../Public/js/theme.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap"
      rel="stylesheet"
    >
  </body>
</html>
