<div class="container">
    <img src="{{ config('app.url') . '/images/bookaround-logo.jpg' }}" alt="Logo BookAround">
    <h1>¡Tu cita ha sido agendada!</h1>
    <div class="info-container">
        <h2>{{ $cita->comercio->name }}</h2>
        <div class="date-container">
            <p>{{ $cita->date_time}}</p>
            <p>{{ $cita->people }}</p>
        </div>
    </div>
</div>

<style>
    .container {
        width: 100%;
        padding: 16px 0;
        display: flex;
        flex-direction: column;
        gap: 16px;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    h1 {
        font-size: 5vw;
        font-weight: bold;
        color: #6E50DD;
    }
    h2 {
        font-size: 4.5vw;
        color: #2A1F55;
    }
    .info-container {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .date-container {
        padding: 8px 4px;
        display: flex;
        flex-direction: column;
    }
    p {
        color: #2A1F55;
        font-size: 3vw;
        font-weight: 500;
    }
</style>
