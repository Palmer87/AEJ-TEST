<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>(@yield('title'))</title>
</head>
<body>
    <nav class="bg-dark p-4 " style="display: flex; justify-content: space-between;">
        <ul>
            <li>
                <a href="/" class="text-white">Home</a>
            </li>
        </ul>
       <a href="{{ route('login') }}" class="text-white"><box-icon type='solid' color="white" name='user-circle'></box-icon></a>
    </nav>
    <div>
        @yield('content')
    </div>

</body>
</html>
