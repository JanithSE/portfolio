/* ================================================================
   JANITH CAMITHA — NEXT-LEVEL PORTFOLIO ANIMATIONS
   Drop this file in and add <script src="animations.js"></script>
   just before </body> in every HTML page.
   ================================================================ */

(function () {
  'use strict';

  /* ─────────────────────────────────────────────
     1. CUSTOM MAGNETIC CURSOR
  ───────────────────────────────────────────── */
  function initCursor() {
    if (window.matchMedia('(pointer: coarse)').matches) return; // skip touch

    const dot  = document.createElement('div');
    const ring = document.createElement('div');
    dot.id  = 'cursor-dot';
    ring.id = 'cursor-ring';
    document.body.appendChild(dot);
    document.body.appendChild(ring);

    const style = document.createElement('style');
    style.textContent = `
      #cursor-dot, #cursor-ring {
        position: fixed; top:0; left:0;
        border-radius: 50%;
        pointer-events: none;
        z-index: 99999;
        transition: opacity .3s;
      }
      #cursor-dot {
        width: 8px; height: 8px;
        background: #6C3BFA;
        transform: translate(-50%,-50%);
        transition: width .2s, height .2s, background .2s;
        mix-blend-mode: multiply;
      }
      #cursor-ring {
        width: 36px; height: 36px;
        border: 2px solid rgba(108,59,250,.5);
        transform: translate(-50%,-50%);
        transition: width .35s cubic-bezier(.23,1,.32,1),
                    height .35s cubic-bezier(.23,1,.32,1),
                    border-color .3s,
                    transform .08s linear;
      }
      body.cursor-hover #cursor-dot  { width:14px; height:14px; background:#00D4FF; }
      body.cursor-hover #cursor-ring { width:60px; height:60px; border-color:rgba(0,212,255,.4); }
      * { cursor: none !important; }
    `;
    document.head.appendChild(style);

    let mx = 0, my = 0, rx = 0, ry = 0;
    document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });

    (function loop() {
      rx += (mx - rx) * 0.12;
      ry += (my - ry) * 0.12;
      dot.style.left  = mx + 'px';
      dot.style.top   = my + 'px';
      ring.style.left = rx + 'px';
      ring.style.top  = ry + 'px';
      requestAnimationFrame(loop);
    })();

    document.querySelectorAll('a,button,.btn,.project-card,.skill-card,.social-btn').forEach(el => {
      el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
      el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
    });
  }

  /* ─────────────────────────────────────────────
     2. PARTICLE CANVAS (hero background)
  ───────────────────────────────────────────── */
  function initParticles() {
    const hero = document.querySelector('.hero');
    if (!hero) return;

    const canvas = document.createElement('canvas');
    canvas.id = 'hero-particles';
    Object.assign(canvas.style, {
      position: 'absolute', inset: 0,
      width: '100%', height: '100%',
      pointerEvents: 'none', zIndex: 0, opacity: '.7'
    });
    hero.prepend(canvas);

    const ctx = canvas.getContext('2d');
    let W, H, particles = [], mouse = { x: -999, y: -999 };

    const COLORS = ['#6C3BFA', '#00D4FF', '#a78bfa', '#38bdf8'];

    function resize() {
      W = canvas.width  = hero.offsetWidth;
      H = canvas.height = hero.offsetHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    hero.addEventListener('mousemove', e => {
      const r = hero.getBoundingClientRect();
      mouse.x = e.clientX - r.left;
      mouse.y = e.clientY - r.top;
    });
    hero.addEventListener('mouseleave', () => { mouse.x = -999; mouse.y = -999; });

    class Particle {
      constructor() { this.reset(true); }
      reset(init) {
        this.x  = Math.random() * W;
        this.y  = init ? Math.random() * H : H + 10;
        this.r  = Math.random() * 2.5 + 1;
        this.vx = (Math.random() - .5) * .4;
        this.vy = -(Math.random() * .6 + .2);
        this.color = COLORS[Math.floor(Math.random() * COLORS.length)];
        this.alpha = Math.random() * .5 + .2;
        this.life  = 1;
      }
      update() {
        const dx = mouse.x - this.x, dy = mouse.y - this.y;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if (dist < 120) {
          this.vx -= dx / dist * .06;
          this.vy -= dy / dist * .06;
        }
        this.vx *= .98; this.vy *= .98;
        this.x += this.vx; this.y += this.vy;
        if (this.y < -10) this.reset(false);
      }
      draw() {
        ctx.save();
        ctx.globalAlpha = this.alpha;
        ctx.fillStyle = this.color;
        ctx.shadowColor = this.color;
        ctx.shadowBlur = 8;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
      }
    }

    // connections
    function drawConnections() {
      for (let i = 0; i < particles.length; i++) {
        for (let j = i+1; j < particles.length; j++) {
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const d  = Math.sqrt(dx*dx + dy*dy);
          if (d < 100) {
            ctx.save();
            ctx.globalAlpha = (1 - d/100) * .15;
            ctx.strokeStyle = '#6C3BFA';
            ctx.lineWidth = .8;
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            ctx.stroke();
            ctx.restore();
          }
        }
      }
    }

    const COUNT = Math.min(80, Math.floor(W / 14));
    for (let i = 0; i < COUNT; i++) particles.push(new Particle());

    (function loop() {
      ctx.clearRect(0, 0, W, H);
      drawConnections();
      particles.forEach(p => { p.update(); p.draw(); });
      requestAnimationFrame(loop);
    })();
  }

  /* ─────────────────────────────────────────────
     3. TEXT SCRAMBLE — hero name
  ───────────────────────────────────────────── */
  function initTextScramble() {
    const el = document.querySelector('.hero h1');
    if (!el) return;

    const original = el.textContent.trim();
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%';
    let frame = 0, resolve;

    function scramble(text) {
      return new Promise(res => {
        resolve = res;
        let iteration = 0;
        const interval = setInterval(() => {
          el.textContent = text
            .split('')
            .map((ch, i) => {
              if (ch === ' ') return ' ';
              if (i < iteration) return text[i];
              return chars[Math.floor(Math.random() * chars.length)];
            })
            .join('');
          if (iteration >= text.length) { clearInterval(interval); res(); }
          iteration += .5;
        }, 30);
      });
    }

    // Trigger on load
    setTimeout(() => scramble(original), 400);

    // Re-trigger on hover
    el.addEventListener('mouseenter', () => scramble(original));
  }

  /* ─────────────────────────────────────────────
     4. TILT CARDS (project & skill cards)
  ───────────────────────────────────────────── */
  function initTiltCards() {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    document.querySelectorAll('.project-card, .skill-card').forEach(card => {
      card.style.transformStyle = 'preserve-3d';
      card.style.willChange     = 'transform';

      card.addEventListener('mousemove', e => {
        const rect = card.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width  - .5;
        const y = (e.clientY - rect.top)  / rect.height - .5;
        card.style.transform = `perspective(700px) rotateY(${x*14}deg) rotateX(${-y*14}deg) scale3d(1.04,1.04,1.04)`;

        // Gloss layer
        let gloss = card.querySelector('.card-gloss');
        if (!gloss) {
          gloss = document.createElement('div');
          gloss.className = 'card-gloss';
          Object.assign(gloss.style, {
            position:'absolute', inset:0, borderRadius:'inherit',
            pointerEvents:'none', zIndex:2,
            background:'radial-gradient(circle at 50% 50%, rgba(255,255,255,.18) 0%, transparent 65%)',
            transition:'background .05s'
          });
          card.style.position = 'relative';
          card.appendChild(gloss);
        }
        gloss.style.background = `radial-gradient(circle at ${(x+.5)*100}% ${(y+.5)*100}%, rgba(255,255,255,.22) 0%, transparent 65%)`;
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(700px) rotateY(0) rotateX(0) scale3d(1,1,1)';
        const gloss = card.querySelector('.card-gloss');
        if (gloss) gloss.style.background = 'none';
      });
    });
  }

  /* ─────────────────────────────────────────────
     5. SCROLL REVEAL (IntersectionObserver)
  ───────────────────────────────────────────── */
  function initScrollReveal() {
    const style = document.createElement('style');
    style.textContent = `
      .sr { opacity:0; transform:translateY(36px); transition:opacity .7s cubic-bezier(.23,1,.32,1), transform .7s cubic-bezier(.23,1,.32,1); }
      .sr.sr-left  { transform:translateX(-40px); }
      .sr.sr-right { transform:translateX( 40px); }
      .sr.sr-scale { transform:scale(.88); }
      .sr.visible  { opacity:1 !important; transform:none !important; }
    `;
    document.head.appendChild(style);

    // Tag elements
    const selectors = [
      '.section-title','.section-subtitle',
      '.project-card','.skill-card',
      '.timeline-card','.about-content',
      '.contact-item','.stat-item','.check-list li'
    ];
    selectors.forEach(sel => {
      document.querySelectorAll(sel).forEach((el, i) => {
        if (el.classList.contains('sr')) return;
        el.classList.add('sr');
        el.style.transitionDelay = (i % 6 * 80) + 'ms';
      });
    });

    // Also tag existing .reveal elements
    document.querySelectorAll('.reveal').forEach(el => el.classList.add('sr'));

    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll('.sr').forEach(el => io.observe(el));
  }

  /* ─────────────────────────────────────────────
     6. ANIMATED COUNTER (stats)
  ───────────────────────────────────────────── */
  function initCounters() {
    const items = document.querySelectorAll('.stat-number, .stat-value');
    if (!items.length) return;

    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        io.unobserve(e.target);
        const el  = e.target;
        const raw = el.textContent.trim();
        const num = parseFloat(raw.replace(/[^0-9.]/g,''));
        if (isNaN(num)) return;
        const suffix = raw.replace(/[0-9.]/g,'');
        const dur  = 1800, start = performance.now();
        function tick(now) {
          const t = Math.min((now - start) / dur, 1);
          const ease = 1 - Math.pow(1 - t, 3);
          el.textContent = (num < 10 ? (ease * num).toFixed(1) : Math.round(ease * num)) + suffix;
          if (t < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
      });
    }, { threshold: .5 });

    items.forEach(el => io.observe(el));
  }

  /* ─────────────────────────────────────────────
     7. MAGNETIC BUTTONS
  ───────────────────────────────────────────── */
  function initMagneticBtns() {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    document.querySelectorAll('.btn-primary, .btn-outline, .btn').forEach(btn => {
      btn.addEventListener('mousemove', e => {
        const r  = btn.getBoundingClientRect();
        const x  = (e.clientX - r.left - r.width  / 2) * .28;
        const y  = (e.clientY - r.top  - r.height / 2) * .28;
        btn.style.transform = `translate(${x}px, ${y}px) scale(1.05)`;
      });
      btn.addEventListener('mouseleave', () => {
        btn.style.transform = '';
        btn.style.transition = 'transform .5s cubic-bezier(.23,1,.32,1)';
        setTimeout(() => btn.style.transition = '', 500);
      });
    });
  }

  /* ─────────────────────────────────────────────
     8. TYPING SUBTITLE (hero subtitle/role)
  ───────────────────────────────────────────── */
  function initTypingEffect() {
    const el = document.querySelector('.hero-subtitle, .hero p');
    if (!el) return;

    const phrases = [
      el.textContent.trim(),
      'Building full‑stack web apps 🚀',
      'Crafting beautiful UIs ✨',
      'Always learning something new 💡'
    ];
    let pi = 0, ci = 0, deleting = false;
    el.textContent = '';
    el.style.borderRight = '2px solid #6C3BFA';

    setInterval(() => {
      const phrase = phrases[pi];
      if (!deleting) {
        el.textContent = phrase.slice(0, ++ci);
        if (ci === phrase.length) { deleting = true; setTimeout(() => {}, 1800); }
      } else {
        el.textContent = phrase.slice(0, --ci);
        if (ci === 0) { deleting = false; pi = (pi + 1) % phrases.length; }
      }
    }, deleting ? 45 : 80);
  }

  /* ─────────────────────────────────────────────
     9. SKILL BAR ANIMATION
  ───────────────────────────────────────────── */
  function initSkillBars() {
    const fills = document.querySelectorAll('.skill-bar-fill');
    if (!fills.length) return;

    fills.forEach(fill => {
      const target = fill.style.width || fill.getAttribute('data-width') || '80%';
      fill.setAttribute('data-width', target);
      fill.style.width = '0%';
      fill.style.transition = 'width 1.4s cubic-bezier(.23,1,.32,1)';
    });

    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        io.unobserve(e.target);
        const fill = e.target;
        const target = fill.getAttribute('data-width') || '80%';
        setTimeout(() => { fill.style.width = target; }, 150);
      });
    }, { threshold: .3 });

    fills.forEach(fill => io.observe(fill));
  }

  /* ─────────────────────────────────────────────
     10. FLOATING ORBS (ambient background blobs)
  ───────────────────────────────────────────── */
  function initOrbs() {
    const sections = document.querySelectorAll('section, .about-section, .contact-section');
    if (!sections.length) return;

    const orbStyle = document.createElement('style');
    orbStyle.textContent = `
      .ambient-orb {
        position:absolute; border-radius:50%;
        pointer-events:none; z-index:0;
        filter:blur(70px);
        animation: orbFloat 12s ease-in-out infinite;
      }
      @keyframes orbFloat {
        0%,100% { transform:translate(0,0) scale(1); }
        33%  { transform:translate(30px,-20px) scale(1.08); }
        66%  { transform:translate(-20px, 30px) scale(.94); }
      }
    `;
    document.head.appendChild(orbStyle);

    sections.forEach((sec, i) => {
      if (getComputedStyle(sec).position === 'static') sec.style.position = 'relative';
      sec.style.overflow = 'hidden';

      const o1 = document.createElement('div');
      o1.className = 'ambient-orb';
      Object.assign(o1.style, {
        width:'320px', height:'320px',
        background: i % 2 === 0 ? 'rgba(108,59,250,.07)' : 'rgba(0,212,255,.06)',
        top: '-100px', left: i % 2 === 0 ? '-80px' : 'auto', right: i % 2 === 0 ? 'auto' : '-80px',
        animationDelay: (i * 1.5) + 's'
      });
      sec.prepend(o1);

      const o2 = document.createElement('div');
      o2.className = 'ambient-orb';
      Object.assign(o2.style, {
        width:'250px', height:'250px',
        background: i % 2 === 0 ? 'rgba(0,212,255,.06)' : 'rgba(108,59,250,.07)',
        bottom: '-80px', right: i % 2 === 0 ? '-60px' : 'auto', left: i % 2 === 0 ? 'auto' : '-60px',
        animationDelay: (i * 1.5 + 3) + 's'
      });
      sec.prepend(o2);
    });
  }

  /* ─────────────────────────────────────────────
     11. NAVBAR — shrink + active link on scroll
  ───────────────────────────────────────────── */
  function initNavScroll() {
    const nav = document.querySelector('header, nav');
    if (!nav) return;

    const navStyle = document.createElement('style');
    navStyle.textContent = `
      header { transition: padding .3s, box-shadow .3s; }
      header.scrolled { padding-top:.4rem !important; padding-bottom:.4rem !important; box-shadow: 0 4px 30px rgba(108,59,250,.12) !important; }
    `;
    document.head.appendChild(navStyle);

    window.addEventListener('scroll', () => {
      nav.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
  }

  /* ─────────────────────────────────────────────
     12. PAGE LOADER
  ───────────────────────────────────────────── */
  function initPageLoader() {
    const loader = document.createElement('div');
    loader.id = 'page-loader';
    loader.innerHTML = `
      <div class="loader-inner">
        <div class="loader-ring"></div>
        <div class="loader-ring loader-ring-2"></div>
        <div class="loader-dot"></div>
      </div>
    `;
    const s = document.createElement('style');
    s.textContent = `
      #page-loader {
        position:fixed; inset:0; z-index:999999;
        background: linear-gradient(135deg, #f3f0ff, #e8f7ff);
        display:flex; align-items:center; justify-content:center;
        transition:opacity .6s ease, visibility .6s;
      }
      #page-loader.done { opacity:0; visibility:hidden; }
      .loader-inner { position:relative; width:64px; height:64px; }
      .loader-ring {
        position:absolute; inset:0; border-radius:50%;
        border: 3px solid transparent;
        border-top-color: #6C3BFA;
        animation: spin .9s linear infinite;
      }
      .loader-ring-2 {
        inset:10px;
        border-top-color: #00D4FF;
        animation-duration:1.4s; animation-direction:reverse;
      }
      .loader-dot {
        position:absolute; inset:0; margin:auto;
        width:12px; height:12px; border-radius:50%;
        background:linear-gradient(135deg,#6C3BFA,#00D4FF);
        animation:pulse-dot .9s ease-in-out infinite;
      }
      @keyframes spin { to { transform:rotate(360deg); } }
      @keyframes pulse-dot { 0%,100%{transform:scale(1);} 50%{transform:scale(1.4);} }
    `;
    document.head.appendChild(s);
    document.body.prepend(loader);

    window.addEventListener('load', () => {
      setTimeout(() => loader.classList.add('done'), 300);
    });
    // Fallback
    setTimeout(() => loader.classList.add('done'), 3000);
  }

  /* ─────────────────────────────────────────────
     13. RIPPLE EFFECT on buttons/links
  ───────────────────────────────────────────── */
  function initRipple() {
    const rippleStyle = document.createElement('style');
    rippleStyle.textContent = `
      .ripple-wave {
        position:absolute; border-radius:50%;
        width:10px; height:10px;
        background:rgba(255,255,255,.45);
        pointer-events:none;
        transform:scale(0);
        animation:ripple-expand .6s ease-out forwards;
      }
      @keyframes ripple-expand {
        to { transform:scale(30); opacity:0; }
      }
    `;
    document.head.appendChild(rippleStyle);

    document.querySelectorAll('.btn, button, .social-btn').forEach(el => {
      el.style.overflow = 'hidden';
      el.style.position = 'relative';
      el.addEventListener('click', e => {
        const r    = el.getBoundingClientRect();
        const wave = document.createElement('span');
        wave.className = 'ripple-wave';
        Object.assign(wave.style, {
          left: (e.clientX - r.left - 5) + 'px',
          top:  (e.clientY - r.top  - 5) + 'px'
        });
        el.appendChild(wave);
        setTimeout(() => wave.remove(), 650);
      });
    });
  }

  /* ─────────────────────────────────────────────
     14. SMOOTH SECTION TRANSITIONS (gradient sweep)
  ───────────────────────────────────────────── */
  function initSectionGlow() {
    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
        }
      });
    }, { threshold: .08 });
    document.querySelectorAll('section').forEach(s => io.observe(s));
  }

  /* ─────────────────────────────────────────────
     INIT ALL
  ───────────────────────────────────────────── */
  function init() {
    initPageLoader();
    initCursor();
    initParticles();
    initTextScramble();
    initScrollReveal();
    initCounters();
    initTiltCards();
    initMagneticBtns();
    initTypingEffect();
    initSkillBars();
    initOrbs();
    initNavScroll();
    initRipple();
    initSectionGlow();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
