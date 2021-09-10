<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Akastra | Checktool</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

        .bold {
            font-weight: bold;
        }

        .poppins {
            font-family: 'Poppins', sans-serif;
        }


        .btn-success {
            background-color: #A8E7E9;
            border: none;
            color: #2e2e2e;
        }

        .btn-success:hover {
            background-color: #2f6c6e;
            border: none;
            color: white;
        }


        .btn-primary {
            background-color: #00A19D;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0a4543;
            border: none;
            color: white;
        }


        .btn-danger {
            background-color: #fc3a28;
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #8a2016;
            border: none;
            color: white;
        }
    </style>
    <?= $this->renderSection('content'); ?>




    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>