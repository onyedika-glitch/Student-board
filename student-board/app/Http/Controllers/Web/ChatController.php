<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// If you installed openai-php/laravel:
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    // POST /chat
    public function chat(Request $request)
    {
        $user = Auth::user(); // optional: tie conversations to user
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2000'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $message = $request->input('message');

        // Build the messages array; you can keep conversation if you store it server-side (session/db)
        $messages = [
            ['role' => 'system', 'content' => 'You are a helpful assistant for FUTO Student Board. Be concise, friendly, and point to campus resources when relevant.'],
            ['role' => 'user', 'content' => $message],
        ];

        // Call OpenAI Chat API
        try {
            // If using openai-php/laravel package you can call via facade OpenAI
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini', // pick the model you prefer (or gpt-4o-mini/gpt-5...)
                'messages' => $messages,
                'max_tokens' => 700,
                'temperature' => 0.2,
            ]);

            // Extract assistant reply (depends on client shape)
            $reply = $response->choices[0]->message->content ?? $response->choices[0]->message ?? null;
            if (is_object($reply)) {
                $reply = (string) $reply;
            }

            return response()->json([
                'reply' => $reply,
                'raw' => $response,
            ]);
        } catch (\Throwable $e) {
            // don't leak internal details in production
            \Log::error('OpenAI error: '.$e->getMessage());
            return response()->json(['error' => 'Failed to contact assistant. Try again later.'], 500);
        }
    }
}
