<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Liste des messages</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des messages</h2>

        @if($forms->isEmpty())
            <p>Aucun formulaire à afficher.</p>
        @else
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Nom & Prénoms</th>
                        <th>Numéro</th>
                        <th>Pièce Jointe</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($forms as $form)
                        <tr>
                            <td>{{ $form->name }}</td>
                            <td>{{ $form->number }}</td>
                            <td>{{ $form->joint_piece }}</td>
                            <td>{{ $form->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
