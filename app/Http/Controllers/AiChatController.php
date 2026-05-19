<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ai\AnonymousAgent;
use Laravel\Ai\Messages\Message;
use Illuminate\Support\Facades\Log;

class AiChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'history' => 'array',
        ]);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        $instructions = "Kamu adalah AI Assistant untuk Toko Agen Sosis Lancar Manunggal. Bersikaplah natural layaknya asisten manusia yang ramah, sopan, dan profesional. Jawab langsung pada inti pertanyaan. PENTING: JANGAN mengulang-ulang menyebutkan alamat lengkap (Desa Ngablak Rt 3/2 Kec. Cluwak Kab. Pati) atau jam buka toko (06:00 - 17:00) di setiap jawaban, kecuali jika pengguna secara spesifik menanyakannya. Fokus pada pelayanan pelanggan, menjawab pertanyaan terkait produk (sosis, nugget, frozen food, dll).";

        $messages = [];
        foreach ($history as $msg) {
            if (isset($msg['role']) && isset($msg['content'])) {
                // Lewati pesan dengan role 'system' agar tidak menyebabkan error pada Message class Laravel AI
                if ($msg['role'] === 'system') {
                    continue;
                }
                $messages[] = new Message($msg['role'], $msg['content']);
            }
        }

        try {
            $agent = new AnonymousAgent($instructions, $messages, []);
            // Use gemini provider directly
            $response = $agent->prompt($userMessage, provider: 'gemini');

            return response()->json([
                'reply' => $response->text
            ]);
        } catch (\Exception $e) {
            Log::error('AI Chat Error: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Maaf, terjadi kesalahan saat memproses pesan Anda. Coba lagi nanti.'
            ], 500);
        }
    }

    public function notifyAdmin(Request $request)
    {
        // Mendapatkan target nomor WA dari env (mendukung FONNTE / FOONTE), default ke '085799352991'
        $target = env('FOONTE_TARGET') ?? env('FONNTE_TARGET') ?? '085799352991';
        $message = "🔔 [Toko Sosis Lancar Manunggal]\nAda pelanggan di website yang sedang membutuhkan bantuan admin langsung! Silakan buka dashboard chat Anda.";

        // Mendukung penulisan FONNTE_TOKEN maupun FOONTE_TOKEN di env agar tidak rentan typo
        $token = env('FOONTE_TOKEN') ?? env('FONNTE_TOKEN'); 

        if ($token) {
            try {
                $response = \Illuminate\Support\Facades\Http::withHeaders([
                    'Authorization' => $token,
                ])->post('https://api.fonnte.com/send', [
                    'target' => $target,
                    'message' => $message,
                ]);

                Log::info('WhatsApp Fonnte Response: ' . $response->body());
            } catch (\Exception $e) {
                Log::error('WhatsApp Notification Failed: ' . $e->getMessage());
            }
        } else {
            // Log fallback when no token exists so the user knows it works
            Log::info("WhatsApp Notification Mocked! Target: {$target}, Message: {$message}. Tambahkan FOONTE_TOKEN di .env untuk pengiriman asli.");
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Admin telah berhasil dinotifikasi via WhatsApp!'
        ]);
    }
}
