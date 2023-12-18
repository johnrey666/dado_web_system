@extends('layouts.master')

@section('title', 'Insert')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title></title>
    
</head>

<body style="background-image: url('https://c.wallhere.com/photos/91/bd/nature-35567.jpg!d'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;"><br><br><br>

    <div class="form-container">
        <h2>Animal Information Form</h2><hr>
            <form action="{{ route('animals.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="animal-image">Animal Image:</label>
                    <input type="file" name="animal_image" id="animal-image" accept="image/*" required>
                </div>  

                <div>
                    <label for="animal-name">Animal Name:</label>
                    <input type="text" name="animal-name" id="animal-name" required>
                </div>

                <div>
                    <label for="animal-type">Type:</label>
                    <input type="text" name="animal-type" id="animal-type" required>
                </div>

                <div>
                    <label for="animal-habitat">Habitat:</label>
                    <input type="text" name="animal-habitat" id="animal-habitat" required>
                </div>

                <div>
                    <label for="animal-description">Description:</label>
                    <textarea name="animal-description" id="animal-description" rows="4" required></textarea>
                </div>

                <div>
                    <br>
                    <button type="submit">Submit</button>
                </div>
            </form>
    </div>
</body>

</html>
@endsection
