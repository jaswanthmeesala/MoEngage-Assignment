document.addEventListener("DOMContentLoaded", function () {
  const breweryListElement = document.getElementById("brewery-list");
  const showMoreButton = document.getElementById("show-more");
  const searchButton = document.getElementById("search-button");
  const categorySelect = document.getElementById("category");
  const searchInput = document.getElementById("search-input");

  let breweries = [];
  let filteredBreweries = [];
  let currentPage = 0;
  const itemsPerPage = 30;

  fetch("https://api.openbrewerydb.org/v1/breweries")
    .then((response) => response.json())
    .then((data) => {
      breweries = data;
      filteredBreweries = breweries;
      displayBreweries();
    })
    .catch((error) => {
      console.error("Error fetching breweries:", error);
    });

  function displayBreweries() {
    const start = currentPage * itemsPerPage;
    const end = start + itemsPerPage;
    const breweriesToShow = filteredBreweries.slice(start, end);

    breweriesToShow.forEach((brewery) => {
      const breweryElement = document.createElement("div");
      breweryElement.className = "brewery";
      breweryElement.innerHTML = `
                <h2>${brewery.name}</h2>
                <p><strong>Street:</strong> ${brewery.street || "N/A"} </p>
                <p><strong>City:</strong> ${brewery.city || "N/A"} </p>
                <p><strong>State:</strong> ${brewery.state || "N/A"}</p>
                <p><strong>Phone:</strong> ${brewery.phone || "N/A"}</p>
                <p><strong>Website:</strong> ${
                  brewery.website_url
                    ? `<a href="${brewery.website_url}" target="_blank">${brewery.website_url}</a>`
                    : "N/A"
                }</p>

                <form action="main.php">
                  <label for="rate">Rating (between 0 and 5):</label>
                  <input type="range" id="rating" name="rate" min="0" max="5">
                  <button type="submit" onclick="addReview('${
                    brewery.name
                  }')">Add Rating</button>

                </form>`;
      breweryListElement.appendChild(breweryElement);
    });

    currentPage++;
    if (currentPage * itemsPerPage >= filteredBreweries.length) {
      showMoreButton.style.display = "none";
    }
  }

  function filterBreweries() {
    const category = categorySelect.value;
    const searchTerm = searchInput.value.toLowerCase();

    filteredBreweries = breweries.filter((brewery) => {
      const value = brewery[category] ? brewery[category].toLowerCase() : "";
      return value.includes(searchTerm);
    });

    breweryListElement.innerHTML = "";
    currentPage = 0;
    showMoreButton.style.display = "block";
    displayBreweries();
  }

  searchButton.addEventListener("click", filterBreweries);
  showMoreButton.addEventListener("click", displayBreweries);
});

function addReview(breweryName) {
  alert(`Thank you for Rating ${breweryName}`);
}
