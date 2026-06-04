<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f7fb;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #212529;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 14px 18px;
            display: block;
            border-radius: 10px;
            margin-bottom: 5px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0d6efd;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .card-box {
            border: none;
            border-radius: 18px;
        }

        @media(max-width: 992px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <button class="btn btn-dark d-lg-none m-3"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#sidebarMenu">
        <i class="bi bi-list"></i>
    </button>
</body>