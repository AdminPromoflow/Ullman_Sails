document.addEventListener("DOMContentLoaded", function () {
  const quote_button = document.querySelector(".js_quote_button");

  if (!quote_button) return;

  quote_button.addEventListener("click", function (event) {
    const is_confirmed = window.confirm("Confirm you want to request a quote.");

    if (!is_confirmed) {
      event.preventDefault();
    }
  });
});
