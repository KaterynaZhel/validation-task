<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <style>
        .container {
            margin-top: 20px;
        }

        .container-index {
            margin-top: 60px;
        }

        .import-button,
        .index-button {
            background-color: lightgray;
            color: darkblue;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
        }

        .import-button:hover,
        .index-button {
            background-color: lightblue;
        }


        .validate-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .validate-button:hover {
            background-color: darkred;
        }

        .error-message {
            display: inline-block;
            border: 3px solid red;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-top: 40px;
        }

        .error-message li {
            color: black;
            list-style-type: none;
        }

        .error-message li::before {
            content: "\2022";
            color: red;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    </style>
</head>

<body>

    <div class="container ">
        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv">
            <button type="submit" class="import-button">import CSV without custom validation</button>
        </form>
    </div>

    <div class="container">
        <form action="{{ url('validation') }}" method="POST" enctype="multipart/form-data" class="validate-form">
            @csrf
            <input type="file" name="file1" accept=".csv">
            <button type="submit" class="validate-button">validation</button>
        </form>

        @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="error-dot">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="container-index">
        <a href="{{ route('games.index') }}" class="index-button">view table "Games"</a>
    </div>


</body>

</html>