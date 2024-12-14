<!DOCTYPE html>
<html>
<head>
    <title>Confirmacion de tu cita</title>
</head>
<body>
    <div class="logo-container">
        <img id="logo" src="{{ config('app.url') . '/images/bookaround-logo.jpg' }}" alt="">
    </div>

    <main>
        <h1 class="title">¡Tu cita ha sido agendada!</h1>

        <div class="info-container">
            <p class="info-item-title">{{ $cita->comercio->name }}</p>
            <p class="info-item-value">{{ $cita->date_time }}</p>
            <p class="info-item-value">{{ $cita->comercio->address }}</p>
            <p class="info-item-value">{{ $cita->people }} personas</p>
        </div>
    </main>
</body>
</html>

<style>
    @font-face {
        font-family: 'Rubik';
        src: url({{ storage_path('fonts/Rubik-VariableFont_wght.ttf') }}) format("truetype");
    }
    body {
        padding: 0;
        margin: 0;
        height: 100vh;
        box-sizing: border-box;
        font-family: 'Helvetica';
    }
    main {
        padding: 0 32px;
    }
    .logo-container {
        width: 100%;
        text-align: center;
        background-color: #402E80;
    }
    #logo {
        width: 400px;
    }
    .title {
        font-size: 38px;
        color: #6E50DD;
        text-align: center;
    }
    .info-container {
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .info-item-title {
        font-size: 30px;
        color: #2A1F55;
    }
    .info-item-value {
        font-size: 18px;
        color: #2A1F55;
    }
    p {
        margin: 0;
        font-family: 'Helvetica';
    }
</style>
