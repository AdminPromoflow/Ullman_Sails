<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

:root{
  /* Ullman Sails — primary brand colours (style guide) */
  --ull-navy:#202E52;--ull-blue:#005598;--ull-red:#C5234A;--ull-grey:#B0B3AF;--ull-black:#000;--ull-white:#fff;

  /* UI tokens (base) */
  --nav-h:86px;--radius:18px;--shadow:0 18px 60px rgba(0,0,0,.40);--shadow-soft:0 12px 30px rgba(0,0,0,.18);

  /* Type */
  --caps-track:.09em;--nav-fw:500;--nav-fs:1.12rem;--sub-fs:.98rem;

  /* Responsive sizing knobs */
  --nav-pad-x:22px;         /* header horizontal padding */
  --nav-gap:16px;           /* gap between header blocks */
  --link-pad-x:16px;        /* desktop link horizontal padding */
  --logo-h:60px;
  --toggle-w:56px;--toggle-h:52px;
  --search-open-max:320px;
  --drawer-w:min(380px,90vw);
}

*,*::before,*::after{box-sizing:border-box}
body.is-drawer-open{overflow:hidden}

.ull-nav-wrap{
  font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
  position:relative;height:var(--nav-h);z-index:40;color:rgba(255,255,255,.94);
  transition:height .18s ease;overflow:visible;
}
.ull-nav-wrap.is-nav-hidden{height:0}

.ull-nav{

  position:fixed;top:0;left:0;right:0;height:var(--nav-h);width:100%;
  padding:0 var(--nav-pad-x);
  border-bottom: 1px solid rgba(0,62,111, .6);
  display:flex;align-items:center;gap:var(--nav-gap);
  background:var(--ull-blue);box-shadow:var(--shadow);
  backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
  transition:transform .22s ease,opacity .22s ease;will-change:transform,opacity
}
.ull-nav::before{content:"";position:absolute;inset:0;pointer-events:none;background:linear-gradient(180deg,rgba(255,255,255,.16),rgba(255,255,255,0) 55%);opacity:.75}
.ull-nav>*{position:relative;z-index:1}
.ull-nav.is-hidden{transform:translateY(-110%);opacity:0;pointer-events:none}
.ull-nav a{color:inherit;text-decoration:none}

/* Brand */
.ull-nav__brand{display:flex;align-items:center;gap:12px;user-select:none;min-width:150px;flex:0 0 auto}
.ull-nav__logo,.ull-nav__logo--mobile{height:var(--logo-h);width:auto;display:block}
.ull-nav__logo--mobile{display:none}

/* Desktop nav */
.ull-nav__desktop{margin-left:auto;display:flex;align-items:center;min-width:0}
.ull-nav__list{list-style:none;display:flex;align-items:center;gap:8px;margin:0;padding:0;flex-wrap:nowrap}
.ull-nav__item{position:relative;display:flex;align-items:center;white-space:nowrap}

.ull-caps{font-weight:var(--nav-fw);text-transform:uppercase;letter-spacing:var(--caps-track);line-height:1;white-space:nowrap}
.ull-nav__link{
  height:52px;display:inline-flex;align-items:center;
  padding:0 var(--link-pad-x);
  border-radius:999px;font-size:var(--nav-fs);color:rgba(255,255,255,.92);
  transition:background .16s ease,transform .16s ease;
  outline:none;overflow:hidden;text-overflow:ellipsis;word-break:keep-all
}
.ull-nav__link:hover{background:rgba(255,255,255,.16);transform:translateY(-1px)}
.ull-nav__link:focus-visible{box-shadow:0 0 0 3px rgba(197,35,74,.40)}
.ull-nav__link,.ull-nav__submenu a,.ull-search__btn,.ull-drawer__title,.ull-drawer__link,.ull-drawer__acc,.ull-drawer__sublink{
  font-weight:var(--nav-fw);text-transform:uppercase;letter-spacing:var(--caps-track);
  line-height:1;white-space:nowrap;margin:5px 0;
}

