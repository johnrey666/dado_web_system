@extends('layouts.master')

@section('content')


<body style="background-image: url('https://c.wallhere.com/photos/91/bd/nature-35567.jpg!d'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;"><br>
<div class="image-section">
    <div class="image-list" id="papamo">
    @foreach ($animals as $animal)
    <div class="image-content" onclick="openModal(this)"
         data-id="{{ $animal->id }}"
         data-name="{{ $animal->name }}"
         data-type="{{ $animal->type }}"
         data-habitat="{{ $animal->habitat }}"
         data-description=" {{ $animal->description }}"
         data-image="{{ url('images/' . $animal->image) }}">
        <img src="{{ url('images/' . $animal->image) }}" class="imeyg2" style="width: 300px; border: 1px solid wheat;"><br><br>

        <!-- Display the "Delete" and "Edit" buttons only for admin users -->
        @if (Auth::user()->role == 'admin')
            <div style="display: flex;">
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>&nbsp;
                </form>
                <button type="submit" class="btn btn-success" onclick="openEditModal(event, this.parentElement.parentElement)">Edit</button>
            </div>
        @endif
    </div>
@endforeach
    </div>
</div>

<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content" style="text-align: center; max-width: 600px; max-height: 1000px;  margin: auto; padding: 20px;">
        <img id="modalImage" src="" alt="Animal Image" style="height:200px; width: 300px;">
        <h2 id="modalName">Animal Name:</h2>
        <h4 id="modalType">Type:</h4>
        <h4 id="modalHabitat">Habitat:</h4>
        <h4 id="modalDescription">Description:</h4>
    </div>
</div>

<div id="editModal" class="modal">
    <span class="close" onclick="closeEditModal()">&times;</span>
    <form id="editForm" class="modal-content" style="text-align: center; max-width: 600px; max-height: 100vh; overflow-y: auto; padding: 20px; margin: auto;" action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img id="editModalImage" src="" alt="Animal Image" style="height:150px; width: 200px;">
        <input type="file" id="editModalImageInput" name="image" onchange="previewImage(event)">

        <label for="editModalName">Animal Name:</label>
        <input id="editModalName" name="name" type="text">
        <label for="editModalType">Type:</label>
        <input id="editModalType" name="type" type="text">
        <label for="editModalHabitat">Habitat:</label>
        <input id="editModalHabitat" name="habitat" type="text">
        <label for="editModalDescription">Description:</label>
        <textarea id="editModalDescription" name="description"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
<script>

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('editModalImage');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function openModal(divElement) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modalImage");
    var modalName = document.getElementById("modalName");
    var modalType = document.getElementById("modalType");
    var modalHabitat = document.getElementById("modalHabitat");
    var modalDescription = document.getElementById("modalDescription");

    modal.style.display = "block";
    modalImg.src = divElement.dataset.image;
    modalName.textContent = ' ' + divElement.dataset.name;
    modalType.textContent = 'Type: ' + divElement.dataset.type;
    modalHabitat.textContent = 'Habitat: ' + divElement.dataset.habitat;
    modalDescription.textContent = 'Description: ' + divElement.dataset.description;
}

function openEditModal(event, divElement) {
    event.stopPropagation();  // Add this line

    var modal = document.getElementById("editModal");
    var modalForm = document.getElementById("editForm");
    var modalImg = document.getElementById("editModalImage");
    var modalName = document.getElementById("editModalName");
    var modalType = document.getElementById("editModalType");
    var modalHabitat = document.getElementById("editModalHabitat");
    var modalDescription = document.getElementById("editModalDescription");

    modal.style.display = "block";
    modalForm.action = '/animals/' + divElement.dataset.id;
    modalImg.src = divElement.dataset.image;
    modalName.value = divElement.dataset.name;
    modalType.value = divElement.dataset.type;
    modalHabitat.value = divElement.dataset.habitat;
    modalDescription.value = divElement.dataset.description;
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function closeEditModal() {
    var modal = document.getElementById("editModal");
    modal.style.display = "none";
}
</script>  
@stop