<!DOCTYPE html>
<html>
<head>
    <title>Confirmacion de tu cita</title>
</head>
<body>
    <h1>Confirmacion de tu cita</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Personas</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $name }}</td>
                <td>{{ $address }}</td>
                <td>{{ $people }}</td>
                <td>{{ $date }}</td>
                <td>{{ $time }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