.ull-nav__item--has-submenu>.ull-nav__link::after{content:"▾";margin-left:10px;opacity:.95;font-size:.92em}
.ull-nav__item--has-submenu::after{content:"";position:absolute;left:0;right:0;top:100%;height:18px}

.ull-nav__submenu{
  position:absolute;top:calc(100% + 14px);left:50%;
  transform:translateX(-50%) translateY(8px);
  min-width:260px;padding:12px;background:var(--ull-blue);
  border:1px solid rgba(255,255,255,.28);border-radius:var(--radius);
  box-shadow:var(--shadow-soft);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
  opacity:0;pointer-events:none;transition:opacity .16s ease,transform .16s ease;z-index:200
}
.ull-nav__item--has-submenu:hover .ull-nav__submenu,
.ull-nav__item--has-submenu:focus-within .ull-nav__submenu{opacity:1;pointer-events:auto;transform:translateX(-50%) translateY(0)}
.ull-nav__submenu a{
  display:flex;align-items:center;justify-content:center;height:46px;border-radius:14px;
  padding:0 14px;font-size:var(--sub-fs);color:rgba(255,255,255,.95);
  background:rgba(255,255,255,.08);transition:background .16s ease,transform .16s ease
}
.ull-nav__submenu a:hover{background:rgba(197,35,74,.22);transform:translateY(-1px)}

/* Actions (keep a real gap, and JS enforces >= 10px) */
.ull-nav__actions{display:flex;align-items:center;gap:12px;flex:0 0 auto;margin-left:10px}
.ull-search{
  display:flex;align-items:center;gap:10px;padding:6px 12px;height:52px;border-radius:999px;
  border:1px solid rgba(255,255,255,.38);background:rgba(255,255,255,.10);
  box-shadow:0 10px 24px rgba(0,0,0,.12);cursor:text;white-space:nowrap
}
.ull-search__icon{border:0;background:transparent;padding:0;display:inline-flex;align-items:center;justify-content:center;cursor:pointer;opacity:.95;transition:transform .16s ease,opacity .16s ease}
.ull-search__icon:hover{opacity:1;transform:scale(1.06)}
.ull-search__icon img{width:20px;height:20px;display:block}
.ull-search__input{
  width:0;opacity:0;border:0;outline:0;background:transparent;color:#fff;font-size:1.05rem;
  transition:width .18s ease,opacity .18s ease;min-width:0
}
.ull-search.is-open .ull-search__input{width:min(var(--search-open-max),30vw);opacity:1}
.ull-search__input::placeholder{color:rgba(255,255,255,.75)}
.ull-search__btn{
  height:36px;border:0;border-radius:999px;padding:0 14px;cursor:pointer;font-size:.95rem;
  background:var(--ull-red);color:#fff;opacity:0;transform:translateY(1px);pointer-events:none;
  transition:opacity .18s ease,transform .18s ease,filter .18s ease
}
.ull-search.is-open .ull-search__btn{opacity:1;transform:translateY(0);pointer-events:auto}
.ull-search__btn:hover{filter:brightness(1.07)}
.ull-nav.is-search-open .js-hide-when-search{display:none}

/* Toggle */
.ull-nav__toggle{
  margin-left:auto;border:1px solid rgba(255,255,255,.38);background:rgba(255,255,255,.10);
  height:var(--toggle-h);width:var(--toggle-w);border-radius:18px;
  display:none;align-items:center;justify-content:center;cursor:pointer;
  transition:transform .16s ease,background .16s ease
}
.ull-nav__toggle:hover{background:rgba(255,255,255,.16);transform:translateY(-1px)}
.ull-nav__toggle img{width:22px;height:22px;display:block}

