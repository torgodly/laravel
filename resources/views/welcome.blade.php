<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beacon — Self-Hosted VPS Control Panel & PaaS</title>
  <meta name="description" content="Turn any Ubuntu VPS into a high-performance self-hosted PaaS for Laravel, Next.js, Nuxt, and Static apps natively without Docker bloat.">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Custom Brand Palette Configuration -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            cyan: {
              400: '#22D0E8',
              500: '#06C8E0',
              600: '#04A3BC',
              900: '#063543',
            },
            slate: {
              1000: '#05131E',
              900: '#1C2D3F',
              800: '#263647',
              700: '#364554',
              500: '#5C7085',
              300: '#AEBECC',
              100: '#E8EEF3',
              50: '#F5F8FA',
            },
            violet: {
              500: '#8B5CF6',
              900: '#2E1065',
            },
            green: {
              500: '#21C55D',
              900: '#052E16',
            }
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
            mono: ['JetBrains Mono', 'Geist Mono', 'Menlo', 'monospace'],
          }
        }
      }
    }
  </script>
  
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@jetbrains/mono/css/jetbrains-mono.css">
</head>
<body class="bg-slate-1000 text-slate-100 font-sans antialiased selection:bg-cyan-500 selection:text-slate-1000 min-h-full flex flex-col justify-between">

  <!-- Ambient Top Radial Background Glow -->
  <div class="fixed inset-0 pointer-events-none bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(6,200,224,0.12),rgba(5,19,30,0))]"></div>

  <!-- ─── NAVIGATION BAR ─── -->
  <nav class="relative z-50 w-full max-w-7xl mx-auto px-6 py-5 flex items-center justify-between border-b border-slate-800/60">
    <div class="flex items-center gap-3">
      <!-- Logo -->
      <img src="{{asset('images/logo.png')}}" alt="Beacon Logo" class="h-8 w-auto object-contain" onerror="this.style.display='none'; document.getElementById('nav-fallback-logo').style.display='flex';" />
      <div id="nav-fallback-logo" class="hidden h-8 w-8 rounded-lg bg-cyan-500/10 border border-cyan-500/20 items-center justify-center">
        <span class="h-2.5 w-2.5 rounded-full bg-cyan-500 shadow-[0_0_10px_#06C8E0] animate-pulse"></span>
      </div>
      <span class="font-bold text-xl tracking-tight text-white">Beacon</span>
      <span class="ml-2 text-[10px] font-mono px-2 py-0.5 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-medium">v1.0 LTS</span>
    </div>

    <!-- Nav Links -->
    <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
      <a href="#features" class="hover:text-cyan-400 transition-colors">Features</a>
      <a href="#architecture" class="hover:text-cyan-400 transition-colors">Architecture</a>
      <a href="#frameworks" class="hover:text-cyan-400 transition-colors">Frameworks</a>
      <a href="#comparison" class="hover:text-cyan-400 transition-colors">Comparison</a>
      <a href="#install" class="hover:text-cyan-400 transition-colors">Installation</a>
    </div>

    <!-- Action CTA -->
    <div class="flex items-center gap-4">
      <a href="https://github me/beacon" target="_blank" class="hidden sm:inline-flex items-center gap-2 text-xs font-medium px-3.5 py-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-300 hover:text-white hover:border-slate-700 transition-all">
        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 4.335 9.747 10 11.238.6.105.825-.255.825-.57 0-.285-.015-1.23-.03-2.235-4.17.72-5.145-1.02-5.475-1.95-.18-.465-.96-1.95-1.635-2.325-.555-.3-1.335-.855-.03-.87.123 0 2.22 2.025 2.535 2.52.72 1.215 1.875.87 2.34.66.075-.525.285-.87.51-1.065-3.645-.405-7.485-1.83-7.485-8.115 0-1.785.195-3.255 1.77-4.41-.165-.42-.765-2.115.165-4.35 0 0 1.38-.435 4.5 1.68 1.32-.36 2.715-.54 4.11-.54s2.79.18 4.11.54c3.12-2.115 4.5-1.68 4.5-1.68.93 2.235.33 3.93.165 4.35 1.575 1.155 1.77 2.625 1.77 4.41 0 6.3-3.855 7.71-7.5 8.115.3.255.555.765.555 1.545 0 1.11-.015 2.01-.015 2.28 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
        <span>GitHub</span>
      </a>
      <a href="#install" class="bg-cyan-500 hover:bg-cyan-400 text-slate-1000 font-semibold text-xs px-4 py-2.5 rounded-lg shadow-[0_0_16px_rgba(6,200,224,0.25)] transition-all active:scale-95">
        Install Panel
      </a>
    </div>
  </nav>

  <!-- ─── HERO SECTION ─── -->
  <section class="relative z-10 pt-20 pb-16 px-6 max-w-7xl mx-auto text-center">
    <!-- Live Status Pill -->
    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/80 border border-slate-800 text-xs font-medium text-slate-300 mb-8 shadow-sm">
      <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
      <span>Native Ubuntu Execution &middot; Zero Docker Overhead</span>
    </div>

    <!-- Main Headline -->
    <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-[1.15]">
      Illuminate Your Infrastructure with <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-cyan-500">Complete Control</span>.
    </h1>

    <p class="mt-6 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
      Turn any Ubuntu VPS into a high-performance self-hosted PaaS. Deploy Laravel, Next.js, Nuxt, and Static apps natively in under 5 minutes without touching SSH.
    </p>

    <!-- 1-Line Installer Terminal Box -->
    <div class="mt-10 max-w-2xl mx-auto">
      <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-3.5 flex items-center justify-between shadow-2xl shadow-slate-1000/80 group">
        <div class="flex items-center gap-3 overflow-hidden">
          <span class="text-cyan-400 font-mono select-none">$</span>
          <code class="font-mono text-xs sm:text-sm text-slate-100 truncate" id="install-command">curl -sSL https://getbeacon.dev/install.sh | sudo bash</code>
        </div>
        <button onclick="copyInstallCommand()" class="shrink-0 ml-4 px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs font-medium text-cyan-400 border border-slate-700 transition-all flex items-center gap-1.5">
          <svg id="copy-icon" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
          <span id="copy-text">Copy</span>
        </button>
      </div>
      <p class="mt-2.5 text-[11px] font-mono text-slate-500">Supports Ubuntu 24.04 LTS & 22.04 LTS &middot; Free & Open Source</p>
    </div>

    <!-- ─── INTERACTIVE HERO DEMO TERMINAL ─── -->
    <div class="mt-16 max-w-5xl mx-auto bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-2xl overflow-hidden shadow-2xl shadow-slate-1000/90 text-left">
      <!-- Terminal Header Bar -->
      <div class="bg-slate-1000/80 px-4 py-3 border-b border-slate-800 flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span class="h-3 w-3 rounded-full bg-red-500/80"></span>
          <span class="h-3 w-3 rounded-full bg-amber-500/80"></span>
          <span class="h-3 w-3 rounded-full bg-green-500/80"></span>
          <span class="ml-2 font-mono text-xs text-slate-400">beacon-executor --site=app.rosheta.ly</span>
        </div>
        <div class="flex items-center gap-2 font-mono text-[11px]">
          <span class="px-2 py-0.5 rounded bg-violet-500/10 text-violet-400 border border-violet-500/20">Building</span>
          <span class="text-slate-500">00:04.28</span>
        </div>
      </div>

      <!-- Live Terminal Output Stream -->
      <div class="p-5 font-mono text-xs sm:text-sm space-y-2.5 bg-slate-1000/90 leading-relaxed text-slate-300">
        <div class="text-slate-500">[10:27:12] <span class="text-cyan-400">INFO</span> Initiating atomic deployment for app.rosheta.ly (branch: main)...</div>
        <div class="text-slate-500">[10:27:13] <span class="text-cyan-400">GIT</span> Synchronizing repository commit <span class="text-slate-100">f3b0740</span>...</div>
        <div class="text-slate-500">[10:27:14] <span class="text-cyan-400">COMPOSER</span> Running composer install --no-interaction --optimize-autoloader...</div>
        <div class="text-slate-400 pl-4">&gt; Generating optimized autoload files (PHP 8.4-FPM)</div>
        <div class="text-slate-500">[10:27:15] <span class="text-cyan-400">MIGRATE</span> Running artisan migrate --force...</div>
        <div class="text-green-400 pl-4">&check; 2026_08_03_000000_create_deployments_table (4.12ms)</div>
        <div class="text-slate-500">[10:27:16] <span class="text-cyan-400">NGINX</span> Validating configuration (`sudo nginx -t`)...</div>
        <div class="text-green-400 pl-4">&check; nginx: configuration file /etc/nginx/nginx.conf test is successful</div>
        <div class="text-slate-500">[10:27:16] <span class="text-cyan-400">SUPERVISOR</span> Sending SIGTERM to worker queues... done.</div>
        <div class="pt-2 text-green-400 font-semibold border-t border-slate-800/80 flex items-center gap-2">
          <span class="h-2 w-2 rounded-full bg-green-500"></span>
          <span>SUCCESS: Deployment #7459 completed in 4.28s. Zero downtime.</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ─── METRICS & TRUST BAR ─── -->
  <section class="border-y border-slate-800/60 bg-slate-900/30 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
      <div>
        <div class="text-3xl font-bold font-mono text-cyan-400">&lt; 50 MB</div>
        <div class="text-xs text-slate-400 mt-1 font-medium">Panel RAM Footprint</div>
      </div>
      <div>
        <div class="text-3xl font-bold font-mono text-white">0%</div>
        <div class="text-xs text-slate-400 mt-1 font-medium">Docker Overhead</div>
      </div>
      <div>
        <div class="text-3xl font-bold font-mono text-cyan-400">120s</div>
        <div class="text-xs text-slate-400 mt-1 font-medium">Command Execution Timeout</div>
      </div>
      <div>
        <div class="text-3xl font-bold font-mono text-white">100%</div>
        <div class="text-xs text-slate-400 mt-1 font-medium">Data & Code Ownership</div>
      </div>
    </div>
  </section>

  <!-- ─── FEATURE GRID ─── -->
  <section id="features" class="py-24 px-6 max-w-7xl mx-auto">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h2 class="text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400">Engineered for Developers</h2>
      <p class="text-3xl sm:text-4xl font-extrabold text-white mt-2 tracking-tight">Everything you need. Nothing you don't.</p>
      <p class="text-slate-400 mt-4 text-sm sm:text-base">Built natively on Linux without bloated containerization layers, giving your applications 100% bare-metal performance.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Feature 1 -->
      <div class="bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(6,200,224,0.1)] transition-all">
        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-5">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">Native OS Performance</h3>
        <p class="text-xs text-slate-300 leading-relaxed">No Docker or container virtualization overhead. Apps run natively on Ubuntu via PHP-FPM, Node.js, Bun, Nginx, and MySQL 8.4 LTS.</p>
      </div>

      <!-- Feature 2 -->
      <div class="bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(6,200,224,0.1)] transition-all">
        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-5">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">Crash-Proof Nginx Guard</h3>
        <p class="text-xs text-slate-300 leading-relaxed">Every Nginx configuration edit is auto-validated with `sudo nginx -t` before reloading. Syntax errors are blocked and rolled back automatically.</p>
      </div>

      <!-- Feature 3 -->
      <div class="bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(6,200,224,0.1)] transition-all">
        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-5">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">GitHub App Manifest Flow</h3>
        <p class="text-xs text-slate-300 leading-relaxed">Connect GitHub in 1-click. Includes repository/branch dropdown pickers, deployment commit status checkmarks, and auto-deploy on push.</p>
      </div>

      <!-- Feature 4 -->
      <div class="bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(6,200,224,0.1)] transition-all">
        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-5">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">cPanel-Style PHP Manager</h3>
        <p class="text-xs text-slate-300 leading-relaxed">Toggle PHP versions (8.1 through 8.4) per site. Enable or disable extension modules (`imagick`, `redis`, `swoole`) with checkboxes and debounced restarts.</p>
      </div>

      <!-- Feature 5 -->
      <div class="bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(6,200,224,0.1)] transition-all">
        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-5">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">1-Click SSL Certificates</h3>
        <p class="text-xs text-slate-300 leading-relaxed">Integrated Certbot Let's Encrypt engine. Issue, renew, and manage SSL certificates per domain with automated HTTP to HTTPS 301 redirects.</p>
      </div>

      <!-- Feature 6 -->
      <div class="bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 hover:border-cyan-500/40 hover:shadow-[0_0_20px_rgba(6,200,224,0.1)] transition-all">
        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-5">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        </div>
        <h3 class="text-lg font-bold text-white mb-2">Supervisor & Cron Control</h3>
        <p class="text-xs text-slate-300 leading-relaxed">Pre-configured forms for Laravel Queue Workers and Next.js SSR daemons. Managed crontab block with 1-click `schedule:run` attachment.</p>
      </div>
    </div>
  </section>

  <!-- ─── ARCHITECTURE SECTION ─── -->
  <section id="architecture" class="py-20 border-t border-slate-800/60 bg-slate-900/20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400">Security Architecture</h2>
          <h3 class="text-3xl font-extrabold text-white mt-2 tracking-tight">Isolated 2-User Security Model</h3>
          <p class="text-slate-300 text-sm mt-4 leading-relaxed">
            Most self-hosted panels make the mistake of running hosted sites under the same system user as the panel itself. A remote code execution (RCE) on a hosted site compromises the entire control panel.
          </p>
          
          <div class="mt-8 space-y-4 font-mono text-xs">
            <div class="p-4 rounded-xl bg-slate-1000 border border-slate-800 flex items-start gap-3">
              <span class="px-2 py-0.5 rounded bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold shrink-0">beacon-panel</span>
              <div class="text-slate-300">Control layer user. Owns panel SQLite database. Executes restricted root wrapper scripts via `/etc/sudoers.d/beacon-panel`.</div>
            </div>
            <div class="p-4 rounded-xl bg-slate-1000 border border-slate-800 flex items-start gap-3">
              <span class="px-2 py-0.5 rounded bg-slate-800 text-slate-300 border border-slate-700 font-bold shrink-0">beacon</span>
              <div class="text-slate-300">Site workload user (`2750 beacon:www-data`). Runs FPM pools, git clones, composer, npm, and cron. <strong class="text-red-400">Holds ZERO sudo rights.</strong></div>
            </div>
          </div>
        </div>

        <div class="bg-slate-1000 border border-slate-800 rounded-2xl p-6 font-mono text-xs text-slate-300 space-y-3">
          <div class="text-slate-500 border-b border-slate-800 pb-3 font-bold text-slate-400">Restricted Root Sudo Wrappers (/opt/beacon/bin/)</div>
          <div class="flex items-center justify-between py-1 border-b border-slate-800/40">
            <span class="text-cyan-400">beacon-nginx</span>
            <span class="text-slate-500">write (stdin) &middot; test &middot; reload</span>
          </div>
          <div class="flex items-center justify-between py-1 border-b border-slate-800/40">
            <span class="text-cyan-400">beacon-php</span>
            <span class="text-slate-500">pool-write &middot; ext-enable &middot; fpm-restart</span>
          </div>
          <div class="flex items-center justify-between py-1 border-b border-slate-800/40">
            <span class="text-cyan-400">beacon-supervisor</span>
            <span class="text-slate-500">write (content-validated) &middot; restart</span>
          </div>
          <div class="flex items-center justify-between py-1 border-b border-slate-800/40">
            <span class="text-cyan-400">beacon-certbot</span>
            <span class="text-slate-500">issue &middot; renew &middot; delete</span>
          </div>
          <div class="flex items-center justify-between py-1">
            <span class="text-cyan-400">beacon-run</span>
            <span class="text-slate-500">executes commands as site user `beacon`</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ─── FRAMEWORKS SHOWCASE ─── -->
  <section id="frameworks" class="py-24 px-6 max-w-7xl mx-auto">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h2 class="text-xs font-mono font-semibold uppercase tracking-wider text-cyan-400">Supported Stack</h2>
      <p class="text-3xl font-extrabold text-white mt-2">Engineered for Modern Web Frameworks</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Laravel -->
      <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-lg font-bold text-white">Laravel</span>
          <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-red-500/10 text-red-400 border border-red-500/20">PHP 8.1 - 8.4</span>
        </div>
        <p class="text-xs text-slate-400 leading-relaxed">Composer optimization, artisan migrations, storage symlinks, queue workers, and scheduler integration.</p>
      </div>

      <!-- Next.js -->
      <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-lg font-bold text-white">Next.js</span>
          <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-slate-800 text-slate-200 border border-slate-700">Node / Bun</span>
        </div>
        <p class="text-xs text-slate-400 leading-relaxed">SSR daemon management via Supervisor, local port allocation, and Nginx immutable asset caching (`/_next/static/`).</p>
      </div>

      <!-- Nuxt -->
      <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-lg font-bold text-white">Nuxt.js</span>
          <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-green-500/10 text-green-400 border border-green-500/20">Nitro SSR</span>
        </div>
        <p class="text-xs text-slate-400 leading-relaxed">Automatic `.output/server/index.mjs` daemon execution, reverse proxying, and asset bypass rules.</p>
      </div>

      <!-- Static HTML -->
      <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-5">
        <div class="flex items-center justify-between mb-4">
          <span class="text-lg font-bold text-white">Static / SPA</span>
          <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">HTML / Vite</span>
        </div>
        <p class="text-xs text-slate-400 leading-relaxed">Direct Nginx document root serving (`/dist` or `/build`) with 1-click SPA HTML5 history fallback routing.</p>
      </div>
    </div>
  </section>

  <!-- ─── COMPARISON MATRIX ─── -->
  <section id="comparison" class="py-20 border-t border-slate-800/60 bg-slate-900/20 px-6">
    <div class="max-w-5xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-white">How Beacon Compares</h2>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-300 font-mono">
          <thead>
            <tr class="border-b border-slate-800 text-slate-400 uppercase">
              <th class="py-4 px-4">Feature</th>
              <th class="py-4 px-4 text-cyan-400 font-bold">Beacon</th>
              <th class="py-4 px-4">Laravel Forge</th>
              <th class="py-4 px-4">Coolify</th>
              <th class="py-4 px-4">Vercel</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-800/60">
            <tr>
              <td class="py-4 px-4 font-sans text-slate-200 font-semibold">Self-Hosted Panel</td>
              <td class="py-4 px-4 text-green-400">&check; Yes (On VPS)</td>
              <td class="py-4 px-4 text-slate-500">&cross; SaaS Panel</td>
              <td class="py-4 px-4 text-green-400">&check; Yes</td>
              <td class="py-4 px-4 text-slate-500">&cross; Closed SaaS</td>
            </tr>
            <tr>
              <td class="py-4 px-4 font-sans text-slate-200 font-semibold">Execution Engine</td>
              <td class="py-4 px-4 text-cyan-400 font-bold">Native Ubuntu OS</td>
              <td class="py-4 px-4 text-slate-300">Native Ubuntu OS</td>
              <td class="py-4 px-4 text-slate-500">Docker Containers</td>
              <td class="py-4 px-4 text-slate-500">Serverless Functions</td>
            </tr>
            <tr>
              <td class="py-4 px-4 font-sans text-slate-200 font-semibold">RAM Usage</td>
              <td class="py-4 px-4 text-cyan-400 font-bold">&lt; 50 MB</td>
              <td class="py-4 px-4 text-slate-300">Low</td>
              <td class="py-4 px-4 text-amber-400">High (1.5GB+)</td>
              <td class="py-4 px-4 text-slate-500">N/A</td>
            </tr>
            <tr>
              <td class="py-4 px-4 font-sans text-slate-200 font-semibold">Panel Datastore</td>
              <td class="py-4 px-4 text-green-400">SQLite (Independent)</td>
              <td class="py-4 px-4 text-slate-500">Cloud DB</td>
              <td class="py-4 px-4 text-slate-300">PostgreSQL</td>
              <td class="py-4 px-4 text-slate-500">Proprietary</td>
            </tr>
            <tr>
              <td class="py-4 px-4 font-sans text-slate-200 font-semibold">Monthly Cost</td>
              <td class="py-4 px-4 text-green-400 font-bold">$0 Free / Open Source</td>
              <td class="py-4 px-4 text-slate-300">$19 - $39 / mo</td>
              <td class="py-4 px-4 text-green-400">$0 Free</td>
              <td class="py-4 px-4 text-slate-300">$20+ / user / mo</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ─── INSTALLATION CTA ─── -->
  <section id="install" class="py-24 px-6 max-w-4xl mx-auto text-center">
    <div class="bg-gradient-to-b from-slate-900 to-slate-1000 border border-slate-800 rounded-3xl p-10 shadow-2xl relative overflow-hidden">
      <div class="absolute -top-24 -right-24 h-48 w-48 rounded-full bg-cyan-500/10 blur-3xl"></div>
      
      <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">Ready to Take Back Control?</h2>
      <p class="text-slate-300 text-sm mt-3 max-w-xl mx-auto">Run this single command on a fresh Ubuntu 24.04 LTS VPS to install Beacon and manage your first application in 5 minutes.</p>

      <div class="mt-8 bg-slate-1000 border border-slate-800 rounded-xl p-4 font-mono text-xs sm:text-sm text-cyan-400 flex items-center justify-between">
        <span class="truncate">$ curl -sSL https://getbeacon.dev/install.sh | sudo bash</span>
        <button onclick="copyInstallCommand()" class="shrink-0 px-3 py-1.5 rounded bg-slate-800 hover:bg-slate-700 text-xs text-white">Copy</button>
      </div>
    </div>
  </section>

  <!-- ─── FOOTER ─── -->
  <footer class="border-t border-slate-800/60 py-10 px-6 max-w-7xl mx-auto text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4">
    <div class="flex items-center gap-2">
      <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
      <span class="font-bold text-slate-300">Beacon</span>
      <span>&middot; Illuminate Your Infrastructure</span>
    </div>

    <div class="flex items-center gap-6">
      <a href="https://github.com/beacon" target="_blank" class="hover:text-slate-300">GitHub</a>
      <a href="/docs" class="hover:text-slate-300">Documentation</a>
      <a href="/license" class="hover:text-slate-300">MIT License</a>
    </div>
  </footer>

  <!-- Copy Script -->
  <script>
    function copyInstallCommand() {
      const command = "curl -sSL https://getbeacon.dev/install.sh | sudo bash";
      navigator.clipboard.writeText(command).then(() => {
        document.getElementById("copy-text").textContent = "Copied!";
        setTimeout(() => {
          document.getElementById("copy-text").textContent = "Copy";
        }, 2000);
      });
    }
  </script>
</body>
</html>