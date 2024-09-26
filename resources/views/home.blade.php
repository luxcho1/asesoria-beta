@extends('layouts.app')
@section('content')

<h1 style="text-align: center">Inicio Chatbot AsesorIA Legal</h1>
<div class="container text-center" style="padding-top: 5%">
    <div class="row">
      <div class="col">  
        <a class="btn btn-primary" href="{{ url('/chatbot') }}" id="regresar" name="regresar">Ir a chatbot version 1.0</a>
      </div>
      
      <div class="col">
        <a class="btn btn-primary" href="{{ url('/chatbot2') }}" id="chatbot" name="regresar">Ir a chatbot version 1.1 (Chatbot leyes economicas)</a>
      </div>

      <div class="col">
        <a class="btn btn-primary" href="{{ url('/chatbot3') }}" id="regresar" name="regresar">Ir a chatbot version 1.2 (Chatbot leyes familiares)</a>
      </div>
      <div class="col">
        <a class="btn btn-primary" href="{{ url('/chatbot-laboral') }}" id="regresar" name="regresar">Ir a chatbot version 1.3 (Chatbot leyes laborales)</a>
      </div>
    </div>
  </div>
@endsection

