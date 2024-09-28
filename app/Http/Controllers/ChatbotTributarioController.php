<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenAI\Laravel\Facades\OpenAI;

class ChatbotTributarioController extends Controller
{
    public function submit(Request $request)
    {
        // Validar que el campo de pregunta está presente
        $request->validate([
            'askText' => 'required|string'
        ]);

        // Obtener la pregunta del usuario desde el Request
        $userMessage = $request->input('askText');

        // Buscar las leyes relevantes en la base de datos en base a la pregunta del usuario
        $keywords = explode(' ', $userMessage);
        $lawsQuery = DB::table('leyes_tributarias');

        // Buscar entre todas las leyes que contienen al menos una palabra clave de la pregunta del usuario
        foreach ($keywords as $keyword) {
            $lawsQuery->orWhere('descripcion_ley', 'LIKE', '%' . $keyword . '%');
        }

        // Obtener el contenido de las leyes encontradas
        $laws = $lawsQuery->pluck('descripcion_ley')->toArray();
        $txtContent = implode("\n", $laws);

        // Definir el rol de la IA
        $messages = [
            ['role' => 'system', 'content' => 'Eres un asesor jurídico especializado en las leyes tributarias de Chile. 
            Solo puedes responder usando la información contenida en la base de datos de leyes tributarias que te proporcionaré. 
            Responde a las preguntas como si fueras un abogado profesional. 
            Si no puedes encontrar la información en el archivo, responde con "Lo siento, no tengo esa información en mi base de datos."'],
            ['role' => 'system', 'content' => 'Este es el contenido de las leyes tributarias: ' . substr($txtContent, 0, 20000)], // limitar el archivo con una cierta cantidad de caracteres
            ['role' => 'user', 'content' => $userMessage], // Pregunta del usuario
        ];

        // Llamada a la API de OpenAI
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'temperature' => 0.9,
            'max_tokens' => 150,
        ]);

        // Obtener la respuesta de la IA
        $botReply = $response->choices[0]->message->content;

        // Devolver la respuesta a la vista
        return view('chatbot_tributario', [
            'userMessage' => $userMessage,
            'botReply' => $botReply
        ]);
    }
}