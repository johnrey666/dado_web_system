@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
.container .image-section .image-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the items horizontally */
    margin-left: 0; /* Remove the left padding */
}

.container .image-section .image-list .image-content {
    width: 400px;
    height: 400px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center the content inside each item */
}

.container .image-section .image-list .image-content img {
    width: 100px;
    height: auto;
}

.container .image-section .image-list .image-content h3 {
    font-size: 18px;
    margin: 0;
}

.container .image-section .image-list .image-content p {
    font-size: 14px;
    margin: 0;
}

.container .image-section .image-list .image-content .buttons {
    display: flex;
    margin-top: 10px; /* Move the buttons below the content */
}

    </style>
</head>
<body style="background-image: url('https://c.wallhere.com/photos/91/bd/nature-35567.jpg!d'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;"><br>

<div class="container" style="margin-left: -150px;">
    <!-- Carousel -->
    <div class="carousel-container" id="carousel">

    </div>


    <div class="image-section" style="display: flex; flex-wrap: wrap; margin-top: 50px;">
    @foreach ($pendingAnimals as $pendingAnimal)
        <div class="image-content" onclick="openPendingModal(this)"
            data-id="{{ $pendingAnimal->id }}"
            data-name="{{ $pendingAnimal->name }}"
            data-type="{{ $pendingAnimal->type }}"
            data-habitat="{{ $pendingAnimal->habitat }}"
            data-description=" {{ $pendingAnimal->description }}"
            data-image="{{ url('images/' . $pendingAnimal->image) }}"
            style="width: calc(33.33% - 20px); margin: 10px;">  <!-- Add these styles -->
            <img src="{{ url('images/' . $pendingAnimal->image) }}" class="imeyg2" style="width: 400px; height: 250px; border: 1px solid wheat;"><br><br>
            <div class="buttons" style="display: flex; justify-content: center;">
                <form action="{{ route('admin.accept', $pendingAnimal->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="accept button">Accept</button>&nbsp;
                </form>
                <form action="{{ route('admin.decline', $pendingAnimal->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="decline button">Decline</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
    
<div id="pendingModal" class="modal" style="z-index: 10000;">
<br><br><br>
    <span class="close" onclick="closePendingModal()" style="position: absolute; top: 40px; right: 30px; font-size: 30px; cursor: pointer;">&times;</span>
    <div class="modal-content" style="text-align: center; max-width: 600px; max-height: 1000px;  margin: auto; padding: 20px;">
        <img id="pendingModalImage" src="" alt="Animal Image" style="height:200px; width: 300px;">
        <h2 id="pendingModalName">Animal Name:</h2>
        <h4 id="pendingModalType">Type:</h4>
        <h4 id="pendingModalHabitat">Habitat:</h4>
        <h4 id="pendingModalDescription">Description:</h4>
    </div>
</div>
</div>
    </div>

</div>

<!-- Add this section below your existing code -->
<div class="user-section" style="width: 80%; margin: 0 auto; border: 1px solid wheat; padding: 20px; border-radius: 10px; background-color: white;">

    <table style="width: 100%; border-collapse: collapse; margin-top: 40px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 8px;">User</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Animal</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Image</th>  <!-- Add this line -->
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->animals as $animal)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $animal->name }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <img src="{{ url('images/' . $animal->image) }}" alt="{{ $animal->name }}" style="width: 50px; height: auto;">  <!-- Add this line -->
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
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

    function openPendingModal(divElement) {
    var modal = document.getElementById("pendingModal");
    var modalImg = document.getElementById("pendingModalImage");
    var modalName = document.getElementById("pendingModalName");
    var modalType = document.getElementById("pendingModalType");
    var modalHabitat = document.getElementById("pendingModalHabitat");
    var modalDescription = document.getElementById("pendingModalDescription");

    modal.style.display = "block";
    modalImg.src = divElement.dataset.image;
    modalName.textContent = ' ' + divElement.dataset.name;
    modalType.textContent = 'Type: ' + divElement.dataset.type;
    modalHabitat.textContent = 'Habitat: ' + divElement.dataset.habitat;
    modalDescription.textContent = 'Description: ' + divElement.dataset.description;
}

function closePendingModal() {
    var modal = document.getElementById("pendingModal");
    modal.style.display = "none";
}


</script>
</body>
</html>
@endsection
