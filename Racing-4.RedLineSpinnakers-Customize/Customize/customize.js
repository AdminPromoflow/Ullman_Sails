document.addEventListener("DOMContentLoaded", function () {
  let colourCustomize = "white";

  const sharedColours = {
    nyliteFull: [
      "#EFE8D2", // Cream
      "#F70F8A", // Pink
      "#FF5A0A", // Orange
      "#E60808", // Red
      "#E99A00", // Gold
      "#FFE329", // Yellow
      "#06733B", // Green
      "#22B3AE", // Turquoise
      "#12128B", // Navy blue
      "#168CBC", // Blue
      "#5D08B9", // Purple
      "#606664", // Grey
      "#000000", // Black
      "#FFFFFF"  // White
    ],

    fibermaxFull: [
      "#F70F8A", // Pink
      "#FF5A0A", // Orange
      "#E60808", // Red
      "#FFE329", // Yellow
      "#06733B", // Green
      "#12128B", // Navy blue
      "#168CBC", // Blue
      "#5D08B9", // Purple
      "#606664", // Grey
      "#000000", // Black
      "#E99A00", // Gold
      "#20293F", // Dark navy
      "#6BDC56", // Light green
      "#E015A5", // Magenta
      "#F5FF00", // Neon yellow
      "#147F91", // Teal
      "#FFFFFF"  // White
    ],

    raceBasicFull: [
      "#F70F8A", // Pink
      "#FF5A0A", // Orange
      "#E60808", // Red
      "#E99A00", // Gold
      "#FFE329", // Yellow
      "#06733B", // Green
      "#12128B", // Navy blue
      "#168CBC", // Blue
      "#5D08B9", // Purple
      "#606664", // Grey
      "#000000", // Black
      "#FFFFFF"  // White
    ],

    redBlueWhite: [
      "#E60808", // Red
      "#12128B", // Navy blue
      "#FFFFFF"  // White
    ],

    redBlueBlackWhite: [
      "#E60808", // Red
      "#12128B", // Navy blue
      "#000000", // Black
      "#FFFFFF"  // White
    ],

    redBlueGreyBlackWhite: [
      "#E60808", // Red
      "#12128B", // Navy blue
      "#606664", // Grey
      "#000000", // Black
      "#FFFFFF"  // White
    ],

    whiteOnly: [
      "#FFFFFF" // White
    ],

    airxFull: [
      "#E60808", // Red
      "#FFE329", // Yellow
      "#12128B", // Navy blue
      "#168CBC", // Blue
      "#606664", // Grey
      "#000000", // Black
      "#4B5663", // Slate grey
      "#FFFFFF"  // White
    ]
  };

  const sailData = {
    raceAsym: {
      name: "Race: Axia Asym",
      clothWeights: {
        "Nylite 90": sharedColours.nyliteFull,
        "Nylite 150": sharedColours.nyliteFull,

        "Fibermax 44": sharedColours.fibermaxFull,
        "Fibermax 64": sharedColours.fibermaxFull,

        "Superlite 50": sharedColours.redBlueWhite,

        "Superkote 60": sharedColours.redBlueBlackWhite,
        "Superkote 70": sharedColours.whiteOnly,
        "Superkote 75": sharedColours.redBlueBlackWhite,
        "Superkote 80": sharedColours.whiteOnly,
        "Superkote 90": sharedColours.redBlueBlackWhite,
        "Superkote 130": sharedColours.whiteOnly,
        "Superkote 150": sharedColours.redBlueBlackWhite,
        "Superkote 200": sharedColours.whiteOnly,
        "Superkote 250": sharedColours.redBlueWhite,
        "Superkote 350": sharedColours.airxFull,

        "Stormlite 210": sharedColours.redBlueWhite,
        "Stormlite 510": sharedColours.whiteOnly,

        "AIRX 500": sharedColours.airxFull,
        "AIRX 600": sharedColours.airxFull,
        "AIRX 650": sharedColours.airxFull,
        "AIRX 700": sharedColours.airxFull,
        "AIRX 800": sharedColours.airxFull,
        "AIRX 900": sharedColours.airxFull
      }
    },

    raceSymm: {
      name: "Race: Axia Symm",
      clothWeights: {
        "Nylite 90": sharedColours.nyliteFull,
        "Nylite 150": sharedColours.nyliteFull,

        "Fibermax 44": sharedColours.fibermaxFull,
        "Fibermax 64": sharedColours.fibermaxFull,

        "Superlite 50": sharedColours.redBlueWhite,

        "Superkote 60": sharedColours.redBlueBlackWhite,
        "Superkote 70": sharedColours.whiteOnly,
        "Superkote 75": sharedColours.redBlueBlackWhite,
        "Superkote 80": sharedColours.whiteOnly,
        "Superkote 90": sharedColours.redBlueBlackWhite,
        "Superkote 130": sharedColours.whiteOnly,
        "Superkote 150": sharedColours.redBlueBlackWhite,
        "Superkote 200": sharedColours.whiteOnly,
        "Superkote 250": sharedColours.redBlueWhite,
        "Superkote 350": sharedColours.raceBasicFull,

        "Stormlite 210": sharedColours.redBlueWhite,
        "Stormlite 510": sharedColours.whiteOnly,

        "AIRX 500": sharedColours.raceBasicFull,
        "AIRX 600": sharedColours.raceBasicFull,
        "AIRX 650": sharedColours.raceBasicFull,
        "AIRX 700": sharedColours.raceBasicFull,
        "AIRX 800": sharedColours.raceBasicFull,
        "AIRX 900": sharedColours.raceBasicFull
      }
    }
  };

  const sailTypeSelect = document.getElementById("sailType");
  const clothWeightSelect = document.getElementById("clothWeight");
  const availableColours = document.getElementById("availableColours");
  const contentDownload = document.getElementById("contentDownload");
  const sailOptions = document.querySelectorAll(".sail-option");
  const downloadPDF = document.getElementById("downloadPDF");

  if (!sailTypeSelect) {
    console.error("No existe #sailType");
    return;
  }

  if (!clothWeightSelect) {
    console.error("No existe #clothWeight");
    return;
  }

  if (!availableColours) {
    console.error("No existe #availableColours");
    return;
  }

  if (!contentDownload) {
    console.error("No existe #contentDownload");
    return;
  }

  const allSvgs = contentDownload.querySelectorAll("svg");

  allSvgs.forEach(function (svg) {
    svg.classList.add("spinnaker-svg");
  });

  function showSelectedSail(sailId) {
    sailOptions.forEach(function (option) {
      option.classList.remove("active");
    });

    const selectedSail = document.getElementById(sailId);

    if (selectedSail) {
      selectedSail.classList.add("active");
    } else {
      console.error("No existe el SVG con id:", sailId);
    }
  }

  function loadClothWeights(sailId) {
    const selectedSailData = sailData[sailId];

    clothWeightSelect.innerHTML = "";

    if (!selectedSailData) {
      console.error("No existe información para este sail:", sailId);
      return;
    }

    const weights = Object.keys(selectedSailData.clothWeights);

    weights.forEach(function (weight) {
      const option = document.createElement("option");

      option.value = weight;
      option.textContent = weight;

      clothWeightSelect.appendChild(option);
    });

    if (weights.length > 0) {
      clothWeightSelect.value = weights[0];
      loadAvailableColours(sailId, weights[0]);
    }
  }

  function loadAvailableColours(sailId, clothWeight) {
    const colours = sailData[sailId]?.clothWeights[clothWeight] || [];

    availableColours.innerHTML = "";

    if (colours.length === 0) {
      colourCustomize = "white";
      return;
    }

    colours.forEach(function (colour, index) {
      const colourButton = document.createElement("div");

      colourButton.classList.add("colour");
      colourButton.style.backgroundColor = colour;
      colourButton.dataset.colour = colour;
      colourButton.title = colour;

      colourButton.addEventListener("click", function () {
        colourCustomize = colour;

        const allColourButtons = availableColours.querySelectorAll(".colour");

        allColourButtons.forEach(function (item) {
          item.classList.remove("active");
        });

        colourButton.classList.add("active");
      });

      availableColours.appendChild(colourButton);

      if (index === 0) {
        colourButton.classList.add("active");
        colourCustomize = colour;
      }
    });
  }

  sailTypeSelect.addEventListener("change", function () {
    const selectedSailId = sailTypeSelect.value;

    showSelectedSail(selectedSailId);
    loadClothWeights(selectedSailId);
  });

  clothWeightSelect.addEventListener("change", function () {
    const selectedSailId = sailTypeSelect.value;
    const selectedClothWeight = clothWeightSelect.value;

    loadAvailableColours(selectedSailId, selectedClothWeight);
  });

  contentDownload.addEventListener("click", function (event) {
    const paintableElement = event.target.closest(
      "path, polygon, rect, circle, ellipse, polyline"
    );

    if (!paintableElement) return;

    const activeSail = document.querySelector(".sail-option.active");

    if (!activeSail || !activeSail.contains(paintableElement)) return;

    if (paintableElement.hasAttribute("style")) {
      const currentStyle = paintableElement.getAttribute("style");
      const cleanStyle = currentStyle.replace(/fill\s*:\s*[^;]+;?/i, "");

      paintableElement.setAttribute("style", cleanStyle);
    }

    paintableElement.style.fill = colourCustomize;
    paintableElement.setAttribute("fill", colourCustomize);
  });

  if (downloadPDF) {
    downloadPDF.addEventListener("click", function () {
      const activeOption = document.querySelector(".sail-option.active");

      if (!activeOption) {
        alert("Please select a sail design.");
        return;
      }

      const svgElement = activeOption.querySelector("svg");

      if (!svgElement) {
        alert("No SVG found.");
        return;
      }

      const clonedSvg = svgElement.cloneNode(true);

      clonedSvg.setAttribute("xmlns", "http://www.w3.org/2000/svg");

      const svgData = new XMLSerializer().serializeToString(clonedSvg);

      const svgBlob = new Blob([svgData], {
        type: "image/svg+xml;charset=utf-8"
      });

      const url = URL.createObjectURL(svgBlob);

      const img = new Image();

      img.onload = function () {
        const canvas = document.createElement("canvas");
        const ctx = canvas.getContext("2d");

        const canvasWidth = 1000;
        const canvasHeight = 1400;

        canvas.width = canvasWidth;
        canvas.height = canvasHeight;

        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        const scaledWidth = canvasWidth * 0.85;
        const scaledHeight = img.height * (scaledWidth / img.width);

        const x = (canvasWidth - scaledWidth) / 2;
        const y = (canvasHeight - scaledHeight) / 2;

        ctx.drawImage(img, x, y, scaledWidth, scaledHeight);

        if (typeof jsPDF !== "undefined") {
          const pdf = new jsPDF();

          pdf.addImage(
            canvas.toDataURL("image/jpeg", 1.0),
            "JPEG",
            0,
            0,
            pdf.internal.pageSize.getWidth(),
            pdf.internal.pageSize.getHeight()
          );

          pdf.save("custom-spinnaker.pdf");
        } else if (window.jspdf && window.jspdf.jsPDF) {
          const pdf = new window.jspdf.jsPDF();

          pdf.addImage(
            canvas.toDataURL("image/jpeg", 1.0),
            "JPEG",
            0,
            0,
            pdf.internal.pageSize.getWidth(),
            pdf.internal.pageSize.getHeight()
          );

          pdf.save("custom-spinnaker.pdf");
        } else {
          alert("jsPDF is not loaded.");
        }

        URL.revokeObjectURL(url);
      };

      img.src = url;
    });
  }

  showSelectedSail(sailTypeSelect.value);
  loadClothWeights(sailTypeSelect.value);
});
