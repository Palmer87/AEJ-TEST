<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="{{ route('promoteurs.index') }}" class="text-white">Dashboard</a>
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
        <x-notify::notify />
        @yield('content')
    </div>
    @notifyJs

</body>
</html>
