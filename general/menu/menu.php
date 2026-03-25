<?php
declare(strict_types=1);

$menuCssFs = __DIR__ . '/menu.css';
$menuJsFs  = __DIR__ . '/menu.js';

$menuLogoFs       = __DIR__ . '/img/logo.png';
$menuLogoMobileFs = __DIR__ . '/img/logo_mobile.png';
$menuSearchFs     = __DIR__ . '/img/search.png';
$menuOpenFs       = __DIR__ . '/img/menu.png';
$menuCloseFs      = __DIR__ . '/img/close.png';

$menuCssV = is_file($menuCssFs) ? filemtime($menuCssFs) : time();
$menuJsV  = is_file($menuJsFs)  ? filemtime($menuJsFs)  : time();

$menuLogoV       = is_file($menuLogoFs) ? filemtime($menuLogoFs) : time();
$menuLogoMobileV = is_file($menuLogoMobileFs) ? filemtime($menuLogoMobileFs) : time();
$menuSearchV     = is_file($menuSearchFs) ? filemtime($menuSearchFs) : time();
$menuOpenV       = is_file($menuOpenFs) ? filemtime($menuOpenFs) : time();
$menuCloseV      = is_file($menuCloseFs) ? filemtime($menuCloseFs) : time();
?>

<link rel="stylesheet" href="../general/menu/menu.css?v=<?= $menuCssV ?>">

<section class="ull-nav-wrap" id="menuContainer">
  <header class="ull-nav" id="mainMenu">
    <a class="ull-nav__brand" href="../Home/index.php" aria-label="Home">
      <img class="ull-nav__logo" id="logoOpenHome" src="../general/menu/img/logo.png?v=<?= $menuLogoV ?>" alt="Ullman Sails">
      <img class="ull-nav__logo--mobile" id="logoOpenHomeMobile" src="../general/menu/img/logo_mobile.png?v=<?= $menuLogoMobileV ?>" alt="Ullman Sails">
    </a>

    <nav class="ull-nav__desktop" aria-label="Primary navigation">
      <ul class="ull-nav__list" id="navList">
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../Home/index.php">Home</a></li>

        <li class="ull-nav__item ull-nav__item--has-submenu js-hide-when-search" id="openSubItemsMenu">
          <a class="ull-nav__link ull-caps" href="../SailTypes/index.php">Sail Types</a>
          <div class="ull-nav__submenu" id="subItemsMenu" role="menu" aria-label="Sail Types submenu">
            <a href="../Cruising/index.php" role="menuitem">Cruising Sails</a>
            <a href="../Racing/index.php" role="menuitem">Racing Sails</a>
            <a href="../the_axia_series/index.php" role="menuitem">The Axia Series</a>
          </div>
        </li>

        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../Covers/index.php">Boat covers</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../SailCare/index.php">SailCare</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../Services/index.php">Services</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../News/index.php">News</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../AboutUs/index.php">About Us</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../ContactUs/index.php">Contact Us</a></li>
      </ul>
    </nav>

    <div class="ull-nav__actions">
      <form class="ull-search" id="searchForm" role="search" aria-label="Search site">
        <button class="ull-search__icon" id="searchIconBtn" type="button" aria-label="Toggle search">
          <img src="../general/menu/img/search.png?v=<?= $menuSearchV ?>" alt="">
        </button>
        <input class="ull-search__input" id="searchInput" type="text" placeholder="Search..." autocomplete="off">
        <button class="ull-search__btn" id="searchButton" type="submit">Search</button>
      </form>
    </div>

    <button class="ull-nav__toggle" id="openMenuMobile" type="button" aria-label="Open menu" aria-expanded="false">
      <img src="../general/menu/img/menu.png?v=<?= $menuOpenV ?>" alt="">
    </button>
    <button class="ull-nav__toggle" id="closeMenuMobile" type="button" aria-label="Close menu" aria-expanded="false">
      <img src="../general/menu/img/close.png?v=<?= $menuCloseV ?>" alt="">
    </button>
  </header>

  <div class="ull-drawer-overlay" id="menuMobileBackground" aria-hidden="true"></div>

  <aside class="ull-drawer" id="menuMobile" aria-label="Mobile menu" aria-hidden="true">
    <div class="ull-drawer__header"><span class="ull-drawer__title">Menu</span></div>

    <nav class="ull-drawer__nav" aria-label="Mobile navigation">
      <a class="ull-drawer__link" href="../Home/index.php">Home</a>

      <button class="ull-drawer__acc" type="button" data-acc="sails" aria-expanded="false">Sail Types</button>
      <div class="ull-drawer__panel" data-panel="sails">
        <a class="ull-drawer__sublink" href="../SailTypes/index.php">All Sail Types</a>
        <a class="ull-drawer__sublink" href="../Cruising/index.php">Cruising Sails</a>
        <a class="ull-drawer__sublink" href="../Racing/index.php">Racing Sails</a>
        <a class="ull-drawer__sublink" href="../the_axia_series/index.php">The Axia Series</a>

      </div>

      <a class="ull-drawer__link" href="../Covers/index.php">Boat covers</a>
      <a class="ull-drawer__link" href="../SailCare/index.php">SailCare</a>
      <a class="ull-drawer__link" href="../Services/index.php">Services</a>
      <a class="ull-drawer__link" href="../News/index.php">News</a>
      <a class="ull-drawer__link" href="../AboutUs/index.php">About Us</a>
      <a class="ull-drawer__link" href="../ContactUs/index.php">Contact Us</a>

      <div class="ull-drawer__search">
        <form class="ull-search is-open" id="searchFormMobile" role="search" aria-label="Search site (mobile)">
          <input class="ull-search__input" id="searchInputMobile" type="text" placeholder="Search..." autocomplete="off">
          <button class="ull-search__btn" id="searchButtonMobile" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </aside>
</section>

<script defer src="../general/menu/menu.js?v=<?= $menuJsV ?>"></script>
