<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <section class="home">
        <div class="home_bg">
            <div class="home_bg_overlay"></div>
            <div class="home_content">
                <h2>Services on demand</h2>
                <p>Get your services done at your doorstep</p>
                <form method="GET" autocomplete = "off">
                    <input type="text" id="searchInput" placeholder="Search for services" oninput="showServices(this.value)">
                    <button type="submit">Search</button>
                </form>
                <div id="servicesDropdown"></div>
            </div>
        </div>
    </section>

    <script>
        // List of available services (you can modify this as per your requirements)
        const services = [
            "Plumbing",
            "Electrical",
            "Gardening",
            "Cleaning",
            "Painting",
            "Carpentry"
        ];

        function showServices(searchText) {
            const dropdown = document.getElementById("servicesDropdown");
            dropdown.innerHTML = "";

            if (searchText.trim() === "") {
                return;
            }

            const matchingServices = services.filter(service =>
                service.toLowerCase().includes(searchText.toLowerCase())
            );

            if (matchingServices.length === 0) {
                const noResultsOption = document.createElement("div");
                noResultsOption.textContent = "No matching services found";
                dropdown.appendChild(noResultsOption);
            } else {
                matchingServices.forEach(service => {
                    const option = document.createElement("div");
                    option.textContent = service;
                    option.addEventListener("click", function() {
                        document.getElementById("searchInput").value = service;
                        dropdown.innerHTML = "";
                    });
                    dropdown.appendChild(option);
                });
            }
        }
    </script>
</body>
</html>
