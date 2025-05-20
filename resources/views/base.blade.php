<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --dark-color: #5a5c69;
        }

        body {
            background-color: var(--secondary-color);
            overflow-x: hidden;
        }

        /* Sidebar */
        #sidebar {
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            background: var(--primary-color);
            transition: all 0.3s;
            z-index: 1000;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 12px 20px;
            font-size: 1.1em;
            display: block;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar ul li a:hover {
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        #sidebar ul li.active>a {
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        /* Active sidebar (responsive) */
        #sidebar.active {
            margin-left: 0;
        }

        #content.active {
            margin-left: 250px;
            width: calc(100% - 250px);
        }


        /* Navbar */
        #content {
            width: calc(100% - 250px);
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        .navbar {
            background: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .stat-card {
            border-left: 0.25rem solid;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.primary {
            border-left-color: var(--primary-color);
        }

        .stat-card.success {
            border-left-color: #1cc88a;
        }

        .stat-card.warning {
            border-left-color: #f6c23e;
        }

        .stat-card.danger {
            border-left-color: #e74a3b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #content {
                width: 100%;
                margin-left: 0;
            }

            #sidebar.active {
                margin-left: 0;
            }
        }
    </style>
  @notifyCss
</head>
=======
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>(@yield('title'))</title>
 @notifyCss
</head>
<body>
    <nav class="bg-dark p-4 " style="display: flex; justify-content: space-between;">
        <ul>
            <li>
                <a href="/" class="text-white">Home</a>
            </li>
        </ul>
        @if (Auth::check())
        <ul>
            <li>
                <a href="{{ route('promoteur.dashboard') }}" class="text-white">Dashboard</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="text-white"><box-icon type='solid' color="white" name='log-out'></box-icon></button>
                </form>
            </li>
        </ul>
        @else
        <ul>
            <li>
                <a href="{{ route('login') }}" class="text-white"><box-icon type='solid' color="white" name='user-circle'></box-icon></a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="text-white"><box-icon type='solid' color="white" name='user-plus'></box-icon></a>
            </li>
        </ul>
        @endif
    </nav>
    <div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @yield('content')
    </div>
>>>>>>> ac97c10 (refactor:Améliore la création de gestionnaires en utilisant directement la méthode create dans le modèle, simplifiant ainsi le processus et améliorant la lisibilité du code.)

<body>
    <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header text-center py-4">
                    <h4 class="text-white">{{ auth()->user()->role }}</h4>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#"><i class="fas fa-fw fa-tachometer-alt me-2"></i> Tableau de bord</a>
                    </li>
                    @if (auth()->user()->role == 'admin')
                    <li>
                       <a href="#"><i class="fas fa-fw fa-users me-2"></i> Utilisateurs</a>
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-fw fa-chart-bar me-2"></i> Statistiques</a>
                    </li>
                    @endif

                    <li>
                        <a href="#"> <i class="fa-solid fa-briefcase me-2"></i></i>Projet</a>
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-fw fa-cog me-2"></i> Paramètres</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content -->
            <div id="content">
                <!-- Navbar -->
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light py-3">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fas fa-align-left"></i>
                        </button>

                        <div class="dropdown ms-auto">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/30" class="rounded-circle me-2" alt="Profile">
                                <span class="d-none d-lg-inline">{{ auth()->user()->role }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Se déconnecter</button>
                                        </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <x-notify::notify />



            @yield('content')
        </div>

        <!-- jQuery -->
    </div>
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Toggle sidebar
            document.getElementById('sidebarCollapse').addEventListener('click', function () {
                document.getElementById('sidebar').classList.toggle('active');
                document.getElementById('content').classList.toggle('active');
            });
        </script>
    @notifyJs
</body>
<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
=======

>>>>>>> ac97c10 (refactor:Améliore la création de gestionnaires en utilisant directement la méthode create dans le modèle, simplifiant ainsi le processus et améliorant la lisibilité du code.)
</html>








