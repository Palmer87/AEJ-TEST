<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{auth()->user()->role}} Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 CSS -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 4 CSS -->


    <style>
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .table thead {
            background-color: #0d6efd;
            color: white;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
        }

        .status-validé {
            background-color: #198754;
            color: white;
        }

        .status-rejeté {
            background-color: #dc3545;
            color: white;
        }

        .status-attente {
            background-color: #ffc107;
            color: black;
        }

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

<body>
    <x-notify::notify />

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header text-center py-4">
                <h4 class="text-white">{{ auth()->user()->role }}</h4>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#"><i class="fas fa-fw fa-tachometer-alt me-2"></i> Tableau de bord</a>
                </li>
                @if (auth()->user()->role == 'admin'|| auth()->user()->role == 'gestionnaire')
                    <li>
                        <a href="#"><i class="fas fa-fw fa-users me-2"></i> Utilisateurs</a>
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-fw fa-chart-bar me-2"></i> Statistiques</a>
                    </li>
                @endif

                <li>
                    <a href='{{route('admin.projets.index')}}'> <i class="fa-solid fa-briefcase me-2"></i></i>Projet</a>
                </li>

                <li>
                    <a href="#"><i class="fas fa-fw fa-cog me-2"></i> Paramètres</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn "
                        style="background-color: rgb(16, 83, 199);color:#f8f9fc">
                        <i class="fas fa-align-left"></i>
                    </button>


                    <div class="dropdown ms-auto">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/30" class="rounded-circle me-2" alt="Profile">
                            <span class="d-none d-lg-inline">{{ auth()->user()->role }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}"><i
                                        class="fas fa-user me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="fas fa-sign-out-alt me-2"></i>Se déconnecter</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>





            @yield('content')

        </div>

        <!-- jQuery -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>
        // Toggle sidebar
        document.getElementById('sidebarCollapse').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });
    </script>
    <script>
    // Place this in your base.blade.php or a dedicated JS file

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const projectTable = document.getElementById('projectTable');

    if (searchInput && projectTable) {
        searchInput.addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = projectTable.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        });
    }

    if (statusFilter && projectTable) {
        statusFilter.addEventListener('change', function () {
            let value = this.value.toLowerCase();
            let rows = projectTable.querySelectorAll('tbody tr');
            rows.forEach(row => {
                let status = row.cells[4].textContent.trim().toLowerCase();
                row.style.display = value === "" || status.includes(value) ? '' : 'none';
            });
        });
    }

    window.sortTable = function(columnIndex) {
        if (!projectTable) return;
        let switching = true;
        let dir = "asc";
        let switchCount = 0;
        while (switching) {
            switching = false;
            let rows = projectTable.rows;
            for (let i = 1; i < rows.length - 1; i++) {
                let shouldSwitch = false;
                let x = rows[i].getElementsByTagName("TD")[columnIndex];
                let y = rows[i + 1].getElementsByTagName("TD")[columnIndex];
                if (!x || !y) continue;
                if (dir === "asc" ? x.textContent > y.textContent : x.textContent < y.textContent) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchCount++;
            } else if (switchCount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
});</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('projectStatusChart').getContext('2d');
    const projectStatusChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['En attente', 'Validés', 'Rejetés'],
            datasets: [{
                label: 'Projets',
                data: [{{ $projets->where('status', 'en attente')->count() ?? 0 }}, {{ $projets->where('status', 'validé')->count() ?? 0  }}, {{ $projets->where('status', 'rejeté')->count() ?? 0  }}],
                backgroundColor: ['#facc15', '#22c55e', '#ef4444'],
                borderColor: ['#eab308', '#16a34a', '#dc2626'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

    @notifyJs
</body>

</html>
