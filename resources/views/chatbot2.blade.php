@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <h3>Chatbot de Asesoría en Leyes Economicas</h3>
                </div>
                <div id="chat-history" class="card-body chat-box" style="max-height: 300px; overflow-y: auto; background-color: #f8f9fa;">
                    @guest
                        <div class="alert alert-warning" role="alert">
                            {{ __('Please log in to use the chatbot and save your chat history.') }}
                        </div>
                    @else
                        @if (!empty($history))
                            @foreach ($history as $entry)
                                <div class="mb-3">
                                    <p><strong>Usuario:</strong> {{ $entry->user_message }}</p>
                                    <p><strong>Chatbot:</strong> {{ $entry->bot_reply }}</p>
                                </div>
                            @endforeach
                        @endif
                        @if (isset($userMessage) && isset($botReply))
                            <div class="mb-3">
                                <p><strong>Usuario:</strong> {{ $userMessage }}</p>
                                <p><strong>Chatbot:</strong> {{ $botReply }}</p>
                            </div>
                        @endif
                    @endguest
                </div>
                <div class="card-footer">
                    <form action="{{ route('chatbot2.submit') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" name="askText" class="form-control me-2" placeholder="Escribe tu mensaje..." required>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-secondary" href="{{ url('/') }}" id="regresar" name="regresar">Volver a Inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection