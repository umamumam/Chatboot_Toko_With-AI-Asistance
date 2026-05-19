<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lancar Manunggal - Distributor Sosis & Makanan Beku Premium</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#fdf6f2',
                            100: '#fbece3',
                            200: '#f7d8c7',
                            300: '#f1b89f',
                            400: '#e88e6b',
                            500: '#db683d',
                            600: '#c54a24',
                            700: '#a23d18',
                            800: '#833318',
                            900: '#6a2b17',
                            950: '#3b150a',
                        },
                        peach: {
                            50: '#fffbf9',
                            100: '#fdf3eb',
                            200: '#fbe3d2',
                            300: '#f7cdb0',
                            400: '#f1ab82',
                            500: '#e88352',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0) rotate(0deg)' },
                            '50%': { transform: 'translateY(-8px) rotate(1deg)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Marked.js for markdown parsing -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <!-- Anime.js -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>

    <style>
        .premium-blur {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .organic-shape {
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(156, 163, 175, 0.3);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(156, 163, 175, 0.5);
        }
        .typing-dot {
            animation: typing 1.4s infinite ease-in-out both;
        }
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0); opacity: 0.3; }
            40% { transform: scale(1); opacity: 1; }
        }
        .chat-bubble-markdown p {
            margin-bottom: 0.5rem;
        }
        .chat-bubble-markdown p:last-child {
            margin-bottom: 0;
        }
        .chat-bubble-markdown ul {
            list-style-type: disc;
            margin-left: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .chat-bubble-markdown ol {
            list-style-type: decimal;
            margin-left: 1.25rem;
            margin-bottom: 0.5rem;
        }
        html {
            scroll-behavior: smooth;
        }
        /* Scroll Reveal Effect Classes for Anime.js */
        .reveal {
            opacity: 0;
        }
        .reveal-item {
            opacity: 0;
        }
    </style>
</head>
<body class="bg-peach-50 text-slate-800 antialiased font-sans" x-data="landingApp()">

    <!-- Header Navigation -->
    <header class="fixed top-0 left-0 right-0 z-40 transition-all duration-300 w-full"
            :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-sm py-4' : 'bg-transparent py-6'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            
            <!-- Logo Section -->
            <a href="#" class="flex items-center gap-3">
                <img src="/LM - Copy.jpeg" alt="Logo Lancar Manunggal" class="w-11 h-11 rounded-xl shadow-sm border border-slate-200 bg-white p-1 object-contain">
                <div class="leading-none">
                    <span class="font-heading font-extrabold text-[16px] text-slate-900 tracking-tight block">Lancar Manunggal</span>
                </div>
            </a>
            
            <!-- Nav Links -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="#hero" class="text-xs font-bold text-slate-900 uppercase tracking-widest hover:text-brand-700 transition-colors">Home</a>
                <a href="#produk" class="text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-brand-700 transition-colors">Produk</a>
                <a href="#tentang-kami" class="text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-brand-700 transition-colors">Tentang Kami</a>
                <a href="#kemitraan" class="text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-brand-700 transition-colors">Kemitraan</a>
            </nav>

            <!-- CTA Button -->
            <div class="flex items-center gap-3">
                <a href="#lokasi" class="bg-brand-700 hover:bg-brand-850 text-white font-bold px-6 py-2.5 rounded-xl text-xs uppercase tracking-widest shadow-md hover:shadow-lg transition-all">
                    Kontak
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="relative pt-32 pb-24 md:pt-40 md:pb-36 overflow-hidden">
        <!-- Giant Peach Background Blob on Right (Persis seperti Mockup Dribbble) -->
        <div class="absolute top-0 right-0 w-[45%] h-full bg-[#fdf3eb] rounded-bl-[16rem] -z-20 hidden lg:block"></div>
        
        <!-- Soft Warm Decorative Background Elements -->
        <div class="absolute top-1/4 -left-32 w-96 h-96 bg-brand-100/30 rounded-full blur-3xl -z-10"></div>
        
        <!-- Dotted matrix overlay on the left side of the screen -->
        <div class="absolute top-1/3 left-10 w-16 h-20 bg-[radial-gradient(#e2e8f0_2px,transparent_2px)] [background-size:12px_12px] opacity-70 hidden xl:block -z-10"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Text Area (Left) -->
                <div class="lg:col-span-6 text-center lg:text-left">
                    <h1 class="hero-title font-heading font-black text-[2.25rem] sm:text-[3rem] lg:text-[3.5rem] text-slate-900 leading-[1.12] tracking-tight mb-6">
                        <span class="inline-block hero-word opacity-0">DISTRIBUTOR</span>
                        <span class="inline-block hero-word opacity-0">SOSIS</span>
                        <span class="inline-block hero-word opacity-0">&</span>
                        <br class="hidden sm:inline">
                        <span class="inline-block hero-word opacity-0">MAKANAN</span>
                        <span class="inline-block hero-word opacity-0">BEKU</span>
                        <span class="inline-block hero-word opacity-0 text-brand-700">PREMIUM</span>
                    </h1>
                    <p class="hero-subtitle opacity-0 text-slate-500 text-sm sm:text-base font-semibold leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                        Kualitas Terbaik, Layanan Cepat untuk Bisnis Anda.
                    </p>
                    <div class="hero-cta opacity-0 flex justify-center lg:justify-start">
                        <button @click="openChatWidget('Bagaimana cara menjadi agen?')" class="bg-brand-700 hover:bg-brand-850 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-brand-700/25 hover:shadow-xl transition-all text-xs uppercase tracking-widest">
                            Menjadi Agen Kami
                        </button>
                    </div>
                </div>
                
                <!-- Image Area (Right) -->
                <div class="lg:col-span-6 flex justify-center items-center relative">
                    <!-- Dribbble organic shapes behind sausage (PERSIS SEPERTI MOCKUP) -->
                    <!-- Soft lighter warm peach organic circle -->
                    <div class="hero-shape-1 opacity-0 absolute w-[360px] h-[360px] sm:w-[460px] sm:h-[460px] bg-[#fae8d8] organic-shape -rotate-6 -z-10"></div>
                    
                    <!-- Solid brand deep rust organic fluid blob -->
                    <div class="hero-shape-2 opacity-0 absolute w-[350px] h-[350px] sm:w-[445px] sm:h-[445px] bg-brand-700 organic-shape rotate-12 -z-10 translate-x-4 -translate-y-2 shadow-xl shadow-brand-700/20"></div>
                    
                    <!-- Dotted decorative grid near the image -->
                    <div class="hero-shape-3 opacity-0 absolute -bottom-6 -left-6 w-24 h-24 bg-[radial-gradient(#a23d18_1.5px,transparent_1.5px)] [background-size:12px_12px] opacity-25 -z-10 hidden sm:block"></div>
                    
                    <!-- Hand-drawn style decorative SVG arrow pointing from text to image -->
                    <div class="hero-shape-4 opacity-0 absolute -bottom-16 -left-12 hidden xl:block -z-10">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" class="text-brand-700/35">
                            <path d="M10,60 C25,65 35,45 35,25 C35,15 25,12 15,20 C5,28 15,40 30,35 L45,30" stroke="currentColor" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/>
                            <path d="M40,25 L46,31 L38,35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <!-- Main Floating Image Card -->
                    <div class="hero-image-card opacity-0 relative w-[340px] h-[340px] sm:w-[420px] sm:h-[420px] overflow-hidden rounded-[2.5rem] shadow-2xl border-4 border-white bg-white animate-float">
                        <img src="/hero_sausage.png" alt="Sosis Premium Lancar Manunggal" class="w-full h-full object-cover">
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Product Grid Catalog Section (Dribbble Layout) -->
    <section id="produk" class="py-24 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Category Tabs (Dribbble Style) -->
            <div class="flex items-center justify-center gap-3 mb-12 flex-wrap">
                <button @click="activeTab = 'semua'" 
                        class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 border"
                        :class="activeTab === 'semua' ? 'bg-brand-700 text-white border-brand-700 shadow-md shadow-brand-700/20' : 'bg-white text-slate-500 border-slate-200 hover:text-brand-700'">
                    Semua Produk
                </button>
                <button @click="activeTab = 'daging'" 
                        class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 border"
                        :class="activeTab === 'daging' ? 'bg-brand-700 text-white border-brand-700 shadow-md shadow-brand-700/20' : 'bg-white text-slate-500 border-slate-200 hover:text-brand-700'">
                    Olahan Daging
                </button>
                <button @click="activeTab = 'seafood'" 
                        class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 border"
                        :class="activeTab === 'seafood' ? 'bg-brand-700 text-white border-brand-700 shadow-md shadow-brand-700/20' : 'bg-white text-slate-500 border-slate-200 hover:text-brand-700'">
                    Camilan & Seafood
                </button>
                <button @click="activeTab = 'perlengkapan'" 
                        class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 border"
                        :class="activeTab === 'perlengkapan' ? 'bg-brand-700 text-white border-brand-700 shadow-md shadow-brand-700/20' : 'bg-white text-slate-500 border-slate-200 hover:text-brand-700'">
                    Perlengkapan & Cup
                </button>
            </div>

            <!-- Dynamic Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div class="bg-[#fcf8f5] rounded-3xl overflow-hidden p-4 border border-slate-100/50 flex flex-col justify-between hover:shadow-lg transition-all duration-300 group transform hover:-translate-y-1">
                        <div>
                            <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden bg-white mb-5 shadow-sm">
                                <img :src="product.image" :alt="product.name" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <h4 class="font-heading font-black text-lg text-slate-900 mb-2" x-text="product.name"></h4>
                            <p class="text-xs text-slate-500 leading-relaxed mb-6" x-text="product.desc"></p>
                        </div>
                        <button @click="openChatWidget('Berapa harga ' + product.name + '?')" class="w-full bg-brand-700 hover:bg-brand-850 text-white font-bold py-3 rounded-xl text-[10px] uppercase tracking-widest transition-colors">
                            Lihat Detail
                        </button>
                    </div>
                </template>
            </div>

        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang-kami" class="py-24 bg-[#fdf8f5] reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-brand-700 font-bold uppercase tracking-widest text-xs block mb-3">TENTANG KAMI</span>
                    <h2 class="font-heading font-black text-3xl sm:text-4xl text-slate-900 leading-tight mb-6">
                        Penyedia Frozen Food Terbaik di Cluwak, Pati
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Toko Agen Sosis Lancar Manunggal berkomitmen penuh untuk menyalurkan produk makanan beku (*frozen food*) berkualitas tinggi dengan standar keamanan makanan terbaik. Kami melayani agen penjualan, grosir, warung makan, hingga konsumsi harian keluarga Anda.
                    </p>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Kami menjamin penyimpanan optimal pada suhu beku agar mutu nutrisi, kesegaran rasa, dan kebersihan sosis maupun nugget tetap terjaga 100% hingga sampai ke tangan Anda.
                    </p>
                </div>
                <div class="relative flex justify-center">
                    <div class="absolute w-72 h-72 bg-brand-200/20 rounded-full blur-3xl"></div>
                    <img src="/LM - Copy.jpeg" alt="Lancar Manunggal" class="w-72 h-72 rounded-[2rem] object-contain bg-white p-5 border border-slate-200 shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Kemitraan Section -->
    <section id="kemitraan" class="py-24 bg-white reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-brand-700 font-bold uppercase tracking-widest text-xs block mb-3">KEMITRAAN AGEN</span>
            <h2 class="font-heading font-black text-3xl sm:text-4xl text-slate-900 mb-6">
                Mulai Bisnis Frozen Food Anda Hari Ini!
            </h2>
            <p class="text-slate-500 text-sm sm:text-base max-w-xl mx-auto mb-10 leading-relaxed">
                Dapatkan harga distributor termurah, komisi menarik, panduan produk, serta bantuan promosi untuk memulai kesuksesan finansial Anda bersama kami.
            </p>
            <button @click="openChatWidget('Bagaimana syarat menjadi mitra?')" class="bg-brand-700 hover:bg-brand-850 text-white font-bold px-8 py-4 rounded-xl shadow-lg transition-all text-xs uppercase tracking-widest">
                Daftar Kemitraan Sekarang
            </button>
        </div>
    </section>

    <!-- Lokasi & Kontak Section -->
    <section id="lokasi" class="py-24 bg-[#fdf8f5] border-t border-slate-100 reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column: Info Section -->
                <div class="lg:col-span-5">
                    <span class="text-brand-700 font-bold uppercase tracking-widest text-xs block mb-3">HUBUNGI KAMI</span>
                    <h3 class="font-heading font-black text-3xl sm:text-4xl text-slate-900 leading-tight mb-8">Detail Kontak & Lokasi Resmi</h3>
                    
                    <div class="space-y-6 mb-8">
                        <!-- Alamat -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 bg-brand-100 text-brand-700 rounded-xl flex items-center justify-center shrink-0 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Alamat Toko:</h4>
                                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-1">Desa Ngablak Rt 3 / 2 Kec. Cluwak Kab. Pati, Jawa Tengah</p>
                            </div>
                        </div>

                        <!-- Jam Operasional -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 bg-brand-100 text-brand-700 rounded-xl flex items-center justify-center shrink-0 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Jam Operasional:</h4>
                                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-1">Buka Setiap Hari: 06:00 - 17:00 WIB</p>
                            </div>
                        </div>

                        <!-- Hubungi WA -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 bg-brand-100 text-brand-700 rounded-xl flex items-center justify-center shrink-0 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">WhatsApp Admin:</h4>
                                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-1">085799352991 (Respon Sangat Cepat)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Direct Chat button -->
                    <a href="https://wa.me/6285799352991" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold px-6 py-3.5 rounded-xl shadow-md shadow-emerald-500/20 hover:shadow-lg transition-all text-xs uppercase tracking-widest">
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.663-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Hubungi WhatsApp Admin
                    </a>
                </div>

                <!-- Right Column: Interactive Google Map -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-[2.5rem] p-4 border border-slate-100 shadow-2xl flex flex-col group overflow-hidden">
                        <!-- Embedded Interactive Map Frame -->
                        <div class="w-full h-80 sm:h-96 rounded-[1.8rem] overflow-hidden shadow-inner border border-slate-100 relative z-0">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7924610196884!2d110.98161487570417!3d-6.534807263836173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e712ff7548df9b3%3A0x80adb62551f082fe!2sAgen%20sosis%20lancar%20manunggal!5e0!3m2!1sid!2sid!4v1716100000000!5m2!1sid!2sid" 
                                class="w-full h-full border-0" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                        
                        <!-- Map Details & CTA Button -->
                        <div class="mt-4 px-2 py-1 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <h4 class="font-heading font-black text-lg text-slate-900">Agen Sosis Lancar Manunggal</h4>
                                <p class="text-xs text-slate-500 mt-1">Desa Ngablak Rt 3 / 2 Kec. Cluwak Kab. Pati, Jawa Tengah</p>
                            </div>
                            <a 
                                href="https://www.google.com/maps/place/Agen+sosis+lancar+manunggal/@-6.5346891,110.9838036,17z/data=!4m6!3m5!1s0x2e712ff7548df9b3:0x80adb62551f082fe!8m2!3d-6.5348126!4d110.9838612!16s%2Fg%2F11jnmbqy3j?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" 
                                target="_blank" 
                                class="w-full sm:w-auto bg-brand-700 hover:bg-brand-850 text-white font-bold px-6 py-3.5 rounded-xl text-[10px] uppercase tracking-widest shadow-md transition-colors inline-flex items-center justify-center gap-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-slate-950 text-slate-300 pt-20 pb-10 border-t border-slate-900/60 relative overflow-hidden">
        <!-- Abstract glowing ambient decorative elements -->
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-brand-900/10 rounded-full blur-[120px] pointer-events-none -z-10"></div>
        <div class="absolute -top-40 -left-40 w-[300px] h-[300px] bg-brand-800/5 rounded-full blur-[100px] pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-16 border-b border-slate-900">
                
                <!-- Column 1: Brand Profile -->
                <div class="lg:col-span-4 md:col-span-6">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="/LM - Copy.jpeg" alt="Logo Lancar Manunggal" class="w-10 h-10 rounded-xl object-contain bg-white p-1 border border-white/10 shadow-md">
                        <span class="font-heading font-black text-white text-lg tracking-tight">Lancar Manunggal</span>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed mb-6">
                        Distributor resmi makanan beku (*frozen food*) berkualitas tinggi di Cluwak, Pati. Menyediakan berbagai olahan produk daging segar, seafood olahan, minipao, kentang beku, hingga kemasan & cup es higienis terlengkap.
                    </p>
                    <!-- Social Media Links with hover glow -->
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/6285799352991" target="_blank" class="w-9 h-9 bg-slate-900 hover:bg-emerald-500 text-slate-400 hover:text-white rounded-xl flex items-center justify-center border border-slate-900/50 hover:border-emerald-400/20 hover:shadow-lg hover:shadow-emerald-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.663-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                        <a href="https://www.google.com/maps/place/Agen+sosis+lancar+manunggal/@-6.5346891,110.9838036,17z/data=!4m6!3m5!1s0x2e712ff7548df9b3:0x80adb62551f082fe!8m2!3d-6.5348126!4d110.9838612!16s%2Fg%2F11jnmbqy3j?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="w-9 h-9 bg-slate-900 hover:bg-brand-700 text-slate-400 hover:text-white rounded-xl flex items-center justify-center border border-slate-900/50 hover:border-brand-500/20 hover:shadow-lg hover:shadow-brand-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-slate-900 hover:bg-indigo-600 text-slate-400 hover:text-white rounded-xl flex items-center justify-center border border-slate-900/50 hover:border-indigo-500/20 hover:shadow-lg hover:shadow-indigo-500/10 transition-all duration-300 transform hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Navigasi Cepat -->
                <div class="lg:col-span-2 md:col-span-3 col-span-1">
                    <h4 class="font-heading font-black text-white text-xs uppercase tracking-widest mb-6">Navigasi</h4>
                    <ul class="space-y-4 text-xs font-semibold">
                        <li><a href="#hero" class="text-slate-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#produk" class="text-slate-400 hover:text-white transition-colors">Katalog Produk</a></li>
                        <li><a href="#tentang-kami" class="text-slate-400 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#kemitraan" class="text-slate-400 hover:text-white transition-colors">Kemitraan Agen</a></li>
                        <li><a href="#lokasi" class="text-slate-400 hover:text-white transition-colors">Lokasi Toko</a></li>
                    </ul>
                </div>

                <!-- Column 3: Produk Unggulan -->
                <div class="lg:col-span-2 md:col-span-3 col-span-1">
                    <h4 class="font-heading font-black text-white text-xs uppercase tracking-widest mb-6">Kategori Produk</h4>
                    <ul class="space-y-4 text-xs font-semibold text-slate-400">
                        <li>Sosis Bakar & Goreng</li>
                        <li>Nugget Ayam Premium</li>
                        <li>Minipao Aneka Rasa</li>
                        <li>Olahan Baso & Tempura</li>
                        <li>Kulit & Pembungkus Kebab</li>
                        <li>Cup Es Berbagai Ukuran</li>
                    </ul>
                </div>

                <!-- Column 4: Kontak Resmi -->
                <div class="lg:col-span-4 md:col-span-6">
                    <h4 class="font-heading font-black text-white text-xs uppercase tracking-widest mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4 text-xs font-semibold">
                        <li class="flex items-start gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            <span class="text-slate-400 leading-relaxed">
                                Desa Ngablak Rt 3 / 2, Kec. Cluwak, Kab. Pati, Jawa Tengah
                            </span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-700 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <a href="https://wa.me/6285799352991" target="_blank" class="text-slate-400 hover:text-white transition-colors">0857-9935-2991</a>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-700 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            <span class="text-slate-400">lancarmanunggal@gmail.com</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom Area -->
            <div class="mt-12 flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Copyright -->
                <p class="text-xs text-slate-450 text-center md:text-left">
                    &copy; 2026 Toko Lancar Manunggal. Semua hak cipta dilindungi undang-undang.
                </p>
                
                <!-- Secure Trusted Payment / Commercial Badges -->
                <div class="flex items-center gap-4 flex-wrap justify-center opacity-40 hover:opacity-75 transition-opacity duration-300">
                    <span class="text-[9px] font-bold tracking-widest text-slate-400 uppercase">Metode Pembayaran Resmi:</span>
                    <div class="bg-slate-900 border border-slate-900/50 px-2 py-1 rounded-md text-[8px] font-extrabold text-white tracking-wider">COD / TUNAI</div>
                    <div class="bg-slate-900 border border-slate-900/50 px-2 py-1 rounded-md text-[8px] font-extrabold text-white tracking-wider">TRANSFER BANK</div>
                    <div class="bg-slate-900 border border-slate-900/50 px-2 py-1 rounded-md text-[8px] font-extrabold text-white tracking-wider">QRIS</div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==================== PREMIUM FLOATING CHAT WIDGET ==================== -->
    <div x-data="chatApp()" class="fixed bottom-6 right-6 z-50 flex flex-col items-end">
        
        <!-- Glowing Floating Trigger Button -->
        <button 
            @click="toggleChat()" 
            class="w-16 h-16 bg-gradient-to-tr from-brand-700 to-brand-600 text-white rounded-full flex items-center justify-center shadow-2xl shadow-brand-700/30 hover:scale-110 active:scale-95 transition-all relative border border-white/20"
            :class="isOpen ? 'rotate-180 bg-slate-800' : ''"
        >
            <!-- Bell Notif Dot -->
            <div x-show="!isOpen && showNotificationBadge" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 border-2 border-slate-50 rounded-full flex items-center justify-center text-[10px] font-bold text-white leading-none animate-bounce">
                1
            </div>
            
            <!-- Message Icon -->
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <!-- Close Icon -->
            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Chat Window Card -->
        <div 
            x-show="isOpen" 
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-8 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-250 transform"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-8 scale-95"
            class="fixed md:absolute bottom-24 md:bottom-20 right-0 md:right-0 w-screen h-[calc(100vh-140px)] md:w-[400px] md:h-[600px] bg-white/95 backdrop-blur-xl rounded-[2rem] shadow-2xl flex flex-col overflow-hidden border border-slate-100 z-50"
            style="display: none;"
        >
            
            <!-- Widget Header (Sienna/Rust Theme matching Dribbble) -->
            <header class="bg-gradient-to-r from-brand-700 to-brand-600 text-white p-5 flex items-center justify-between shadow-md">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <img src="/LM - Copy.jpeg" alt="Asisten Lancar Manunggal" class="w-12 h-12 rounded-xl object-contain bg-white p-1 border border-white/20 shadow-sm">
                        <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-brand-800 rounded-full"></span>
                    </div>
                    <div>
                        <h4 class="font-heading font-extrabold text-[15px] leading-tight tracking-tight">Asisten Lancar Manunggal</h4>
                        <p class="text-[11px] text-brand-200 flex items-center gap-1 font-medium mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block animate-ping"></span>
                            Aktif Setiap Hari (06:00 - 17:00)
                        </p>
                    </div>
                </div>
                <!-- Close Button inside card header -->
                <button @click="isOpen = false" class="text-brand-200 hover:text-white p-1 hover:bg-white/10 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </header>

            <!-- Notification bar if rate-limited -->
            <div x-show="isRateLimited" class="bg-red-50 text-red-700 text-xs px-4 py-2 border-b border-red-100 font-medium flex items-center gap-2" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>AI sedang sibuk/limit. Anda dapat memanggil Admin via WA sekarang!</span>
            </div>

            <!-- Chat Area Messages -->
            <main class="flex-1 overflow-y-auto p-5 space-y-5 bg-slate-50/50" id="chat-messages-container">
                
                <!-- Welcome Assistant bubble -->
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-brand-700 flex items-center justify-center text-white shrink-0 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm border border-slate-100 max-w-[85%] text-xs sm:text-sm leading-relaxed text-slate-700">
                        <p>Halo! Selamat datang di Toko Lancar Manunggal Desa Ngablak. Ada yang bisa saya bantu hari ini? 🙋‍♂️</p>
                        <p class="mt-2">Anda bisa bertanya harga, stok sosis, lokasi, atau jam operasional kami.</p>
                    </div>
                </div>

                <!-- Render Messages Loop -->
                <template x-for="(msg, index) in messages" :key="index">
                    <div class="w-full">
                        <!-- System Pill (e.g. notify success) -->
                        <div x-show="msg.role === 'system'" class="w-full flex justify-center my-2 text-center">
                            <div class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-4 py-2 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-2 max-w-[90%] leading-relaxed" x-html="parseMarkdown(msg.content)"></div>
                        </div>

                        <!-- Assistant/User bubbles -->
                        <div x-show="msg.role !== 'system'" class="flex items-start gap-3" :class="msg.role === 'user' ? 'flex-row-reverse' : ''">
                            <!-- Avatar -->
                            <div x-show="msg.role !== 'user'" class="w-8 h-8 rounded-lg bg-brand-700 flex items-center justify-center text-white shrink-0 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>

                            <!-- Bubble Content -->
                            <div class="p-4 rounded-2xl text-xs sm:text-sm leading-relaxed max-w-[85%] chat-bubble-markdown shadow-sm border"
                                 :class="msg.role === 'user' 
                                    ? 'bg-gradient-to-br from-brand-700 to-brand-500 text-white rounded-tr-none border-brand-400/20 shadow-brand-500/10' 
                                    : 'bg-white text-slate-700 rounded-tl-none border-slate-100'"
                                 x-html="msg.role === 'user' ? escapeHtml(msg.content) : parseMarkdown(msg.content)">
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Typing indicator -->
                <div x-show="isLoading" class="flex items-start gap-3" style="display: none;">
                    <div class="w-8 h-8 rounded-lg bg-brand-700 flex items-center justify-center text-white shrink-0 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm border border-slate-100 flex gap-1 items-center">
                        <div class="w-1.5 h-1.5 rounded-full bg-brand-400 typing-dot"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-brand-400 typing-dot"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-brand-400 typing-dot"></div>
                    </div>
                </div>

            </main>

            <!-- Widget Footer / Form Input -->
            <footer class="p-4 bg-white border-t border-slate-100 flex flex-col gap-3">
                
                <!-- Quick Options & Notify Admin Button -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1">
                    <button @click="notifyAdmin()" :disabled="isNotifying" class="shrink-0 flex items-center gap-1.5 bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-3 py-1.5 rounded-xl text-[11px] transition-all shadow-md active:scale-95 disabled:bg-slate-400 disabled:cursor-not-allowed">
                        <svg x-show="isNotifying" class="animate-spin h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="display: none;">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <svg x-show="!isNotifying" class="h-3.5 w-3.5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.663-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span x-text="isNotifying ? 'Memanggil...' : 'Panggil Admin'"></span>
                    </button>
                    <button @click="newMessage = 'Dimana lokasi toko?'" class="shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-600 px-3 py-1.5 rounded-xl text-[11px] font-semibold transition-colors">📍 Lokasi Toko</button>
                    <button @click="newMessage = 'Jam buka dari jam berapa?'" class="shrink-0 bg-slate-100 hover:bg-slate-200 text-slate-600 px-3 py-1.5 rounded-xl text-[11px] font-semibold transition-colors">⏰ Jam Operasional</button>
                </div>

                <!-- Input Form Field -->
                <form @submit.prevent="sendMessage" class="relative flex items-center">
                    <input 
                        type="text" 
                        x-model="newMessage" 
                        placeholder="Tulis pesan Anda..." 
                        class="w-full pl-4 pr-12 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 bg-slate-50 focus:bg-white text-xs sm:text-sm placeholder:text-slate-400 transition-all"
                        :disabled="isLoading"
                    >
                    <button 
                        type="submit"
                        class="absolute right-1.5 w-9 h-9 bg-brand-700 hover:bg-brand-850 text-white rounded-lg flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="isLoading || newMessage.trim() === ''"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform rotate-90" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    </button>
                </form>
            </footer>
        </div>
    </div>

    <!-- Script Application Logic -->
    <script>
        // Configure marked.js options for assistant Markdown response parsing
        marked.setOptions({
            breaks: true,
            gfm: true
        });

        // Main landing page app
        function landingApp() {
            return {
                scrolled: false,
                activeTab: 'semua',
                products: [
                    {
                        id: 1,
                        name: 'Sosis Okey',
                        category: 'daging',
                        image: '/bratwurst.png',
                        desc: 'Sosis ayam/sapi ekonomis berkualitas tinggi, rasa gurih khas Okey, sangat cocok untuk konsumsi harian.'
                    },
                    {
                        id: 2,
                        name: 'Nugget Okey',
                        category: 'daging',
                        image: '/chicken_nuggets.png',
                        desc: 'Nugget ayam renyah ekonomis dengan cita rasa gurih instan Okey yang lezat disukai anak-anak.'
                    },
                    {
                        id: 3,
                        name: 'Sosis Bakar Salam',
                        category: 'daging',
                        image: '/sosis_bakar.png',
                        desc: 'Sosis sapi tebal dari Salam dengan aroma rempah asap khas yang kuat, khusus didesain untuk olahan sosis bakar.'
                    },
                    {
                        id: 4,
                        name: 'Bakso Kemasan',
                        category: 'daging',
                        image: '/bakso_kemasan.png',
                        desc: 'Bakso kemasan isi daging sapi asli pilihan bertekstur kenyal, gurih alami, higienis, dan praktis.'
                    },
                    {
                        id: 5,
                        name: 'Minipao',
                        category: 'seafood',
                        image: '/minipao.png',
                        desc: 'Pao mini bertekstur lembut dengan isian manis (cokelat/kacang) dan gurih yang nikmat dikukus.'
                    },
                    {
                        id: 6,
                        name: 'Tempura Indomina',
                        category: 'seafood',
                        image: '/tempura_indomina.png',
                        desc: 'Olahan ikan khas tempura Indomina berbentuk memanjang dengan balutan tepung renyah keemasan gurih.'
                    },
                    {
                        id: 7,
                        name: 'Scallop Indomina',
                        category: 'seafood',
                        image: '/scallop_indomina.png',
                        desc: 'Olahan seafood berbentuk bulat rasa scallop gurih khas Indomina, siap goreng atau dicampur bakaran.'
                    },
                    {
                        id: 8,
                        name: 'Kentang Fiesta',
                        category: 'seafood',
                        image: '/kentang_fiesta.png',
                        desc: 'Kentang goreng beku premium Fiesta dengan potongan presisi, renyah di luar dan lembut di dalam.'
                    },
                    {
                        id: 9,
                        name: 'Kulit & Bungkus Kebab',
                        category: 'perlengkapan',
                        image: '/kulit_kebab.png',
                        desc: 'Tortilla kulit kebab berkualitas lentur tidak mudah sobek lengkap dengan kertas pembungkus kebab rapi.'
                    },
                    {
                        id: 10,
                        name: 'Cup Es Berbagai Ukuran',
                        category: 'perlengkapan',
                        image: '/cup_es.png',
                        desc: 'Gelas cup plastik es transparan higienis berbagai ukuran (12oz - 22oz) untuk usaha minuman dingin Anda.'
                    }
                ],
                init() {
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 20;
                    });
                },
                openChatWidget(initialMessage = null) {
                    // Dispatch an event to alpine chat widget to trigger opening and insert question
                    window.dispatchEvent(new CustomEvent('open-chat-widget', { detail: { message: initialMessage } }));
                },
                get filteredProducts() {
                    if (this.activeTab === 'semua') {
                        return this.products;
                    }
                    return this.products.filter(p => p.category === this.activeTab);
                }
            }
        }

        // Floating chat app
        function chatApp() {
            return {
                isOpen: false,
                newMessage: '',
                messages: [],
                isLoading: false,
                isNotifying: false,
                isRateLimited: false,
                showNotificationBadge: true,

                init() {
                    // Listens to global event to open chat widget and auto fill/send message
                    window.addEventListener('open-chat-widget', (e) => {
                        this.isOpen = true;
                        this.showNotificationBadge = false;
                        if (e.detail && e.detail.message) {
                            this.newMessage = e.detail.message;
                            this.sendMessage();
                        }
                    });
                    
                    // Smoothly pulse notification badge if user hasn't opened chat yet
                    setTimeout(() => {
                        if (!this.isOpen) {
                            this.showNotificationBadge = true;
                        }
                    }, 3000);
                },

                toggleChat() {
                    this.isOpen = !this.isOpen;
                    this.showNotificationBadge = false;
                    this.scrollToBottom();
                },

                parseMarkdown(content) {
                    return marked.parse(content);
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
                        const container = document.getElementById('chat-messages-container');
                        if (container) {
                            container.scrollTop = container.scrollHeight;
                        }
                    }, 50);
                },

                async notifyAdmin() {
                    this.isNotifying = true;
                    this.scrollToBottom();
                    try {
                        const response = await axios.post('/ai/notify-admin', {}, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });

                        this.messages.push({
                            role: 'system',
                            content: '🔔 **Notifikasi WA Terkirim!** Admin Toko Lancar Manunggal telah dipanggil via WhatsApp.'
                        });

                        // Simulate Admin entering the chat after 4 seconds to show visual takeover
                        setTimeout(() => {
                            this.messages.push({
                                role: 'system',
                                content: '💬 **Sistem:** Admin Toko Lancar Manunggal bergabung ke obrolan.'
                            });
                            this.messages.push({
                                role: 'assistant',
                                content: 'Halo! Saya Admin Lancar Manunggal. Ada yang bisa saya bantu secara langsung terkait pesanan atau kerja sama Anda? 😊'
                            });
                            this.scrollToBottom();
                        }, 4000);
                        
                    } catch (error) {
                        console.error('Error notifying admin:', error);
                        this.messages.push({
                            role: 'system',
                            content: '⚠️ Gagal memanggil admin. Silakan langsung hubungi WA kami di 085799352991.'
                        });
                    } finally {
                        this.isNotifying = false;
                        this.scrollToBottom();
                    }
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
                    this.isRateLimited = false;
                    this.scrollToBottom();

                    try {
                        const response = await axios.post('/ai/chat', {
                            message: messageText,
                            history: history.slice(0, -1) // Exclude current message from history to prevent payload duplication
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
                        
                        // Check if it's a rate limit error (status 500 containing rate limited text in response)
                        this.isRateLimited = true;
                        
                        this.messages.push({
                            role: 'assistant',
                            content: 'Maaf, layanan AI kami sedang sibuk atau batas kuota harian habis. Silakan klik tombol **"Panggil Admin"** di atas agar admin kami segera menjawab pertanyaan Anda via WhatsApp langsung!'
                        });
                    } finally {
                        this.isLoading = false;
                        this.scrollToBottom();
                    }
                }
            }
        }

        // Anime.js Entrance & Scroll Reveal Animations
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Play Hero Section animations immediately on page load
            // Animate Hero text elements (Left column) - Staggered words
            anime.timeline({ easing: 'easeOutExpo' })
                .add({
                    targets: '.hero-word',
                    translateY: [25, 0],
                    rotate: [4, 0],
                    opacity: [0, 1],
                    duration: 1000,
                    delay: anime.stagger(90) // Animates word-by-word beautifully!
                })
                .add({
                    targets: '.hero-subtitle',
                    translateX: [-40, 0],
                    opacity: [0, 1],
                    duration: 1000,
                    offset: '-=700'
                })
                .add({
                    targets: '.hero-cta',
                    scale: [0.85, 1],
                    opacity: [0, 1],
                    duration: 800,
                    offset: '-=750'
                });

            // Animate Hero backgrounds and main Image (Right column) - Pop and Elastic scale up
            anime({
                targets: '.hero-image-card',
                scale: [0.8, 1],
                opacity: [0, 1],
                rotate: [-4, 0],
                duration: 1800,
                easing: 'easeOutElastic(1, 0.75)',
                delay: 400
            });

            anime({
                targets: ['.hero-shape-1', '.hero-shape-2', '.hero-shape-3', '.hero-shape-4'],
                scale: [0.6, 1],
                opacity: [0, 0.95],
                duration: 1500,
                easing: 'easeOutExpo',
                delay: anime.stagger(150, {start: 300})
            });

            // 2. Setup Intersection Observer to trigger beautiful staggered Anime.js animations on scroll
            const reveals = document.querySelectorAll(".reveal");
            
            // Instantly hide the reveal child elements to prevent flash of content before animation
            reveals.forEach(reveal => {
                const animatable = reveal.querySelectorAll('.grid > div, .max-w-xl, h2, p, button, .flex-wrap');
                animatable.forEach(el => el.style.opacity = 0);
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Make sure the section container is visible
                        entry.target.style.opacity = 1;
                        
                        // Snappy staggered Anime.js fade & scale-in animation on direct contents
                        anime({
                            targets: entry.target.querySelectorAll('.grid > div, .max-w-xl, h2, p, button, .flex-wrap'),
                            translateY: [15, 0],
                            scale: [0.98, 1],
                            opacity: [0, 1],
                            duration: 500,
                            delay: anime.stagger(50),
                            easing: 'easeOutCubic'
                        });
                        
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.05,
                rootMargin: "0px 0px -80px 0px"
            });
            
            reveals.forEach(reveal => observer.observe(reveal));
        });
    </script>
</body>
</html>