/* Overlay + Drawer */
.ull-drawer-overlay{
  position:fixed;inset:var(--nav-h) 0 0;background:rgba(0,0,0,.45);
  backdrop-filter:blur(2px);-webkit-backdrop-filter:blur(2px);
  z-index:55;opacity:0;pointer-events:none;transition:opacity .18s ease;display:none
}
.ull-drawer{
  position:fixed;top:var(--nav-h);right:0;
  height:calc(100vh - var(--nav-h));
  height:calc(100dvh - var(--nav-h));
  max-height:calc(100dvh - var(--nav-h));
  width:var(--drawer-w);
  background:rgba(32,46,82,.99);
  border-left:1px solid rgba(176,179,175,.45);
  box-shadow:-20px 0 70px rgba(0,0,0,.35);
  z-index:60;transform:translateX(12px);opacity:0;pointer-events:none;
  transition:transform .18s ease,opacity .18s ease;
  display:none;
  overflow-y:auto; /* ✅ scroll inside drawer when needed */
  -webkit-overflow-scrolling:touch;
  overscroll-behavior:contain;
}
.ull-drawer.is-open{transform:translateX(0);opacity:1;pointer-events:auto}

.ull-drawer__header{display:flex;align-items:center;justify-content:center;padding:16px 14px 12px;border-bottom:1px solid rgba(176,179,175,.28)}
.ull-drawer__title{font-size:1.12rem;color:rgba(255,255,255,.94);text-align:center}
.ull-drawer__nav{padding:12px;display:flex;flex-direction:column;gap:8px}
.ull-drawer__link,.ull-drawer__acc{
  height:52px;border-radius:18px;padding:0 16px;display:flex;align-items:center;justify-content:space-between;
  border:1px solid rgba(176,179,175,.28);background:rgba(255,255,255,.06);
  font-size:1.05rem;color:rgba(255,255,255,.95);cursor:pointer
}
.ull-drawer__link:hover,.ull-drawer__acc:hover{background:rgba(255,255,255,.12)}
.ull-drawer__acc::after{content:"▾";opacity:.9}
.ull-drawer__panel{display:none;padding:8px;border-radius:18px;border:1px solid rgba(176,179,175,.22);background:rgba(0,0,0,.10)}
.ull-drawer__panel.is-open{display:block}
.ull-drawer__sublink{height:48px;border-radius:14px;padding:0 14px;display:flex;align-items:center;font-size:var(--sub-fs);color:rgba(255,255,255,.95)}
.ull-drawer__sublink:hover{background:rgba(197,35,74,.22)}

.ull-drawer__search{margin-top:12px;padding:12px;border-top:1px solid rgba(176,179,175,.28)}
.ull-drawer__search .ull-search{width:100%}
.ull-drawer__search .ull-search__input{width:100%!important;opacity:1!important}
.ull-drawer__search .ull-search__btn{opacity:1!important;pointer-events:auto!important;transform:none!important}

/* ---------------- Mobile mode (via JS class) ---------------- */
.ull-nav-wrap.is-mobile .ull-nav__toggle{display:inline-flex}
.ull-nav-wrap.is-mobile .ull-nav__logo{display:none}
.ull-nav-wrap.is-mobile .ull-nav__logo--mobile{display:block}
.ull-nav-wrap.is-mobile .ull-drawer-overlay,.ull-nav-wrap.is-mobile .ull-drawer{display:block}
.ull-nav-wrap.is-mobile.is-drawer-open .ull-drawer-overlay{opacity:1;pointer-events:auto}

/* Hide desktop navigation/actions in mobile mode, but keep them measurable off-screen */
.ull-nav-wrap.is-mobile .ull-nav__desktop,
.ull-nav-wrap.is-mobile .ull-nav__actions{
  position:absolute!important;left:-9999px!important;top:-9999px!important;
  visibility:hidden!important;display:flex!important;pointer-events:none!important
}

/* ---------------- Toggle visibility: SINGLE source of truth ---------------- */
.ull-nav-wrap #openMenuMobile,.ull-nav-wrap #closeMenuMobile{display:none}
.ull-nav-wrap.is-mobile #openMenuMobile{display:inline-flex}
.ull-nav-wrap.is-mobile.is-drawer-open #closeMenuMobile{display:inline-flex}
.ull-nav-wrap.is-mobile.is-drawer-open #openMenuMobile{display:none}
.ull-nav-wrap.is-mobile:not(.is-drawer-open) #closeMenuMobile{display:none}

