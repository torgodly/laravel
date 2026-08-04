<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unrecognized Domain | Beacon</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Custom Brand Palette Configuration -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            cyan: {
              400: '#22D0E8',
              500: '#06C8E0',
              600: '#04A3BC',
            },
            slate: {
              1000: '#05131E',
              900: '#1C2D3F',
              800: '#263647',
              700: '#364554',
              500: '#5C7085',
              300: '#AEBECC',
              100: '#E8EEF3',
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-slate-1000 text-slate-100 h-full flex flex-col justify-between antialiased selection:bg-cyan-500 selection:text-slate-1000 font-sans">

  <!-- Ambient Top Radial Glow -->
  <div class="fixed inset-0 pointer-events-none bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(6,200,224,0.12),rgba(5,19,30,0))]"></div>

  <!-- Header / Logo Bar -->
  <header class="relative z-10 w-full max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <!-- Beacon Logo -->
      <img 
        src="{{asset('logo.png')}}" 
        alt="Beacon Logo" 
        class="h-8 w-auto object-contain" 
        onerror="this.style.display='none'; document.getElementById('fallback-logo').style.display='flex';"
      />
      <!-- Fallback Badge if logo.png is missing -->
      <div id="fallback-logo" class="hidden h-8 w-8 rounded-lg bg-cyan-500/10 border border-cyan-500/20 items-center justify-center">
        <span class="h-2.5 w-2.5 rounded-full bg-cyan-500 shadow-[0_0_10px_#06C8E0] animate-pulse"></span>
      </div>
      <span class="font-bold text-lg tracking-tight text-white">Beacon</span>
    </div>

    <!-- Server Status Indicator -->
    <div class="flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900/80 border border-slate-800 text-xs text-slate-300 shadow-sm">
      <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
      <span class="font-medium">Server Online</span>
    </div>
  </header>

  <!-- Main Card Container -->
  <main class="relative z-10 my-auto px-6 py-12 flex flex-col items-center justify-center text-center">
    <div class="max-w-md w-full bg-slate-900/70 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-8 shadow-2xl shadow-slate-1000/80">
      
      <!-- Icon Indicator -->
      <div class="mx-auto w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(6,200,224,0.15)]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>

      <!-- Title & Subtitle -->
      <h1 class="text-2xl font-bold text-white tracking-tight mb-2">
        Unrecognized Domain
      </h1>
      <p class="text-slate-300 text-sm leading-relaxed mb-6">
        This server is running, but no application is currently configured to handle requests for this domain.
      </p>

      <!-- Requested Hostname Box -->
      <div class="bg-slate-1000/90 border border-slate-800 rounded-xl p-3.5 mb-6 text-left flex items-center justify-between">
        <div class="flex items-center gap-2.5 overflow-hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m-9 9a9 9 0 019-9" />
          </svg>
          <span id="hostname-display" class="font-mono text-xs text-cyan-400 font-semibold truncate">loading...</span>
        </div>
        <span class="text-[10px] uppercase font-mono px-2 py-0.5 rounded bg-slate-800/80 text-slate-400 font-medium shrink-0">Unbound</span>
      </div>

      <!-- Admin Instructions -->
      <div class="text-xs text-slate-400 leading-relaxed border-t border-slate-800/80 pt-5 text-left space-y-1.5">
        <p class="font-medium text-slate-200">Are you the server administrator?</p>
        <p>Log into your <strong class="text-slate-200">Beacon Control Panel</strong> to attach this domain under <span class="font-mono text-cyan-400 font-medium">Sites &rarr; Domains</span>.</p>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="relative z-10 w-full max-w-6xl mx-auto px-6 py-6 text-center text-xs text-slate-500">
    <p>Powered by <span class="text-slate-300 font-medium">Beacon</span> &middot; Illuminate Your Infrastructure</p>
  </footer>

  <!-- Inline Script to Parse Hostname Dynamically -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const hostname = window.location.hostname || 'unconfigured-domain.com';
      document.getElementById('hostname-display').textContent = hostname;
    });
  </script>
</body>
</html>