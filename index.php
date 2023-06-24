<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
        <div class="home_bg">
            <div class="home_bg_overlay"></div>
            <div class="home_content">
                <h2>Services on demand</h2>
                <p>Get your services done at your doorstep</p>
                <form method="GET" autocomplete = "off">
                    <input type="text" id="searchInput" placeholder="Search for services" name = "service" oninput="showServices(this.value)">
                    <button type="submit">Search</button>
                </form>
                <div id="servicesDropdown"></div>
            </div>
        </div>

        <div class="services_container">
        <h2>Services</h2>
        <p>Choose from a wide range of services</p>
        <div class="service_card_container">
        <div class="service_card">  

            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="./assets/lawyer.png" alt="plumbing">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  
        </div>
        
        </div>

<script src="./js/home.js"></script>
</body>
</html>