/* --------- Tiered tuning for YOUR widths ---------
   1168 × 755  -> mobile (JS <= 1280)
   1312 × 848  -> compact desktop (tighten)
   1496 × 967  -> normal desktop
   1728 × 1117 -> large desktop (breathe)
   2056 × 1329 -> XL desktop (max breathe)
*/
@media (min-width:1168px){
  .ull-nav-wrap.is-mobile{--drawer-w:min(420px,90vw)}
}
@media (min-width:1312px){
  .ull-nav-wrap:not(.is-mobile){
    --nav-pad-x:20px;--nav-gap:14px;--link-pad-x:12px;
    --nav-fs:1.05rem;--caps-track:.08em;--search-open-max:280px;
  }
}
@media (min-width:1496px){
  .ull-nav-wrap:not(.is-mobile){
    --nav-pad-x:22px;--nav-gap:16px;--link-pad-x:16px;
    --nav-fs:1.12rem;--caps-track:.09em;--search-open-max:320px;
  }
}
@media (min-width:1728px){
  .ull-nav-wrap:not(.is-mobile){
    --nav-pad-x:28px;--nav-gap:18px;--link-pad-x:18px;
    --nav-fs:1.16rem;--search-open-max:380px;
  }
}
@media (min-width:2056px){
  .ull-nav-wrap:not(.is-mobile){
    --nav-pad-x:34px;--nav-gap:20px;--link-pad-x:20px;
    --nav-fs:1.22rem;--search-open-max:440px;
  }
}

/* Fallback if JavaScript is disabled (or before JS adds .is-mobile) */
@media (max-width:1280px){
  .ull-nav-wrap:not(.is-mobile) .ull-nav__desktop,
  .ull-nav-wrap:not(.is-mobile) .ull-nav__actions{display:none}

  .ull-nav-wrap:not(.is-mobile) .ull-nav__toggle{display:inline-flex}
  .ull-nav-wrap:not(.is-mobile) .ull-nav__logo{display:none}
  .ull-nav-wrap:not(.is-mobile) .ull-nav__logo--mobile{display:block}

  .ull-nav-wrap:not(.is-mobile) #openMenuMobile{display:inline-flex}
  .ull-nav-wrap:not(.is-mobile) #closeMenuMobile{display:none}
}

@media (prefers-reduced-motion:reduce){*{transition:none!important}}
</style>

<section class="ull-nav-wrap" id="menuContainer">
  <header class="ull-nav" id="mainMenu">
    <a class="ull-nav__brand" href="../Home/index.php" aria-label="Home">
      <img class="ull-nav__logo" id="logoOpenHome" src="../General/Menu/Logo.png" alt="Ullman Sails">
      <img class="ull-nav__logo--mobile" id="logoOpenHomeMobile" src="../General/Menu/LogoMobile.png" alt="Ullman Sails">
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
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../News/News.php">News</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../AboutUs/index.php">About Us</a></li>
        <li class="ull-nav__item js-hide-when-search"><a class="ull-nav__link ull-caps" href="../ContactUs/index.php">Contact Us</a></li>
      </ul>
    </nav>

    <div class="ull-nav__actions">
      <form class="ull-search" id="searchForm" role="search" aria-label="Search site">
        <button class="ull-search__icon" id="searchIconBtn" type="button" aria-label="Toggle search">
          <img src="../General/Menu/search.png" alt="">
        </button>
        <input class="ull-search__input" id="searchInput" type="text" placeholder="Search..." autocomplete="off">
        <button class="ull-search__btn" id="searchButton" type="submit">Search</button>
      </form>
    </div>

    <button class="ull-nav__toggle" id="openMenuMobile" type="button" aria-label="Open menu" aria-expanded="false">
      <img src="../General/Menu/menu.png" alt="">
    </button>
    <button class="ull-nav__toggle" id="closeMenuMobile" type="button" aria-label="Close menu" aria-expanded="false">
      <img src="../General/Menu/close.png" alt="">
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
      <a class="ull-drawer__link" href="../News/News.php">News</a>
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

