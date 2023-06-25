<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php include 'navbar.php';?>
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
                <img src="https://img.icons8.com/?size=512&id=e0lg1cVldtzN&format=png" alt="plumbing" width="100px">
            </div>
            <div class="service_card_content">
                <h3>Plumbing</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="https://img.icons8.com/?size=512&id=e0lg1cVldtzN&format=png" alt="plumbing" width="100px">
            </div>
            <div class="service_card_content">
                <h3>IT Support</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="https://img.icons8.com/?size=512&id=YEMMaJDfhuNq&format=png" alt="plumbing" width="100px">
            </div>
            <div class="service_card_content">
                <h3>Lawyer</h3>
            </div>
            </div>  

            <div class="service_card">
            <div class="service_card_img">
                <img src="https://img.icons8.com/?size=512&id=HXbUbBAE8GrT&format=png" alt="plumbing" width="100px">
            </div>
            <div class="service_card_content">
                <h3>Doctor</h3>
            </div>
            </div>    
        </div>
        </div>

        <div class="popular_services">
            <h2>Popular Services</h2>
            <p>Choose from a wide range of services</p>
            
            <div class="popular_service_container">
            <div class="popular_service_card">
                    <img src="https://images.unsplash.com/photo-1655634584250-9e4650ed4170?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="ai artist" class="popular_service_bg">
                    <div class="popular_service_card_content">
                        <h4>Hire AI talent</h4>
                        <h2>AI Artist</h2>
                    </div>
                </div>

                <div class="popular_service_card">
                    <img src="https://images.unsplash.com/photo-1655634584250-9e4650ed4170?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="ai artist" class="popular_service_bg">
                    <div class="popular_service_card_content">
                        <h4>Hire AI talent</h4>
                        <h2>AI Artist</h2>
                    </div>
                </div>

                <div class="popular_service_card">
                    <img src="https://images.unsplash.com/photo-1655634584250-9e4650ed4170?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="ai artist" class="popular_service_bg">
                    <div class="popular_service_card_content">
                        <h4>Hire AI talent</h4>
                        <h2>AI Artist</h2>
                    </div>
                </div>

                <div class="popular_service_card">
                    <img src="https://images.unsplash.com/photo-1655634584250-9e4650ed4170?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="ai artist" class="popular_service_bg">
                    <div class="popular_service_card_content">
                        <h4>Hire AI talent</h4>
                        <h2>AI Artist</h2>
                    </div>
                </div>

                <div class="popular_service_card">
                    <img src="https://images.unsplash.com/photo-1655634584250-9e4650ed4170?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="ai artist" class="popular_service_bg">
                    <div class="popular_service_card_content">
                        <h4>Hire AI talent</h4>
                        <h2>AI Artist</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="referral_container">
            <div class="referral_content">
                <h2>Refer a friend</h2>
                <p>Refer a friend and get 10% off on your next order</p>

                <button class="btn">Refer now</button>
            </div>
            <div class="referral_img_container">
                <img src="https://fiverr-res.cloudinary.com/q_auto,f_auto,w_870,dpr_1.0/v1/attachments/generic_asset/asset/d9c17ceebda44764b591a8074a898e63-1599597624757/business-desktop-870-x1.png" alt="" width="90%">
            </div>
        </div>

        <?php include 'chatbot.php' ?>
        <?php include 'footer.html' ?>

<script src="./js/home.js"></script>
</body>
</html>
