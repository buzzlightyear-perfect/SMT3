<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile['name'] }} — Portfolio Craft</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=press-start-2p:400" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=vt323:400" rel="stylesheet" />
    <style>
        body { font-family: 'VT323', monospace; font-size: 19px; }
        .pixel { font-family: 'Press Start 2P', monospace; }
        .pixel-img { image-rendering: pixelated; }
        .mc-block { border: 4px solid #111; box-shadow: 5px 5px 0 #111; image-rendering: pixelated; }
        .mc-btn { border: 4px solid #111; box-shadow: 4px 4px 0 #111; transition: transform .1s ease, box-shadow .1s ease; image-rendering: pixelated; }
        .mc-btn:hover { transform: translate(-1px,-1px); box-shadow: 5px 5px 0 #111; }
        .mc-btn:active { transform: translate(3px,3px); box-shadow: 1px 1px 0 #111; }
        .grass-top { background: repeating-linear-gradient(90deg,#4ade80 0 24px,#22c55e 24px 48px); height: 18px; border-bottom: 4px solid #111; }
        .dirt { background: repeating-linear-gradient(90deg,#92400e 0 24px,#78350f 24px 48px); }
        .stone { background: repeating-linear-gradient(90deg,#9ca3af 0 24px,#6b7280 24px 48px); }
        .planks { background: repeating-linear-gradient(0deg,#b45309 0 14px,#92400e 14px 16px); }
        /* sky + night */
        #world { background: linear-gradient(#7dd3fc 0%,#bae6fd 60%,#bbf7d0 60.5%,#86efac 100%); transition: background 1s ease; }
        #world.night { background: linear-gradient(#020617 0%,#1e1b4b 60%,#14532d 60.5%,#052e16 100%); }
        #world.night .day-only { display: none; }
        #world:not(.night) .night-only { display: none; }
        @keyframes drift { from { transform: translateX(-20%); } to { transform: translateX(120%); } }
        .cloud { position: absolute; background: #fff; border: 3px solid #111; opacity: .95; animation: drift linear infinite; }
        @keyframes bob { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .bob { animation: bob 2.4s ease-in-out infinite; }
        @keyframes steveJump { 0% { transform: translateY(0); } 40% { transform: translateY(-52px); } 100% { transform: translateY(0); } }
        .jumping { animation: steveJump .55s ease !important; }
        @keyframes fallBlock { 0% { transform: translateY(-80px) rotate(0); opacity: 0; } 15% { opacity: 1; } 100% { transform: translateY(60vh) rotate(200deg); opacity: 0; } }
        @keyframes barShine { from { background-position-x: 0; } to { background-position-x: 40px; } }
        .xp-fill { background: repeating-linear-gradient(90deg,#4ade80 0 10px,#22c55e 10px 20px); animation: barShine 1s linear infinite; width: 0; transition: width 1.2s cubic-bezier(.22,1,.36,1); }
        /* reveal */
        .reveal { opacity: 0; transform: translateY(30px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.visible { opacity: 1; transform: none; }
        .stagger > * { opacity: 0; transform: translateY(22px); transition: opacity .5s ease, transform .5s ease; }
        .stagger.visible > * { opacity: 1; transform: none; }
        .stagger.visible > *:nth-child(2) { transition-delay: .08s } .stagger.visible > *:nth-child(3) { transition-delay: .16s }
        .stagger.visible > *:nth-child(4) { transition-delay: .24s } .stagger.visible > *:nth-child(5) { transition-delay: .32s }
        .stagger.visible > *:nth-child(6) { transition-delay: .4s }
        @keyframes pop { 0% { transform: scale(.6); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
        .particle { position: absolute; font-size: 18px; pointer-events: none; animation: pop .5s ease forwards; }
        /* loader */
        #loader { transition: opacity .6s ease; }
        #loader.done { opacity: 0; pointer-events: none; }
        @keyframes blink { 50% { opacity: 0; } }
        .blink { animation: blink 1s step-start infinite; }
        @media (prefers-reduced-motion: reduce) {
            .cloud,.bob,.xp-fill { animation: none !important; }
            .reveal,.stagger>* { opacity: 1 !important; transform: none !important; transition: none !important; }
        }
    </style>
</head>
<body class="bg-[#1a120b] text-slate-900">

    <!-- LOADER : GENERATING WORLD -->
    <div id="loader" class="fixed inset-0 z-[100] dirt flex items-center justify-center p-5">
        <div class="absolute inset-0 overflow-hidden pointer-events-none" id="fallZone"></div>
        <div class="mc-block bg-[#f5f5f4] max-w-md w-full p-6 md:p-8 text-center relative">
            <div class="grass-top absolute top-0 left-0 right-0"></div>
            <div class="text-4xl mt-3">🟫</div>
            <h1 class="pixel text-sm md:text-base mt-3">PORTFOLIO CRAFT</h1>
            <p class="text-slate-500 mt-1">Generating world...</p>
            <div class="border-4 border-black bg-slate-200 h-8 mt-5 p-1">
                <div id="loadBar" class="xp-fill h-full" style="width:0%"></div>
            </div>
            <p class="pixel text-[10px] mt-3"><span id="loadPct">0</span>%</p>
            <p id="loadTip" class="text-slate-500 mt-1 h-6">Loading chunks...</p>
            <button id="skipBtn" class="mc-btn pixel text-[10px] bg-yellow-300 px-4 py-2.5 mt-3">SKIP ▼</button>
        </div>
    </div>

    <!-- NAV -->
    <nav class="sticky top-0 z-50 bg-[#211712] text-white border-b-4 border-black">
        <div class="grass-top"></div>
        <div class="max-w-6xl mx-auto px-4 py-2.5 flex items-center justify-between gap-3">
            <a href="#" class="pixel text-[11px] md:text-xs">⛏️ {{ $profile['name'] }}</a>
            <div class="hidden md:flex gap-5 text-lg">
                <a href="#about" class="hover:text-lime-300">About</a>
                <a href="#skills" class="hover:text-lime-300">Skills</a>
                <a href="#certs" class="hover:text-lime-300">Sertifikat</a>
                <a href="#projects" class="hover:text-lime-300">Projects</a>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-lg">❤️❤️❤️</span>
                <button id="dayNight" class="mc-btn bg-slate-700 text-white px-2.5 py-1 text-lg" title="Day/Night">🌙</button>
            </div>
        </div>
    </nav>

    <div id="world" class="relative">
        <!-- clouds + sun/moon -->
        <div class="relative h-0">
            <span class="cloud day-only" style="top:26px; width:110px; height:26px; animation-duration:38s;"></span>
            <span class="cloud day-only" style="top:70px; width:70px; height:20px; animation-duration:28s; animation-delay:-10s;"></span>
            <div class="day-only absolute right-8 top-6 w-14 h-14 bg-yellow-300 border-4 border-black"></div>
            <div class="night-only absolute right-8 top-6 w-14 h-14 bg-slate-200 border-4 border-black"></div>
            <div class="night-only absolute inset-x-0 top-0 text-center text-white text-xl tracking-widest">✦ ✧ ✦ ✧ ✦ ✧ ✦</div>
        </div>

        <!-- HERO -->
        <header class="max-w-6xl mx-auto px-4 pt-16 pb-8 grid md:grid-cols-2 gap-8 items-center">
            <div class="mc-block bg-[#f5f5f4]/95 p-6 md:p-8">
                <p class="pixel text-[10px] bg-green-600 text-white inline-block px-2 py-1.5">● {{ $profile['status'] }}</p>
                <h1 class="pixel text-xl md:text-3xl leading-relaxed mt-4">Halo,<br>saya {{ $profile['name'] }}!</h1>
                <p class="text-xl text-green-700 mt-2">{{ $profile['title'] }}</p>
                <p class="text-slate-600 text-xl mt-2">{{ $profile['tagline'] }}</p>
                <div class="flex flex-wrap gap-3 mt-5">
                    <a href="#projects" class="mc-btn pixel text-[10px] bg-green-500 text-white px-4 py-3">▶ MULAI PETUALANGAN</a>
                    <a href="#certs" class="mc-btn pixel text-[10px] bg-yellow-300 px-4 py-3">📜 SERTIFIKAT</a>
                </div>
                <div class="mt-5 border-4 border-black bg-slate-200 h-7 p-1">
                    <div class="xp-fill h-full" data-xp="85"></div>
                </div>
                <p class="text-lg text-slate-500">LVL 12 — Web Developer ▮▮▮▮▮▮▮▮▯▯</p>
            </div>
            <div class="flex justify-center">
                <div id="steveZone" class="relative cursor-pointer select-none text-center" title="Klik Steve!">
                    {{-- FOTO PROFIL: simpan file di public/images/profile.jpg --}}
                    {{-- Kalau file belum ada, otomatis tampil Steve CSS di bawah --}}
                    <div class="mc-block bg-[#f5f5f4] p-2 w-64 md:w-72">
                        <img src="{{ asset($profile['photo']) }}"
                             alt="Foto {{ $profile['name'] }}"
                             class="pixel-img w-full h-64 md:h-72 object-cover border-4 border-black bg-stone-300"
                             onerror="this.style.display='none';document.getElementById('steveFallback').style.display='block';" />
                        <div id="steveFallback" style="display:none">
                            <div id="steve" class="bob">
                                <!-- kepala -->
                                <div class="mx-auto w-32 h-28 border-4 border-black" style="background:linear-gradient(#3b2f2f 0 28%,#eab892 28% 100%)">
                                    <div class="flex justify-center gap-4 pt-12">
                                        <span class="w-4 h-4 bg-white border-2 border-black"><span class="block w-2 h-2 bg-blue-700 ml-1 mt-1"></span></span>
                                        <span class="w-4 h-4 bg-white border-2 border-black"><span class="block w-2 h-2 bg-blue-700 ml-1 mt-1"></span></span>
                                    </div>
                                </div>
                                <!-- badan -->
                                <div class="mx-auto w-36 h-28 bg-cyan-500 border-4 border-black border-t-0"></div>
                                <!-- kaki -->
                                <div class="mx-auto w-36 flex">
                                    <div class="flex-1 h-24 bg-blue-800 border-4 border-black border-t-0"></div>
                                    <div class="flex-1 h-24 bg-blue-800 border-4 border-black border-t-0 border-l-0"></div>
                                </div>
                            </div>
                        </div>
                        <p class="pixel text-[10px] bg-black text-lime-300 mt-2 px-2 py-1.5 border-2 border-black">{{ $profile['name'] }}</p>
                    </div>
                    <p class="pixel text-[10px] text-center mt-3 bg-black/70 text-white inline-block px-2 py-1.5">klik aku! <span class="blink">▼</span></p>
                </div>
            </div>
        </header>

        <!-- ground divider -->
        <div class="grass-top"></div>
        <div class="dirt h-6 border-b-4 border-black"></div>

        <main class="max-w-6xl mx-auto px-4 py-12 space-y-12">

            <!-- ABOUT ME -->
            <section id="about" class="reveal scroll-mt-28 grid md:grid-cols-3 gap-6">
                <div class="md:col-span-2 mc-block planks p-6 md:p-8 text-[#fef3c7]">
                    <h2 class="pixel text-sm md:text-base">📜 ABOUT ME</h2>
                    @foreach ($about as $p)
                    <p class="text-xl mt-4 leading-snug">{{ $p }}</p>
                    @endforeach
                </div>
                <div class="mc-block bg-[#f5f5f4] p-6">
                    <h3 class="pixel text-[11px]">🎒 INVENTORY INFO</h3>
                    <ul class="text-xl mt-4 space-y-2">
                        <li>📍 {{ $profile['location'] }}</li>
                        <li>🎓 {{ $profile['education'] }}</li>
                        <li>📧 {{ $profile['email'] }}</li>
                        <li>💼 {{ $profile['status'] }}</li>
                    </ul>
                </div>
            </section>

            <!-- SKILLS -->
            <section id="skills" class="reveal scroll-mt-28">
                <h2 class="pixel text-sm md:text-base text-white bg-black/60 inline-block px-3 py-2">⚔️ SKILLS — XP LEVELS</h2>
                <div class="stagger grid md:grid-cols-3 gap-5 mt-5">
                    @foreach ($skills as $s)
                    <div class="mc-block bg-[#f5f5f4] p-5">
                        <div class="flex justify-between items-center">
                            <span class="text-2xl">{{ $s['icon'] }} {{ $s['name'] }}</span>
                            <span class="pixel text-[10px] bg-green-600 text-white px-2 py-1">LVL {{ $s['level'] }}</span>
                        </div>
                        <div class="border-4 border-black bg-slate-200 h-6 mt-3 p-0.5">
                            <div class="xp-fill h-full" data-xp="{{ $s['level'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- SERTIFIKAT -->
            <section id="certs" class="reveal scroll-mt-28">
                <h2 class="pixel text-sm md:text-base text-white bg-black/60 inline-block px-3 py-2">🏆 SERTIFIKAT — ACHIEVEMENTS</h2>
                <div class="stagger grid md:grid-cols-3 gap-5 mt-5">
                    @foreach ($certificates as $c)
                    <div class="mc-block bg-[#292524] text-white p-5 hover:bg-[#44403c] transition">
                        <p class="pixel text-[10px] text-yellow-300">ACHIEVEMENT GET!</p>
                        <div class="text-5xl mt-3">{{ $c['icon'] }}</div>
                        <div class="text-2xl font-bold mt-2">{{ $c['title'] }}</div>
                        <div class="text-xl text-stone-400">{{ $c['by'] }} • {{ $c['year'] }}</div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- BUILT PROJECTS -->
            <section id="projects" class="reveal scroll-mt-28">
                <h2 class="pixel text-sm md:text-base text-white bg-black/60 inline-block px-3 py-2">🧰 BUILT PROJECTS — CHEST</h2>
                <p class="text-white/80 text-xl mt-2">6 bangunan selesai — klik slot untuk melihat.</p>
                <div class="stagger grid md:grid-cols-3 gap-5 mt-5">
                    @foreach ($projects as $p)
                    <article class="mc-block bg-[#f5f5f4] overflow-hidden hover:-translate-y-1 transition">
                        {{-- FOTO PROJECT: public/images/projects/*.jpg — kalau belum ada, tampil icon --}}
                        <div class="h-44 border-b-4 border-black bg-stone-300 relative overflow-hidden">
                            <img src="{{ asset($p['photo']) }}" alt="{{ $p['title'] }}" loading="lazy"
                                 class="pixel-img w-full h-full object-cover"
                                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                            <div class="stone absolute inset-0 items-center justify-center text-5xl" style="display:none">{{ $p['icon'] }}</div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-2xl font-bold">{{ $p['title'] }}</h3>
                            <p class="text-xl text-slate-500">{{ $p['desc'] }}</p>
                            <div class="flex flex-wrap gap-1.5 mt-3">
                                @foreach ($p['tech'] as $t)
                                <span class="pixel text-[9px] bg-slate-200 border-2 border-black px-2 py-1">{{ $t }}</span>
                                @endforeach
                            </div>
                            <div class="flex gap-2 mt-4">
                                <a href="#" class="mc-btn flex-1 text-center pixel text-[9px] bg-green-500 text-white py-2.5">DEMO</a>
                                <a href="#" class="mc-btn flex-1 text-center pixel text-[9px] bg-white py-2.5">CODE</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>

        </main>

        <div class="stone h-8 border-t-4 border-black"></div>
        <footer class="bg-[#211712] text-stone-300 border-t-4 border-black">
            <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col md:flex-row justify-between gap-2 text-xl">
                <span>© 2026 {{ $profile['name'] }} — Built with ⛏️ + Laravel.</span>
                <span>Tugas PWL SMT 3 • Minecraft Edition</span>
            </div>
        </footer>
    </div>

    <script>
        // ===== LOADER : GENERATING WORLD =====
        const loader = document.getElementById('loader');
        const bar = document.getElementById('loadBar');
        const pct = document.getElementById('loadPct');
        const tip = document.getElementById('loadTip');
        const tips = ['Loading chunks...', 'Spawning mobs...', 'Building terrain...', 'Crafting portfolio...'];
        const zone = document.getElementById('fallZone');
        ['🟫', '🟩', '⬜', '🟨'].forEach((b, i) => {
            const s = document.createElement('span');
            s.textContent = b; s.style.cssText = `position:absolute;top:0;left:${15 + i * 22}%;font-size:34px;animation:fallBlock 1.8s ease-in infinite;animation-delay:${i * 0.35}s`;
            zone.appendChild(s);
        });
        let p = 0, ti = 0;
        const tipTimer = setInterval(() => { ti = (ti + 1) % tips.length; tip.textContent = tips[ti]; }, 700);
        const loadTimer = setInterval(() => {
            p = Math.min(p + Math.random() * 14, 100);
            bar.style.width = p + '%'; pct.textContent = Math.floor(p);
            if (p >= 100) finish();
        }, 220);
        function finish() {
            clearInterval(loadTimer); clearInterval(tipTimer);
            setTimeout(() => loader.classList.add('done'), 350);
            setTimeout(() => loader.remove(), 1100);
        }
        document.getElementById('skipBtn').addEventListener('click', finish);
        setTimeout(() => { if (document.body.contains(loader)) finish(); }, 6000);

        // ===== REVEAL + XP BARS =====
        const io = new IntersectionObserver((es) => {
            es.forEach(e => {
                if (!e.isIntersecting) return;
                e.target.classList.add('visible');
                e.target.querySelectorAll('[data-xp]').forEach(b => b.style.width = b.dataset.xp + '%');
                io.unobserve(e.target);
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('.reveal,.stagger').forEach(el => io.observe(el));
        document.querySelectorAll('header [data-xp]').forEach(b => setTimeout(() => b.style.width = b.dataset.xp + '%', 3200));

        // ===== PHOTO FRAME JUMP + PARTICLES (tetap jalan walau foto terpasang) =====
        const steve = document.getElementById('steve');
        const steveZone = document.getElementById('steveZone');
        steveZone?.addEventListener('click', (ev) => {
            const target = steve?.offsetParent ? steve : steveZone;
            target.classList.remove('jumping'); void target.offsetWidth; target.classList.add('jumping');
            ['🟩', '🟫', '✦'].forEach((t, i) => {
                const s = document.createElement('span');
                s.className = 'particle'; s.textContent = t;
                s.style.left = (ev.offsetX + i * 18 - 20) + 'px'; s.style.top = '-10px';
                ev.currentTarget.appendChild(s);
                setTimeout(() => s.remove(), 500);
            });
        });

        // ===== DAY / NIGHT =====
        const world = document.getElementById('world');
        const dn = document.getElementById('dayNight');
        dn.addEventListener('click', () => {
            world.classList.toggle('night');
            dn.textContent = world.classList.contains('night') ? '☀️' : '🌙';
        });
    </script>
</body>
</html>