<script>
class Menu{
  /**
   * Ullman Sails header controller.
   * - Switches to mobile if width <= breakpoint OR if nav would touch actions (minGapPx).
   * - Uses REAL rendered geometry (nav list vs actions) + a safe width prediction.
   */
  constructor({breakpointPx=1280,bottomThresholdPx=8,minScrollDeltaPx=6,minGapPx=10}={}){
    this.bp=breakpointPx;this.bottomT=bottomThresholdPx;this.minDelta=minScrollDeltaPx;this.minGap=minGapPx;
    this.lastY=Math.max(0,window.scrollY||0);this.navHidden=false;this.rafL=0;this.rafS=0;

    const $=id=>document.getElementById(id);
    this.wrap=$("menuContainer");this.header=$("mainMenu");
    this.brand=this.header?.querySelector(".ull-nav__brand");
    this.desktop=this.header?.querySelector(".ull-nav__desktop");
    this.list=$("navList") || this.header?.querySelector(".ull-nav__list");
    this.actions=this.header?.querySelector(".ull-nav__actions");

    this.openBtn=$("openMenuMobile");this.closeBtn=$("closeMenuMobile");
    this.overlay=$("menuMobileBackground");this.drawer=$("menuMobile");

    this.searchForm=$("searchForm");this.searchIconBtn=$("searchIconBtn");this.searchInput=$("searchInput");
    this.searchFormMobile=$("searchFormMobile");this.searchInputMobile=$("searchInputMobile");
    this.init();
  }

  init(){
    if(!this.wrap||!this.header) return;

    this.openBtn?.addEventListener("click",()=>this.setDrawer(true));
    this.closeBtn?.addEventListener("click",()=>this.setDrawer(false));
    this.overlay?.addEventListener("click",()=>this.setDrawer(false));

    this.searchForm?.addEventListener("click",()=>!this.isMobile()&&this.setSearch(true));
    this.searchIconBtn?.addEventListener("click",(e)=>{
      if(this.isMobile()) return;
      e.preventDefault();e.stopPropagation();
      this.setSearch(!this.searchForm.classList.contains("is-open"));
      this.requestLayout(); /* search width changes can affect fit */
    });
    document.addEventListener("click",(e)=>!this.isMobile()&&!this.searchForm?.contains(e.target)&&this.setSearch(false));
    this.searchForm?.addEventListener("submit",(e)=>this.onSearchSubmit(e,false));
    this.searchFormMobile?.addEventListener("submit",(e)=>this.onSearchSubmit(e,true));

    window.addEventListener("keydown",(e)=>{
      if(e.key!=="Escape") return;
      this.setDrawer(false);this.setSearch(false);
    });

    window.addEventListener("scroll",()=>this.onScrollRaf(),{passive:true});
    window.addEventListener("resize",()=>this.requestLayout(),{passive:true});
    if("ResizeObserver" in window) (this.ro=new ResizeObserver(()=>this.requestLayout())).observe(this.header);
    document.fonts?.ready?.then(()=>this.requestLayout()).catch(()=>{});

    this.setupAccordions();
    this.setDrawer(false);this.setSearch(false);
    this.requestLayout(true);
  }

  vw(){const w=window.innerWidth||0,cw=document.documentElement?.clientWidth||0;return cw?Math.min(w||cw,cw):w}
  isMobile(){return this.wrap.classList.contains("is-mobile")}

  isOverflown(){
    if(!this.header||!this.brand||!this.desktop||!this.actions) return false;

    const hw=this.header.clientWidth;
    if(!hw) return false;

    const cs=getComputedStyle(this.header);
    const usable=Math.max(0,hw-(parseFloat(cs.paddingLeft)||0)-(parseFloat(cs.paddingRight)||0));

    const navW=(this.list?.scrollWidth || this.desktop.scrollWidth || 0);
    const safe=24; /* tiny safety buffer for fractional px / rounding */
    const required=this.brand.offsetWidth + navW + this.actions.offsetWidth + this.minGap + safe;

    if(required>usable) return true;

    /* Real rendered gap check (nav list vs actions) */
    if(!this.isMobile() && this.list){
      const nr=this.list.getBoundingClientRect();
      const ar=this.actions.getBoundingClientRect();
      const gap=ar.left - nr.right;
      if(gap < this.minGap) return true; /* ✅ guarantee at least 10px */
    }
    return false;
  }

