const searchInput = document.getElementById("searchInput");
const resultsContainer = document.getElementById("resultsContainer");
const emptyState = document.getElementById("emptyState");
const searchStatus = document.getElementById("searchStatus");
const clearSearch = document.getElementById("clearSearch");

/*
  Sample searchable data.
  Replace this with your real pages, services or website content.
*/
const pagesData = [
  {
    title: "Ullman Sails Home",
    category: "Main Page",
    path: "/home",
    url: "#",
    text: "Discover Ullman Sails, performance craftsmanship, custom sail solutions and premium sailing services."
  },
  {
    title: "Cruising Sails",
    category: "Sail Types",
    path: "/cruising-sails",
    url: "#",
    text: "Explore cruising sails designed for comfort, durability and dependable sailing performance."
  },
  {
    title: "Racing Sails",
    category: "Sail Types",
    path: "/racing-sails",
    url: "#",
    text: "High-performance racing sails built for speed, responsiveness and competitive sailing conditions."
  },
  {
    title: "Navigator Series",
    category: "Series",
    path: "/navigator-series",
    url: "#",
    text: "The Navigator Series is designed for coastal cruising and day sailing with durable custom construction."
  },
  {
    title: "Endurance Series",
    category: "Series",
    path: "/endurance-series",
    url: "#",
    text: "The Endurance Series offers strength and reliability for sailors looking for long-lasting sail performance."
  },
  {
    title: "Voyager Series",
    category: "Series",
    path: "/voyager-series",
    url: "#",
    text: "Voyager Series sails are made for serious cruising sailors seeking balance, quality and dependable handling."
  },
  {
    title: "Expedition Series",
    category: "Series",
    path: "/expedition-series",
    url: "#",
    text: "Expedition Series sails are crafted for offshore conditions and demanding adventures at sea."
  },
  {
    title: "Covers",
    category: "Services",
    path: "/covers",
    url: "#",
    text: "Find custom covers for marine protection, quality finishing and tailored solutions for your boat."
  },
  {
    title: "Sail Repair",
    category: "Services",
    path: "/sail-repair",
    url: "#",
    text: "Professional sail repair services to restore performance, improve durability and extend sail life."
  },
  {
    title: "New Sail Quote",
    category: "Quote",
    path: "/new-sail-quote",
    url: "#",
    text: "Request a new sail quote by providing your sailing details, boat information and sail requirements."
  }
];

/*
  Escape special characters before using the value in a regular expression.
*/
function escapeRegExp(value) {
  return value.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
}

/*
  Highlight matched text.
*/
function highlightText(text, query) {
  if (!query.trim()) return text;

  const safeQuery = escapeRegExp(query);
  const regex = new RegExp(`(${safeQuery})`, "gi");

  return text.replace(regex, "<mark>$1</mark>");
}

/*
  Filter results by title, category, path or text.
*/
function filterResults(query) {
  const cleanQuery = query.trim().toLowerCase();

  if (!cleanQuery) {
    return [];
  }

  return pagesData.filter((item) => {
    return (
      item.title.toLowerCase().includes(cleanQuery) ||
      item.category.toLowerCase().includes(cleanQuery) ||
      item.path.toLowerCase().includes(cleanQuery) ||
      item.text.toLowerCase().includes(cleanQuery)
    );
  });
}

/*
  Create a result card.
*/
function createResultCard(item, query) {
  return `
    <article class="result-card">
      <div class="result-card__top">
        <span class="result-card__category">${item.category}</span>
        <span class="result-card__path">${item.path}</span>
      </div>

      <h2 class="result-card__title">
        ${highlightText(item.title, query)}
      </h2>

      <p class="result-card__text">
        ${highlightText(item.text, query)}
      </p>

      <a class="result-card__link" href="${item.url}">
        View page
        <span aria-hidden="true">→</span>
      </a>
    </article>
  `;
}

/*
  Render results on the page.
*/
function renderResults(query) {
  const results = filterResults(query);

  resultsContainer.innerHTML = "";

  if (!query.trim()) {
    emptyState.classList.add("is-hidden");
    searchStatus.textContent = "Type a word to begin your search.";
    return;
  }

  if (results.length === 0) {
    emptyState.classList.remove("is-hidden");
    searchStatus.textContent = `No results for "${query}".`;
    return;
  }

  emptyState.classList.add("is-hidden");

  const cards = results.map((item) => createResultCard(item, query)).join("");
  resultsContainer.innerHTML = cards;

  searchStatus.textContent = `${results.length} result${results.length > 1 ? "s" : ""} found for "${query}".`;
}

/*
  Search automatically while typing.
*/
searchInput.addEventListener("input", function () {
  renderResults(this.value);
});

/*
  Clear search field.
*/
clearSearch.addEventListener("click", function () {
  searchInput.value = "";
  resultsContainer.innerHTML = "";
  emptyState.classList.add("is-hidden");
  searchStatus.textContent = "Type a word to begin your search.";
  searchInput.focus();
});
