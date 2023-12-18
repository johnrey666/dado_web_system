<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>@yield('title', 'My App')</title>
    <style>

        .form-container {
            max-width: 60%;
            margin: 0 auto;
            padding: 10px 40px 40px 40px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }


        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

       
        input[type="file"],
        textarea {
            width: 30%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            height: 45px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            height: 40px;
        }

     
        button[type="submit"] {
            border: 1px solid green;
            color: green;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
            color: #fff;
        }

        .imeyg2 {
            width: 220px;
            height: 250px;
            border-radius: 5%;
        }

        .image-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            transition: margin-left 0.5s;
        }

        .image-content {
            margin: 3%;
            position: relative;
            cursor: pointer;
        }

        .imeyg2:hover {
            transform: scale(1.05); 
        }

     
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            border-radius: 10px;
            margin: auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
            background-color: white; 
            padding: 40px; 
        }

        .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

    
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .imeyg {
            width: 100%;
            height: 100vh;
            opacity: 0.9;
        }



        p {
            font-family: cursive;
            color: #ffe;
        }

        .container {
            display: flex;
            justify-content: start;
            padding-left: 250px;
        }

        .paragraph {
            color: #fff;
            width: 45%;
            padding: 20px;
            margin-top: 8%;
            margin-left: -15%;
            margin-right: 0%;
            transition: margin-left 0.5s; 
        }

        .carousel-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
            transition: margin-left 1.5s;
        }

        .carousel {
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .carousel-slide {
            position: absolute;
            display: none;
            width: 100%;
            height: 100vh;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-slide.show {
            display: block;
            opacity: 1;
        }

        h1 {
            display: block;
            text-align: center;
            margin-bottom:200%;
            font-family: Serif;
            color: #004225;
        }

        .bottom {
            display: flex;
            justify-content: center;
            margin-top: 10%;
        }
        .charts {
            width: 100%;
        }
        .chart {
            width: 42%;
        }
        .foot {
            background-color: #abc1b0;
            height: 7vh;
            width: 100%;
            position: absolute;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .w3-sidebar {
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        .w3-sidebar .w3-bar-item.w3-right {
            margin-top: 20px;
        }

        .w3-teal {
            background: linear-gradient(to right, #4a7d2e, #317e3e, #3e9c62, #44bd78);
            transition: margin-right 0.5s;
            height: 7vh;
            
        }

        .w3-teal-open {
            background: linear-gradient(to right, #4a7d2e, #317e3e, #3e9c62, #44bd78);
            transition: margin-right 0.5s;
        }

        .w3-teal-closed {
            background: linear-gradient(to right, #4a7d2e, #317e3e, #3e9c62, #44bd78);
        }


    </style>

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("papamo").style.marginLeft = "175px";
            document.getElementById("forme").style.marginLeft = "175px";
            document.querySelector(".w3-teal").classList.remove("w3-teal-closed");
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("papamo").style.marginLeft = "0";
            document.getElementById("forme").style.marginLeft = "0";
            document.querySelector(".w3-teal").classList.add("w3-teal-closed");
        }
    </script>
</head>
<body>
    
    
    <!-- Page Content -->
    <div class="w3-teal" style="position: fixed; width: 100%; z-index: 1;">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
        <h1 style="margin-top:-50px">BEYOND THE ZOO</h1>
    </div>

    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">☰ </button>
        <div class="w3-bar-item w3-right">
            <input class="w3-input" type="text" placeholder="Search">
        </div>
        <a href="{{ Auth::user()->role == 'admin' ? route('admin') : route('home') }}" class="w3-bar-item w3-button">Home</a>        <a href="list" class="w3-bar-item w3-button">List Of Animals</a>
        <a href="add" class="w3-bar-item w3-button">Add Species</a>
        <a href="#" class="w3-bar-item w3-button">Charts</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w3-bar-item w3-button" style="bottom: 10px; color:gray">Logout</button>
        </form>
        <a href="#" class="w3-bar-item w3-button">{{ Auth::user()->name }}</a>
    </div>
    @yield('content')
</body>
</html>
