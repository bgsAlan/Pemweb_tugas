<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5 col-lg-4">

                <div class="card shadow">
                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">Login</h2>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($error); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/pemweb_tugas/controller/login_controller.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Masuk
                            </button>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>