const services = [
  "Plumbing",
  "Electrical",
  "Gardening",
  "Cleaning",
  "Painting",
  "Carpentry",
];

function showServices(searchText) {
  const dropdown = document.getElementById("servicesDropdown");
  dropdown.innerHTML = "";

  if (searchText.trim() === "") {
    return;
  }

  const matchingServices = services.filter((service) =>
    service.toLowerCase().includes(searchText.toLowerCase())
  );

  if (matchingServices.length === 0) {
    const noResultsOption = document.createElement("div");
    noResultsOption.textContent = "No matching services found";
    dropdown.appendChild(noResultsOption);
  } else {
    matchingServices.forEach((service) => {
      const option = document.createElement("div");
      option.textContent = service;
      option.addEventListener("click", function () {
        document.getElementById("searchInput").value = service;
        dropdown.innerHTML = "";
      });
      dropdown.appendChild(option);
    });
  }
}
