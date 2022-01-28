<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf</title>
    <style>
        .title {
            text-align: center;
        }
        .body{
            padding:5px;
            margin: 5px;
        }
        .container{
            width: 100%;
            border: solid 1px #000
        }
        .row{
            margin:5px;
            width: 100%;

            /* Example */
            /* border-top: solid 1px #0ff; */
        }

    </style>
</head>

<body>
    <div class="title">
        <h4>PLAN DE CUENTAS</h4>
    </div>
    <div class="body">
        @foreach (nivel_1_cuentas() as $key1 => $cuenta1)
            <div class="container">
                <div class="row">
                    <span>{{ $key1 + 1 }} . {{ $cuenta1->descripcion }}</span>
                </div>
                @foreach (nivel_2_cuentas($cuenta1->idCuentaPlanTipo) as $key2 => $cuenta2)
                    <div class="container">
                        {{-- FINALIZADO --}}
                        <div class="row">
                            <span>{{ $key1 + 1 }}0{{ $key2 + 1 }} . {{ $cuenta2->descripcion }}</span>
                        </div>
                        @foreach (nivel_3_cuentas($cuenta1->idCuentaPlanTipo, $cuenta2->idCuentaPlan) as $key3 => $cuenta3)
                            <div class="container">
                                <div class="row">
                                    <span>{{ $key1 + 1 }}0{{ $key2 + 1 }}0{{ $key3 + 1 }} . {{ $cuenta3->descripcion }}</span>
                                </div>
                                @foreach (nivel_4_cuentas($cuenta1->idCuentaPlanTipo, $cuenta3->idCuentaPlan) as $key4 => $cuenta4)
                                    <div class="container">
                                        <div class="row">
                                            <span> {{ $key1 + 1 }}0{{ $key2 + 1 }}0{{ $key3 + 1 }}0{{ $key4 + 1 }} . {{ $cuenta4->descripcion }}</span>
                                        </div>
                                        @foreach (nivel_5_cuentas($cuenta1->idCuentaPlanTipo, $cuenta4->idCuentaPlan) as $key5 => $cuenta5)
                                            <div class="container">
                                                <div class="row">
                                                    <span>  {{ $key1 + 1 }}0{{ $key2 + 1 }}0{{ $key3 + 1 }}0{{ $key4 + 1 }}0{{ $key5 + 1 }} . {{ $cuenta5->descripcion }}</span>
                                                </div>
                                               
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>

</html>
