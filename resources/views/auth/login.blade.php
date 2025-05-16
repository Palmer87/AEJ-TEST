<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #24a154 0%, #df8f1f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .bg-glass {
            background-color: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
            border-color: #667eea;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            overflow: hidden;
        }
        .btn-primary {
            background-color: #667eea;
            border-color: #667eea;
        }
        .btn-outline-primary {
            color: #667eea;
            border-color: #667eea;
        }
        .btn-outline-primary:hover {
            background-color: #667eea;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-glass">
                    <div class="card-body p-5 text-center">
                        <!-- Logo -->
                        <div class="mb-4">
                            <i class="fas fa-user-circle fa-4x text-primary"></i>
                        </div>

                        <h3 class="mb-4 fw-bold">Connectez-vous</h3>

                        <!-- Formulaire -->
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <!-- Email -->
                            <div class="form-floating mb-4">
                                <input type="email" id="email"  name="email" class="form-control form-control-lg" placeholder="Adresse email">
                                <label for="email">Adresse email</label>
                            </div>

                            <!-- Mot de passe -->
                            <div class="form-floating mb-4">
                                <input type="password" id="password"  name="password" class="form-control form-control-lg" placeholder="Mot de passe">
                                <label for="password">Mot de passe</label>
                            </div>

                            <!-- Remember me -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label ms-2" for="remember">Se souvenir de moi</label>
                            </div>

                            <!-- Bouton de connexion -->
                            <button class="btn btn-primary btn-lg btn-block px-5 mb-3" type="submit">
                                Connexion <i class="fas fa-sign-in-alt ms-2"></i>
                            </button>

                            <!-- Lien mot de passe oublié -->
                            <a class="small text-muted" href="#">
                                Mot de passe oublié ?
                            </a>

                            <!-- Séparateur -->
                            <div class="d-flex align-items-center my-4">
                                <div class="border-bottom flex-grow-1"></div>
                                <div class="px-3 text-muted">OU</div>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>

                            <!-- Bouton inscription -->
                            <button class="btn btn-outline-primary btn-lg btn-block px-5 mb-3" type="button">
                                <a href="{{route('register')}}" class="text-decoration-none text-primary">
                                Inscription <i class="fas fa-user-plus ms-2"></i>
                            </button>
                        </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
