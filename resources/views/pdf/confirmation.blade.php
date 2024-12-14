<!DOCTYPE html>
<html>
<head>
    <title>Confirmacion de tu cita</title>
</head>
<body>
    <div class="logo-container">
        <img id="logo" src="{{ public_path('images/bookaround-logo.jpg') }}" alt="">
    </div>

    <main>
        <div class="ilustration-container">
            <img src="{{ public_path('images/bookaround-cita-reservada.jpg') }}" class="ilustration">
        </div>
        <h1 class="title">¡Tu cita ha sido agendada!</h1>
        <div class="info-container">
            <div class="info-item">
                <p class="info-item-title">Comercio</p>
                <p class="info-item-value">{{ $name }}</p>
            </div>
            <div class="info-item">
                <p class="info-item-title">Dirección</p>
                <p class="info-item-value">{{ $address }}</p>
            </div>
            <div class="info-item">
                <p class="info-item-title">Cantidad de personas</p>
                <p class="info-item-value">{{ $people }}</p>
            </div>
            <div class="info-item">
                <p class="info-item-title">Fecha</p>
                <p class="info-item-value">{{ $date }} - {{ $time }}</p>
            </div>
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
    .ilustration-container {
        width: 100%;
        text-align: center;
    }
    .ilustration {
        width: 400px;
    }
    .title {
        font-size: 38px;
        color: #2A1F55;
        text-align: center;
    }
    .info-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
        border: 1px solid #A193D4;
        border-radius: 16px;
        padding: 16px
    }
    .info-item {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 10px;
    }
    .info-item-title {
        font-size: 20px;
        color: #2A1F55;
    }
    .info-item-value {
        font-size: 18px;
        color: #A193D4;
    }
    p {
        margin: 0;
        font-family: 'Helvetica';
    }
</style>
