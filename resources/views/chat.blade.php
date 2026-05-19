<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Assistant - Toko Lancar Manunggal</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#fdf3f3',
                            100: '#fbe4e4',
                            200: '#f7cece',
                            300: '#f1adad',
                            400: '#e87e7e',
                            500: '#db5151',
                            600: '#c53838',
                            700: '#a52b2b',
                            800: '#892626',
                            900: '#722525',
                            950: '#3e1010',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        body {
            background-color: #0f172a;
            background-image: 
                radial-gradient(at 0% 0%, hsla(353,100%,76%,0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, hsla(353,100%,56%,0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(353,100%,56%,0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(353,100%,76%,0.15) 0px, transparent 50%);
            background-attachment: fixed;
        }

        /* Markdown styling for chat bubbles */
        .prose p { margin-bottom: 0.5rem; }
        .prose p:last-child { margin-bottom: 0; }
        .prose ul { list-style-type: disc; margin-left: 1.5rem; margin-bottom: 0.5rem; }
        .prose ol { list-style-type: decimal; margin-left: 1.5rem; margin-bottom: 0.5rem; }
        .prose strong { font-weight: 600; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(156, 163, 175, 0.5);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(156, 163, 175, 0.8);
        }

        .typing-dot {
            animation: typing 1.4s infinite ease-in-out both;
        }
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }
    </style>
    <!-- Marked.js for parsing markdown -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body class="h-screen w-full flex items-center justify-center p-4 text-slate-800 antialiased overflow-hidden">
    
    <div x-data="chatApp()" class="w-full max-w-4xl h-[90vh] glass rounded-3xl shadow-2xl flex flex-col overflow-hidden relative border border-white/20">
        
        <!-- Header -->
        <header class="bg-white/40 border-b border-white/40 p-5 flex items-center justify-between z-10 backdrop-blur-md">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-brand-500 to-brand-400 flex items-center justify-center text-white shadow-lg shadow-brand-500/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-400 border-2 border-white rounded-full"></div>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-800">Toko Agen Sosis Lancar Manunggal</h1>
                    <p class="text-sm text-brand-600 font-medium flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Buka: 06.00 - 17.00 WIB
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="hidden md:flex items-center gap-2 text-xs font-medium text-slate-500 bg-white/50 px-3 py-1.5 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ngablak Rt 3/2, Cluwak
                </div>
                <button @click="notifyAdmin()" :disabled="isNotifying" class="flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 disabled:bg-emerald-800 disabled:opacity-75 text-white text-sm font-medium px-4 py-2 rounded-xl transition-all shadow-md hover:shadow-lg">
                    <!-- Loading Spinner -->
                    <svg x-show="isNotifying" class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="display: none;">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <!-- WA Icon -->
                    <svg x-show="!isNotifying" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.663-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <span class="hidden sm:inline" x-text="isNotifying ? 'Memanggil...' : 'Panggil Admin'"></span>
                </button>
            </div>
        </header>

        <!-- Messages Area -->
        <main class="flex-1 overflow-y-auto p-6 scroll-smooth" id="messages-container">
            <div class="flex flex-col gap-6">
                <!-- Initial greeting message -->
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-500 to-brand-400 flex items-center justify-center text-white shrink-0 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div class="bg-white px-5 py-3.5 rounded-2xl rounded-tl-sm shadow-sm border border-slate-100 max-w-[80%] text-[15px] leading-relaxed text-slate-700">
                        <p>Halo! Selamat datang di layanan AI Assistant <strong>Toko Agen Sosis Lancar Manunggal</strong>. Ada yang bisa saya bantu hari ini? Anda bisa bertanya mengenai ketersediaan stok, harga, atau lokasi toko kami.</p>
                    </div>
                </div>

                <template x-for="(msg, index) in messages" :key="index">
                    <div class="w-full">
                        <!-- System Message style -->
                        <div x-show="msg.role === 'system'" class="w-full flex justify-center my-3">
                            <div class="bg-slate-800/80 backdrop-blur-md text-slate-200 text-xs font-semibold px-4 py-2.5 rounded-full border border-slate-700/50 flex items-center gap-2 shadow-lg" x-html="parseMarkdown(msg.content)">
                            </div>
                        </div>

                        <!-- Regular Chat Message style -->
                        <div x-show="msg.role !== 'system'" class="flex items-start gap-4" :class="msg.role === 'user' ? 'flex-row-reverse' : ''">
                            <!-- Avatar -->
                            <div x-show="msg.role !== 'user'" class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-500 to-brand-400 flex items-center justify-center text-white shrink-0 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            
                            <!-- Bubble -->
                            <div class="px-5 py-3.5 shadow-sm max-w-[80%] text-[15px] leading-relaxed relative prose"
                                 :class="msg.role === 'user' 
                                    ? 'bg-gradient-to-br from-brand-600 to-brand-500 text-white rounded-2xl rounded-tr-sm shadow-brand-500/20' 
                                    : 'bg-white text-slate-700 rounded-2xl rounded-tl-sm border border-slate-100'"
                                 x-html="msg.role === 'user' ? escapeHtml(msg.content) : parseMarkdown(msg.content)">
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Typing indicator -->
                <div x-show="isLoading" class="flex items-start gap-4" style="display: none;">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-500 to-brand-400 flex items-center justify-center text-white shrink-0 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div class="bg-white px-5 py-4 rounded-2xl rounded-tl-sm shadow-sm border border-slate-100 flex gap-1.5 items-center">
                        <div class="w-2 h-2 rounded-full bg-brand-400 typing-dot"></div>
                        <div class="w-2 h-2 rounded-full bg-brand-400 typing-dot"></div>
                        <div class="w-2 h-2 rounded-full bg-brand-400 typing-dot"></div>
                    </div>
                </div>
                
                <!-- Bottom padding -->
                <div class="h-2 w-full"></div>
            </div>
        </main>

        <!-- Input Area -->
        <footer class="p-4 bg-white/60 border-t border-white/40 backdrop-blur-md">
            <form @submit.prevent="sendMessage" class="relative flex items-center gap-3">
                <input 
                    type="text" 
                    x-model="newMessage" 
                    placeholder="Tulis pesan Anda di sini..." 
                    class="w-full pl-5 pr-14 py-4 rounded-2xl border-none ring-1 ring-slate-200 bg-white/80 focus:bg-white focus:ring-2 focus:ring-brand-500 shadow-inner outline-none transition-all placeholder:text-slate-400"
                    :disabled="isLoading"
                    autofocus
                >
                <button 
                    type="submit" 
                    class="absolute right-2 w-12 h-12 bg-gradient-to-r from-brand-500 to-brand-600 rounded-xl flex items-center justify-center text-white shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                    :disabled="isLoading || newMessage.trim() === ''"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform translate-x-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                </button>
            </form>
            <div class="text-center mt-3 text-xs text-slate-400">
                AI Assistant dapat berbuat kesalahan. Pastikan informasi penting secara langsung ke toko.
            </div>
        </footer>
    </div>

    <script>
        // Configure marked.js options
        marked.setOptions({
            breaks: true,
            gfm: true
        });

        document.addEventListener('alpine:init', () => {
            Alpine.data('chatApp', () => ({
                newMessage: '',
                messages: [],
                isLoading: false,
                isNotifying: false,
                
                parseMarkdown(content) {
                    return marked.parse(content);
                },

                async notifyAdmin() {
                    this.isNotifying = true;
                    try {
                        const response = await axios.post('/ai/notify-admin', {}, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });
                        
                        this.messages.push({
                            role: 'system',
                            content: '🔔 **Notifikasi WA Terkirim!** Admin Toko Lancar Manunggal telah dipanggil via WhatsApp (085799352991).'
                        });

                        // Simulate Admin entering the chat after 5 seconds to show visual takeover
                        setTimeout(() => {
                            this.messages.push({
                                role: 'system',
                                content: '💬 **Sistem:** Admin Toko Lancar Manunggal bergabung ke obrolan.'
                            });
                            this.messages.push({
                                role: 'assistant',
                                content: 'Halo! Saya Admin Lancar Manunggal. Mohon maaf atas keterlambatan membalas. Ada yang bisa saya bantu secara langsung?'
                            });
                            this.scrollToBottom();
                        }, 4000);
                        
                    } catch (error) {
                        console.error('Error notifying admin:', error);
                        this.messages.push({
                            role: 'system',
                            content: '⚠️ Gagal memanggil admin. Silakan coba beberapa saat lagi.'
                        });
                    } finally {
                        this.isNotifying = false;
                        this.scrollToBottom();
                    }
                },

                escapeHtml(unsafe) {
                    return unsafe
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#039;");
                },
                
                scrollToBottom() {
                    setTimeout(() => {
                        const container = document.getElementById('messages-container');
                        container.scrollTop = container.scrollHeight;
                    }, 50);
                },

                async sendMessage() {
                    const messageText = this.newMessage.trim();
                    if (!messageText) return;

                    // Add user message
                    this.messages.push({
                        role: 'user',
                        content: messageText
                    });
                    
                    const history = [...this.messages];
                    
                    this.newMessage = '';
                    this.isLoading = true;
                    this.scrollToBottom();

                    try {
                        const response = await axios.post('/ai/chat', {
                            message: messageText,
                            history: history.slice(0, -1) // Exclude the current message from history to avoid duplication in payload, but wait, the controller expects history + message. We pass history up to previous.
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });

                        this.messages.push({
                            role: 'assistant',
                            content: response.data.reply
                        });
                    } catch (error) {
                        console.error('Error:', error);
                        this.messages.push({
                            role: 'assistant',
                            content: 'Maaf, terjadi kesalahan pada server atau koneksi terputus. Silakan coba beberapa saat lagi.'
                        });
                    } finally {
                        this.isLoading = false;
                        this.scrollToBottom();
                    }
                }
            }));
        });
    </script>
</body>
</html>
