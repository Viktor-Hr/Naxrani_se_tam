<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахрани се там - Вкусно!</title>
    <link rel="stylesheet" href="MainPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>
    <div class="square">
        <div class="button"><a href="index.html" class="button-link">Начало</a></div>
        <div class="button2"><a href="rec-res.php" class="button-link">Предложи</a></div>
        <div class="button3"><a href="AboutUsPage.html" class="button-link">За нас</a></div>
        <div class="button4">
            <div class="dropdown">
                <button class="button-menu">Профил</button>
                <div class="button-dropdown">
                    <a href="LoginPage.php">Влизане</a>
                    <a href="Sign_up.php">Регистриране</a>
                    <a href="logout.php">Излизане</a>
                </div>
            </div>
        </div>
    </div>

    <div class="rectangle"></div>
    <div class="menuSquare">
        <div id="restaurant-info">
            <h2 id="res-name"></h2>
            <p><strong>Меню:</strong> <span id="res-menu"></span></p>
            <p><strong>Адрес:</strong> <span id="res-address"></span></p>
            <p><strong>Телефон:</strong> <span id="res-phone"></span></p>
        </div>
        <div class="menuLine"></div>
        <div class="menuSquare2"></div>
        <div class="textForSquare">Меню</div>
        <div class="textForSquare2">Все още не е избрано заведение</div>
    </div>

    <div class="reviewSquare">
        <div class="reviewLine"></div>
        <div class="reviewSquare2"></div>
        <div class="textForSquareReview">Оценки</div>
    </div>


    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var selectedRestaurantId = null;

        var ResIcon = L.icon({
            iconUrl: 'Resicon.png',
            iconSize: [30, 45],
        });

        document.addEventListener("DOMContentLoaded", function () {
            var map = L.map('map').setView([43.215, 27.907], 14);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            fetch('get-data.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(restaurant => {
                        if (restaurant.ver === 'yes-var') {
                            var marker = L.marker([restaurant.latitude, restaurant.longitude], { icon: ResIcon }).addTo(map);

                            marker.on('click', function () {
                                selectedRestaurantId = restaurant.id;
                                document.getElementById("restaurant-info").style.display = "block";
                                document.getElementById("res-name").innerText = restaurant.name;
                                document.getElementById("res-menu").innerText = restaurant.menu;
                                document.getElementById("res-address").innerText = restaurant.address;
                                document.getElementById("res-phone").innerText = restaurant.phone;
                                

                             
                            });
                        }
                    });
                })
                .catch(error => console.error('Error fetching restaurant data:', error));

         
        });

       
    </script>
</body>
</html>
