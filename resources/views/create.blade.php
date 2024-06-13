<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Whatsapp Cloud API</title>
</head>
<body>

    <br>

        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nom & Prénoms:</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>

        <br>

        <div class="form-group">
            <label for="number">Numéro:</label>
            <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}" required>
        </div>

        <br>

        <div class="form-group">
            <label for="joint_piece">Ajouter un fichier</label>
            <input id="joint_piece" type="file" class="form-control-file" name="joint_piece"
                value="{{ old('joint_piece') }}" accept="image/*">
        </div>

        <br>


        <button type="submit" class="btn btn-info">Soumettre</button>
    </form>

</body>
</html>