  shouldMobile(){return this.vw()<=this.bp || this.isOverflown()}

  requestLayout(immediate=false){
    if(immediate) return this.syncLayout();
    if(this.rafL) return;
    this.rafL=requestAnimationFrame(()=>{this.rafL=0;this.syncLayout()});
  }

  syncLayout(){
    const next=this.shouldMobile(),cur=this.isMobile();
    if(next!==cur){
      this.wrap.classList.toggle("is-mobile",next);
      this.setSearch(false);
      if(!next) this.setDrawer(false);
    }
    if(!this.isMobile()) this.setDrawer(false);
  }

  setDrawer(open){
    if(!this.isMobile()) open=false;
    this.wrap.classList.toggle("is-drawer-open",open);
    this.drawer?.classList.toggle("is-open",open);
    document.body.classList.toggle("is-drawer-open",open);
    this.drawer?.setAttribute("aria-hidden",open?"false":"true");
    this.overlay?.setAttribute("aria-hidden",open?"false":"true");
    this.openBtn?.setAttribute("aria-expanded",open?"true":"false");
    this.closeBtn?.setAttribute("aria-expanded",open?"true":"false");
  }

  setSearch(open){
    if(!this.searchForm||!this.header) return;
    if(this.isMobile()) open=false;
    const isOpen=this.searchForm.classList.contains("is-open");
    if(open===isOpen) return;
    this.searchForm.classList.toggle("is-open",open);
    this.header.classList.toggle("is-search-open",open);
    open ? setTimeout(()=>this.searchInput?.focus(),0) : this.searchInput?.blur();
  }

  onSearchSubmit(e,isMobile){
    e.preventDefault();
    const q=((isMobile?this.searchInputMobile:this.searchInput)?.value||"").trim();
    console.log("Search:",q);
    if(isMobile) this.setDrawer(false);
  }

  setupAccordions(){
    if(!this.drawer) return;
    this.drawer.querySelectorAll("[data-acc]").forEach((btn)=>{
      btn.addEventListener("click",()=>{
        const key=btn.getAttribute("data-acc");
        const panel=this.drawer.querySelector(`[data-panel="${key}"]`);
        if(!panel) return;
        const willOpen=!panel.classList.contains("is-open");

        this.drawer.querySelectorAll(".ull-drawer__panel.is-open").forEach(p=>p.classList.remove("is-open"));
        this.drawer.querySelectorAll("[data-acc][aria-expanded='true']").forEach(b=>b.setAttribute("aria-expanded","false"));

        panel.classList.toggle("is-open",willOpen);
        btn.setAttribute("aria-expanded",willOpen?"true":"false");
      });
    });
  }

  onScrollRaf(){
    if(this.rafS) return;
  //  this.rafS=requestAnimationFrame(()=>{this.rafS=0;this.onScroll()});
  }
  setNavHidden(hidden){
    this.navHidden=hidden;
    this.header.classList.toggle("is-hidden",hidden);
    this.wrap.classList.toggle("is-nav-hidden",hidden);
  }
  atBottom(y){
    const d=document.documentElement,sh=Math.max(d.scrollHeight,document.body.scrollHeight);
    return (y+window.innerHeight)>=(sh-this.bottomT);
  }
  onScroll(){
    const y=Math.max(0,window.scrollY||0),delta=y-this.lastY;
    if(Math.abs(delta)<this.minDelta) return;

    if(this.atBottom(y)){ if(this.navHidden) this.setNavHidden(false); this.lastY=y; return; }
    if(y<=window.innerHeight){ if(this.navHidden) this.setNavHidden(false); this.lastY=y; return; }

    if(delta>0){ if(!this.navHidden) this.setNavHidden(true); }
    else{ if(this.navHidden) this.setNavHidden(false); }

    this.lastY=y;
  }
}

document.addEventListener("DOMContentLoaded",()=>new Menu({
  breakpointPx:1280, /* 1168 => mobile, 1312+ => desktop if it fits */
  minGapPx:10
}));
</script>
