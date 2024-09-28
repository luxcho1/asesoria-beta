@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Inicio Chatbot AsesorIA Legal</h1>
        <p class="lead">Bienvenido a nuestro servicio de asesoría legal automatizada. Selecciona el chatbot que necesitas.</p>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.0</h5>
                    <p class="card-text">Asesoría general</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot') }}" id="regresar" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.1</h5>
                    <p class="card-text">Leyes económicas</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot2') }}" id="chatbot" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.2</h5>
                    <p class="card-text">Leyes familiares</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot3') }}" id="regresar" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.3</h5>
                    <p class="card-text">Leyes laborales</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot-laboral') }}" id="regresar" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.4</h5>
                    <p class="card-text">Leyes penales</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot-penal') }}" id="regresar" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.5</h5>
                    <p class="card-text">Leyes civiles</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot-civil') }}" id="regresar" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Chatbot versión 1.6</h5>
                    <p class="card-text">Leyes tributarias</p>
                    <a class="btn btn-primary" href="{{ url('/chatbot-penal') }}" id="regresar" name="regresar">Ir a chatbot</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
