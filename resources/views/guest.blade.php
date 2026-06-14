<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>no roles?</title>
</head>
<body>
    <h1>yah ga ada role yaa</h1>
    <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item" type="submit">
                    Logout
                </button>
            </form>
</body>
</html>