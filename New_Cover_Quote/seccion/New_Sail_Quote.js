class NewCoverQuote {
  constructor() {
    const params = new URLSearchParams(window.location.search);
    const sailType = params.get('sailType');
    const title = params.get('title');
    sail_type.value = title;
    if (sailType == "Cruising Sails") {
      // checkbox_cruising.checked = true;


    }
    else if (sailType == "Racing Sails") {
      // checkbox_racing.checked = true;

    }

  }
}

//
// const checkbox_cruising = document.getElementById("checkbox_cruising");
// const checkbox_racing = document.getElementById("checkbox_racing");
const sail_type = document.getElementById("sail_type");
const newSailQuote = new NewCoverQuote();
