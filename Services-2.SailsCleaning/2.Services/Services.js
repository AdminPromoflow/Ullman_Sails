// Handles optional .OpenContactUs buttons elsewhere
const buttonTitle = document.querySelectorAll(".OpenContactUs");

for (let i = 0; i < buttonTitle.length; i++) {
  buttonTitle[i].addEventListener("click", function () {
    window.open("../ContactUs/index.php", "_self");
  });
}
