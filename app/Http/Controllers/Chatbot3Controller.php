<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenAI\Laravel\Facades\OpenAI;

class Chatbot3Controller extends Controller
{
    public function submit(Request $request)
    {
        // Validar que el campo de pregunta está presente
        $request->validate([
            'askText' => 'required|string'
        ]);

        // Obtener la pregunta del usuario desde el Request
        $userMessage = $request->input('askText');
        $userId = $request->user() ? $request->user()->id : null;

        // Buscar las leyes relevantes en la base de datos en base a la pregunta del usuario
        $keywords = explode(' ', $userMessage);
        $lawsQuery = DB::table('leyes_familiares');

        // Buscar entre todas las leyes que contienen al menos una palabra clave de la pregunta del usuario
        foreach ($keywords as $keyword) {
            $lawsQuery->orWhere('content', 'LIKE', '%' . $keyword . '%');
        }

        // Obtener el contenido de las leyes encontradas
        $laws = $lawsQuery->pluck('content')->toArray();
        $txtContent = implode("\n", $laws);

        // Definir el rol de la IA
        $messages = [
            ['role' => 'system', 'content' => 'Eres un asesor jurídico especializado en las leyes familiares de Chile. 
            Solo puedes responder usando la información contenida en la base de datos de leyes familiares que te proporcionare. 
            Responde a las preguntas como si fueras un abogado profesional. 
            Si no puedes encontrar la información en el archivo, responde con "Lo siento, no tengo esa información en mi base de datos."'],
            ['role' => 'system', 'content' => 'Este es el contenido de las leyes familiares: ' . substr($txtContent, 0, 10000)], // limitar el archivo con una cierta cantidad de caracteres
        ];

        // Recuperar el historial de consultas del usuario si está autenticado
        $history = [];
        if ($userId) {
            $history = DB::table('chat_histories_familiar')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'asc')
                ->get(['user_message', 'bot_reply'])
                ->toArray();

            foreach ($history as $entry) {
                $messages[] = ['role' => 'user', 'content' => $entry->user_message];
                $messages[] = ['role' => 'assistant', 'content' => $entry->bot_reply];
            }
        }

        // Añadir la nueva pregunta del usuario
        $messages[] = ['role' => 'user', 'content' => $userMessage];

        // Llamada a la API de OpenAI
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'temperature' => 0.9,
            'max_tokens' => 150,
        ]);

        // Obtener la respuesta de la IA
        $botReply = $response->choices[0]->message->content;

        // Guardar la conversación en la base de datos
        if ($userId) {
            DB::table('chat_histories_familiar')->insert([
                'user_id' => $userId,
                'user_message' => $userMessage,
                'bot_reply' => $botReply,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Devolver la respuesta a la vista
        return view('chatbot3', [
            'userMessage' => $userMessage,
            'botReply' => $botReply,
            'history' => $history
        ]);
    }
}


// Devolver la respuesta a la vista o como JSON
// return response()->json([
// 'user_message' => $userMessage,
// 'bot_reply' => $botReply,
// ]);
