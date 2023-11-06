<!DOCTYPE html>
<html>
<head>
    <title>Préstamos de Salas Biblioteca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-... (agrega tu clave de integridad)" crossorigin="anonymous">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }
        @page {
            size: auto;
            margin: 0;
        }
        h1 {
            margin: 10px;
            text-align: center;
        }
        p {
            margin: 5px;
            margin-left: 20px;
        }
        .numero-pc {
            text-align: center;
            font-size: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .numero-pc i {
            margin-right: 10px;
            font-size: 36px;
        }
        .numero-pc span {
            font-size: 36px;
            display: flex;
            align-items: center;
        }
        /* Otros estilos que puedas necesitar */
    </style>
    <link rel="icon" href="{{ asset('imgs/logou.png') }}" type="image/png">
</head>
<body>
    <h1>Biblioteca Miguel De Cervantes</h1>
    <p>Carné: {{ $carne }}</p>
    <p>Usuario: {{ $nombre }}</p>
    <p>Hora de Entrada: {{ $horaEntrada }}</p>
    @php
        $horaSalida = \Carbon\Carbon::parse($horaEntrada)->addHours(2);
        if ($horaSalida->format('H:i') > '18:00') {
            $horaSalida = $horaSalida->setTime(18, 0);
        }
    @endphp
    <p>Hora de Salida: {{ $horaSalida->format('H:i') }}</p> 
    <p class="numero-pc">
        <i class="fas fa-desktop"></i>
        <span>PC{{ $numeroPc }}</span>
    </p>
    <script>
        function imprimirTicket() {
            window.print();
            window.onafterprint = function() {
                window.location.href = "{{ route('prestamocompu.index') }}";
            };
        }
        window.onload = function() {
            imprimirTicket();
        };
    </script>
</body>
</html>
