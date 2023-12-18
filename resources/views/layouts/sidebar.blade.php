<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        h1 {
            display: block;
            text-align: center;
            margin-top: -50px;
            font-family: Serif;
            color: #004225;
        }

        .w3-teal {
            background: linear-gradient(to right, #4a7d2e, #317e3e, #3e9c62, #44bd78);

        }

        .w3-teal-closed {
            background: linear-gradient(to right, #4a7d2e, #317e3e, #3e9c62, #44bd78);

        }




    </style>
    <title>Document</title>
</head>
<body>
        <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
            <button onclick="w3_close()" class="w3-bar-item w3-large">☰ </button>
            <div class="w3-bar-item w3-right">
                <input class="w3-input" type="text" placeholder="Search">
            </div>
            <a href="home" class="w3-bar-item w3-button">Home</a>
            <a href="list" class="w3-bar-item w3-button">List Of Animals</a>
            <a href="add" class="w3-bar-item w3-button">Add Species</a>
            <a href="#" class="w3-bar-item w3-button">Charts</a>
            <a href="logout" class="w3-bar-item w3-button" style="position: absolute; bottom: 10px;">Logout</a>
        </div>

        <!-- Page Content -->
        <div class="w3-teal">
            <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
            <h1>BEYOND THE ZOO</h1>
        </div>
</body>

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
</html>
