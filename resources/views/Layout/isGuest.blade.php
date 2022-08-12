<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Course Laravel</title>
</head>
<body>
  <div>
    <header>
      <nav><a href="/">Home</a></nav>
      <nav><a href="/login">Login</a></nav>
    </header>
    <div>
      {{-- our content --}}
      @yield('content')
      {{-- end our content --}}
    </div>
    <footer>&copy; Course Laravel Made With </footer>
  </div>
</body>
</html>