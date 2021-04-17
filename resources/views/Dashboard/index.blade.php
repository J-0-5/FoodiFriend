@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <center> Usuarios </center>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="numbers">
                                <center>
                                    <p class="card-category"> Activos</p>
                                    <p class="card-title"> {{ $activeUsers }}<p>
                                </center>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-users-slash"></i>
                            </div>
                            <div class="numbers">
                                <center>
                                    <p class="card-category"> Inactivos</p>
                                    <p class="card-title"> {{ $inactiveUsers }}<p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="stats">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <center> Comercios </center>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-store"></i>
                            </div>
                            <div class="numbers">
                                <center>
                                    <p class="card-category"> Activos</p>
                                    <p class="card-title"> {{ $activeCommerce }}<p>
                                </center>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="icon-big text-center icon-warning">
                                 <i class="fas fa-store-slash"></i>
                            </div>
                            <div class="numbers">
                                <center>
                                    <p class="card-category"> Inactivos</p>
                                    <p class="card-title"> {{ $inactiveCommerce }}<p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <center> Productos </center>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-pizza-slice"></i>
                            </div>
                            <div class="numbers">
                                <center>
                                    <p class="card-category"> Activos</p>
                                    <p class="card-title"> {{ $activeProducts }}<p>
                                </center>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-drumstick-bite"></i>
                            </div>
                            <div class="numbers">
                                <center>
                                    <p class="card-category"> Inactivos</p>
                                    <p class="card-title"> {{ $inactiveProducts }}<p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                
                </div>
            </div>
        </div>
        
        
    </div>

    <br>

    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
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

    </div>


</div>
</div>

@endsection
