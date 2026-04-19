<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Property Maintenance</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Montserrat',_sans-serif] bg-slate-950 text-white overflow-hidden h-screen w-screen selection:bg-amber-500 selection:text-slate-900 flex flex-col">

    <div class="relative z-50">
        @include('layouts.navigation')
    </div>

    <canvas id="three-canvas" class="fixed inset-0 z-0 pointer-events-auto"></canvas>

    <div class="relative z-10 flex-grow flex items-center justify-center w-full px-4 sm:px-6 lg:px-8 pointer-events-none">
        
        <div class="w-full max-w-md pointer-events-auto mb-10">
            
            <div class="text-center mb-8 drop-shadow-lg">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-500 mb-4 shadow-[0_0_30px_rgba(245,158,11,0.5)] rounded-sm">
                    <i data-lucide="lock" class="w-8 h-8 text-slate-900 stroke-[2]"></i>
                </div>
                <h2 class="text-3xl font-black uppercase tracking-widest text-white">Authorized <span class="text-amber-500">Access</span></h2>
                <p class="text-gray-400 text-sm mt-2 font-medium tracking-wide">Secure portal for staff & management</p>
            </div>

            <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 p-8 sm:p-10 rounded-sm shadow-[0_8px_32px_rgba(0,0,0,0.8)] relative overflow-hidden">
                
                <div class="absolute top-0 left-0 w-full h-1.5 opacity-80" style="background-image: repeating-linear-gradient(-45deg, #f59e0b 0, #f59e0b 10px, #0f172a 10px, #0f172a 20px);"></div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i> Email Address
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs font-bold" />
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                            <i data-lucide="key" class="w-4 h-4"></i> Password
                        </label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                               class="block w-full bg-slate-950/50 border border-slate-700 text-white placeholder-gray-500 focus:border-amber-500 focus:ring-amber-500 rounded-sm shadow-inner transition-colors px-4 py-3">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs font-bold" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded-sm bg-slate-900 border-slate-600 text-amber-500 focus:ring-amber-500/50 cursor-pointer">
                            <span class="ms-2 text-xs font-bold text-gray-400 uppercase tracking-wider group-hover:text-amber-500 transition-colors">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-xs font-bold text-amber-500 uppercase tracking-wider hover:text-white transition-colors underline decoration-amber-500/30 underline-offset-4" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full inline-flex justify-center items-center gap-3 rounded-sm bg-amber-500 px-8 py-3.5 text-sm font-black text-slate-900 shadow-[4px_4px_0px_0px_#475569] hover:shadow-[2px_2px_0px_0px_#475569] hover:translate-x-[2px] hover:translate-y-[2px] transition-all duration-200 uppercase tracking-widest mt-6">
                        Log In <i data-lucide="log-in" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        lucide.createIcons();

        // 1. Scene Setup
        const canvas = document.querySelector('#three-canvas');
        const scene = new THREE.Scene();
        scene.fog = new THREE.FogExp2(0x020617, 0.035);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // 2. Voxel Block Generation
        const geometry = new THREE.BoxGeometry(1.2, 1.2, 1.2);
        const material = new THREE.MeshStandardMaterial({
            color: 0x334155, 
            roughness: 0.1,
            metalness: 0.8,
            emissive: 0x000000,
        });

        const accentMaterial = new THREE.MeshStandardMaterial({
            color: 0xf59e0b, 
            roughness: 0.3,
            metalness: 0.9,
            emissive: 0xf59e0b,
            emissiveIntensity: 0.2
        });

        const blocks = [];
        for(let i = 0; i < 150; i++) {
            const isAccent = Math.random() > 0.9;
            const mesh = new THREE.Mesh(geometry, isAccent ? accentMaterial : material);
            
            mesh.position.set(
                (Math.random() - 0.5) * 60,
                (Math.random() - 0.5) * 60,
                (Math.random() - 0.5) * 40 - 15
            );
            
            mesh.rotation.set(Math.random() * Math.PI, Math.random() * Math.PI, 0);
            
            mesh.userData = {
                rx: (Math.random() - 0.5) * 0.01,
                ry: (Math.random() - 0.5) * 0.01,
                yVel: Math.random() * 0.015 + 0.005
            };
            
            scene.add(mesh);
            blocks.push(mesh);
        }

        // 3. Dynamic Lighting
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);
        
        const pointLight1 = new THREE.PointLight(0xf59e0b, 3, 50);
        pointLight1.position.set(10, 10, 5);
        scene.add(pointLight1);
        
        const pointLight2 = new THREE.PointLight(0x0ea5e9, 2, 50); 
        pointLight2.position.set(-10, -10, 5);
        scene.add(pointLight2);

        camera.position.z = 5;

        // 4. Parallax Mouse Interaction
        let mouseX = 0;
        let mouseY = 0;
        let targetX = 0;
        let targetY = 0;
        const windowHalfX = window.innerWidth / 2;
        const windowHalfY = window.innerHeight / 2;

        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - windowHalfX);
            mouseY = (e.clientY - windowHalfY);
        });

        // 5. Render Loop
        const animate = () => {
            requestAnimationFrame(animate);

            blocks.forEach(b => {
                b.rotation.x += b.userData.rx;
                b.rotation.y += b.userData.ry;
                b.position.y += b.userData.yVel;

                if(b.position.y > 30) {
                    b.position.y = -30;
                    b.position.x = (Math.random() - 0.5) * 60;
                }
            });

            targetX = mouseX * 0.003;
            targetY = mouseY * 0.003;
            camera.position.x += (targetX - camera.position.x) * 0.05;
            camera.position.y += (-targetY - camera.position.y) * 0.05;
            camera.lookAt(scene.position);

            renderer.render(scene, camera);
        };
        
        animate();

        // 6. Handle Window Resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
</body>
</html>