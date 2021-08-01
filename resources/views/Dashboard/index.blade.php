@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card ">
                <div class="card-header text-center ">
                    <h5 class="card-title">Filtrar por fecha</h5>
                </div>
                <form action="{{route('dashboard.index')}}" method="GET">
                    @csrf
                    <div class="card-body ">
                        <label for="startDate">Desde:</label>
                        <input class="form-control" type="date" name='startDate'>
                        <br>
                        <label for="endDate">Hasta:</label>
                        <input class="form-control" type="date" name='endDate'>

                    </div>
                    <div class="card-footer ">
                        <button class="form-control btn btn-primary" type='submit'>Filtrar</button>
                        <a class=" form-control " href="{{route('dashboard.index')}}">Limpiar</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header text-center">
                           <b>Usuarios</b>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-success">
                                            <i class="fas fa-users"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <p class="card-category"> Activos</p>
                                        <p class="card-title"> {{ $activeUsers }}<p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-danger">
                                            <i class="fas fa-users-slash"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <p class="card-category"> Inactivos</p>
                                        <p class="card-title"> {{ $inactiveUsers }}<p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('export.user') }}" target="_blank" rel="noopener noreferrer">
                            <div style="font-size: 1.5em;" class="card-footer text-center text-success">
                                <i class="fas fa-file-excel"> Exportar</i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header text-center">
                           <b> Comercios</b>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-success">
                                            <i class="fas fa-store"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">

                                        <p class="card-category"> Activos</p>
                                        <p class="card-title"> {{ $activeCommerce }}<p>

                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-danger">
                                            <i class="fas fa-store-slash"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">

                                        <p class="card-category"> Inactivos</p>
                                        <p class="card-title"> {{ $inactiveCommerce }}<p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('export.commerce') }}" target="_blank" rel="noopener noreferrer">
                            <div style="font-size: 1.5em;" class="card-footer text-center text-success">
                                <i class="fas fa-file-excel"> Exportar</i>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header text-center">
                           <b> Productos</b>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-success">
                                            <i class="fas fa-pizza-slice"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">

                                        <p class="card-category"> Activos</p>
                                        <p class="card-title"> {{ $activeProducts }}<p>

                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-danger">
                                            <i class="fas fa-drumstick-bite"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">

                                        <p class="card-category"> Inactivos</p>
                                        <p class="card-title"> {{ $inactiveProducts }}<p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-stats">
                        <div class="card-header text-center">
                           <b> Pedidos</b>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-success">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">

                                        <p class="card-category"> Exitosos</p>
                                        <p class="card-title"> {{ $salesCTR }}<p>

                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="icon-big text-center icon-warning">
                                        <span style="font-size: 1.5em;" class="text-danger">
                                            <i class="fas fa-handshake-alt-slash"></i>
                                        </span>
                                    </div>
                                    <div class="text-center">

                                        <p class="card-category"> Incompletos </p>
                                        <p class="card-title"> {{ $ordersCTR }}<p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
