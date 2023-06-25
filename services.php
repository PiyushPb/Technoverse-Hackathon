<!DOCTYPE html>
<html>
<head>
    <title>Services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        #searchBar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Services</h1>
        <input type="text" id="searchBar" class="form-control" placeholder="Search">
        <div id="cardsContainer" class="row"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch all services data from PHP
            <?php
            include 'conn.php';
            $query = "SELECT * FROM services";
            $result = mysqli_query($conn, $query);
            $servicesData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_close($conn);
            ?>

            // Initial data rendering
            renderCards(<?php echo json_encode($servicesData); ?>);

            // Search functionality
            $('#searchBar').on('input', function() {
                var searchValue = $(this).val().toLowerCase();
                var filteredData = <?php echo json_encode($servicesData); ?>.filter(function(service) {
                    return service.provider_name.toLowerCase().includes(searchValue) ||
                        service.details.toLowerCase().includes(searchValue) ||
                        service.location.toLowerCase().includes(searchValue) ||
                        service.contact_number.toLowerCase().includes(searchValue) ||
                        service.email.toLowerCase().includes(searchValue) ||
                        service.website.toLowerCase().includes(searchValue);
                });

                renderCards(filteredData);
            });

            // Function to render cards dynamically
            function renderCards(data) {
                var cardsContainer = $('#cardsContainer');
                cardsContainer.empty();

                data.forEach(function(service) {
                    var cardHtml = `
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="https://images.unsplash.com/photo-1567954970774-58d6aa6c50dc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">${service.provider_name}</h5>
                                    <p class="card-text">${service.details}</p>
                                    <p class="card-text">Location: ${service.location}</p>
                                    <p class="card-text">Contact: ${service.contact_number}</p>
                                    <p class="card-text">Email: ${service.email}</p>
                                    <p class="card-text">Website: ${service.website}</p>
                                    <p class="card-text">Rating: ${service.rating}</p>
                                    <p class="card-text">Price: ${service.price}</p>
                                    <p class="card-text">Start Date: ${service.start_date}</p>
                                    <p class="card-text">End Date: ${service.end_date}</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <br>
                        </div>
                    `;

                    cardsContainer.append(cardHtml);
                });
            }
        });
    </script>
</body>
</html>
