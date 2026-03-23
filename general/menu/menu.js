class Menu{

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
