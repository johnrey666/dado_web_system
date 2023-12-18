@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>

    
<div class="container">
    <!-- Paragraph -->
    <div class="paragraph" id="paragraph">
        <p>Welcome to <b style="color: #00563f;">"Beyond The Zoo"</b> Your Gateway to a Sustainable World!<br>
        At Beyond The Zoo, we invite you to embark on a journey that transcends the ordinary, a journey that delves deep into the heart of our planet's remarkable biodiversity. Our mission is simple yet profound: to promote and celebrate Life on Land, aligning with the United Nations Sustainable Development Goal (SDG) 15.

        In a world where urbanization and industrialization often threaten the delicate balance of ecosystems, SDG 15 calls upon us to safeguard and restore life on land, ensuring its vitality for generations to come. Our platform is dedicated to spreading awareness, knowledge, and action, inspiring individuals and communities to become stewards of the Earth's terrestrial habitats.

        Join us as we explore the wonders of our planet's diverse landscapes, from lush rainforests to arid deserts, and from the depths of the oceans to the highest peaks of our mountains. Through captivating stories, informative articles, and breathtaking visuals, we aim to foster a deep connection between humanity and the natural world.

        Beyond The Zoo is more than just a webpage; it's a call to action. Together, we can learn, engage, and work towards a sustainable future where life on land thrives. Let's embark on this incredible journey and be the change-makers our planet needs. Welcome to Beyond The Zoo – where we go beyond boundaries to preserve the extraordinary beauty and biodiversity of Life on Land.</p>
    </div>

    <!-- Carousel -->
    <div class="carousel-container" id="carousel">
        <div class="carousel">
            <div class="carousel-slide show">
                <img src="{{ asset('images/tig.jpg') }}" class="imeyg" alt="koala">
            </div>

            <div class="carousel-slide">
                <img src="{{ asset('images/4.jpg') }}" class="imeyg" alt="panda">
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('images/2.jpg') }}" class="imeyg" alt="birdie">
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('images/3.jpg') }}" class="imeyg" alt="monkey">
            </div>
        </div>
    </div>
</div>
<div class="bottom">
    <div id="charts" class="chart">
        <canvas id="myChart1"></canvas>
    </div>
    <div class="chart">
        <canvas id="myChart2"></canvas>
    </div>
</div>
<div class="foot">
    <div class="about">
        <p>About | Help | Contacts</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("paragraph").style.marginLeft = "150px";
        document.getElementById("carousel").style.marginLeft = "200px";
        document.getElementById("charts").style.marginLeft = "200px";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("paragraph").style.marginLeft = "-150px";
        document.getElementById("carousel").style.marginLeft = "0";
        document.getElementById("charts").style.marginLeft = "0";
    }

    $(document).ready(function () {
        let currentIndex = 0;
        const slides = $(".carousel-slide");

        function showSlide(index) {
            slides.removeClass("show");
            slides.eq(index).addClass("show");
        }

        // Automatically change images every 3 seconds
        setInterval(function () {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }, 3000);

        showSlide(currentIndex);
    });

    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Mammals', 'Reptiles', 'Amphibians'],
            datasets: [{
                label: 'Animal Type',
                data: [12, 19, 3],
                backgroundColor: [
                    'red',
                    'blue',
                    'yellow'
                ]
            }]
        },
    });

    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                label: 'Registered User',
                data: [8, 12, 6, 10],
                backgroundColor: [
                    'yellow',
                    'green',
                    'purple',
                    'orange'
                ]
            }]
        }
    });
</script>
</body>
</html>
@endsection
