<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <nav aria-label="breadcrumb" style="display: flex; justify-content: center">
        <h2>BOLETA Nro {{$venta->idVenta}}</h2>
    </nav>
    <br>
    <div class="row">
        <div class="col-6">
            CLIENTE: {{$venta->idcliente }}
        </div>
        <div class="col-6">
            FECHA: {{$venta->fecha}}
        </div>
    </div>
    <br>
    <?php
        $total = 0
    ?>
    @foreach($cartCollection as $item)
                <div class="row">
                    <div class="col-3">
                        {{ $item->name }}
                    </div>
                    <div class="col-3">
                        Price: S/.{{ $item->price }}
                    </div>
                    <div class="col-3">
                        Cantidad: {{ $item->quantity }}
                    </div>
                    <div class="col-3" style="display: flex; justify-content: right">
                        Sub Total: S/. {{ $item->price * $item->quantity }}
                    </div>
                </div>
                <?php
                    $total = $total +($item->price * $item->quantity)
                ?>
            @endforeach
        <br><br>
    <div class="row">
        <div class="col-6">
            <b>TOTAL :</b>
        </div>
        <div class="col-6" style="display: flex; justify-content: right">
           <b>S/.{{$total}}</b>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
