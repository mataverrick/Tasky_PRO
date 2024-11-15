<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
<form method="POST" action="{{route('inicia-sesion')}}"> @csrf
    <div class="mb-3">
    <label for="emailInput" class="form-label"> Email</label> <input type="email" class="form-control" id="emailInput" name="email" required>
    </div>
    <div class="mb-3">
    <label for="password Input" class="form-label">Password</label>
    <input type="password" class="form-control" id=" passwordInput" name="password" required>
    </div>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
    <label class="form-check-label" for="rememberCheck"> Mantener sesión iniciada</label>
    </div> <div>
    <p>¿No tienes cuenta? <a href="{{route('registro')}}"> Regístrate</a></p>
    </div>
    <button type="submit" class="btn btn-primary">Acceder</button>
    </form>
</body>
</html>