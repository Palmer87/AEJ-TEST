<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Bootstrap 4 CSS -->


<style>
                .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
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
        .status-validé { background-color: #198754; color: white; }
        .status-rejeté { background-color: #dc3545; color: white; }
        .status-attente { background-color: #ffc107; color: black; }

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
</head>
@notifyCss
<body>
    <x-notify::notify />
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

        @yield('content')
    </div>
    <script>
        // Filtrage par recherche
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#projectTable tbody tr');

            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        });

        // Filtrage par statut
        document.getElementById('statusFilter').addEventListener('change', function () {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll('#projectTable tbody tr');

            rows.forEach(row => {
                let status = row.cells[3].textContent.trim().toLowerCase();
                row.style.display = value === "" || status.includes(value) ? '' : 'none';
            });
        });

        // Tri des colonnes
        function sortTable(columnIndex) {
            let table = document.getElementById('projectTable');
            let switching = true;
            let dir = "asc";
            let switchCount = 0;

            while (switching) {
                switching = false;
                let rows = table.rows;

                for (let i = 1; i < rows.length - 1; i++) {
                    let shouldSwitch = false;
                    let x = rows[i].getElementsByTagName("TD")[columnIndex];
                    let y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

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
    </script>

@notifyJs
</body>
</html>
