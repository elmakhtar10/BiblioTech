<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== CSS ===============-->
    @vite('resources/css/styles.css')
    <title>Login form - Tarma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <i class="ri-alert-line" style="font-size: 1.5rem; margin-right: 10px;"></i>
        <div>
            <strong>Erreur !</strong> {{ session('error') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-left: auto;"></button>
    </div>
@endif
<div class="login">
    <img src="{{Vite::asset('resources/assets/img/login-bg.png')}}" alt="image" class="login__bg">

    <form action="{{route('register')}}" class="login__form" method="post" enctype="multipart/form-data">
        @csrf
        <h1 class="login__title">Register</h1>

        <div class="login__inputs">
            <div class="login__box">
                <input type="email" placeholder="Email" required class="login__input" name="email" value="{{old('email')}}">
                <i class="ri-mail-fill"></i>
            </div>

            <div class="login__box">
                <input type="password" placeholder="Password" required class="login__input" name="password">
                <i class="ri-lock-2-fill"></i>
            </div>

            <div class="login__box">
                <input type="text" placeholder="Prenom" required class="login__input" name="prenom" value="{{old('prenom')}}">
            </div>

            <div class="login__box">
                <input type="text" placeholder="Nom" required class="login__input" name="nom" value="{{old('nom')}}">
            </div>

            <div class="login__box">
                <input type="text" placeholder="Telephone" required class="login__input" name="telephone" value="{{old('telephone')}}">
            </div>

            <div class="login__box">
                <input type="text" placeholder="Adresse" required class="login__input" name="adresse" value="{{old('adresse')}}">
            </div>

            <div class="login__box">
                <input type="file" placeholder="Image"  class="login__input" name="photo" accept="image/*">
            </div>
        </div>

        <button type="submit" class="login__button">S'inscrire</button>

        <div class="login__register">
            Already have an account? <a href="{{route('login.form')}}">Login</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
