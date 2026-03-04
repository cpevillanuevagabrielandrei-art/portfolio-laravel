@extends('layouts.portfolio')

@section('content')

{{-- CURSOR GLOW --}}
<div class="cursor-glow" id="cursorGlow"></div>

{{-- DESKTOP NAV --}}
<nav id="desktop-nav">
    <div class="logo">
        <span class="logo-text">{{ $settings['name'] ?? 'John Doe' }}</span>
        <span class="logo-dot"></span>
    </div>
    <ul class="nav-links">
        <li><a href="#about"><span>About</span></a></li>
        <li><a href="#experience"><span>Experience</span></a></li>
        <li><a href="#projects"><span>Projects</span></a></li>
        <li><a href="#contact"><span>Contact</span></a></li>
    </ul>
    <button class="theme-toggle" id="theme-toggle" aria-label="Toggle theme">
        <svg class="icon-moon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        <svg class="icon-sun" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
    </button>
</nav>

{{-- HAMBURGER NAV --}}
<nav id="hamburger-nav">
    <div class="logo">
        <span class="logo-text">{{ $settings['name'] ?? 'John Doe' }}</span>
        <span class="logo-dot"></span>
    </div>
    <div style="display:flex;align-items:center;gap:0.75rem">
        <button class="theme-toggle" id="theme-toggle-mobile" aria-label="Toggle theme">
            <svg class="icon-moon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
            <svg class="icon-sun" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </button>
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span><span></span><span></span>
            </div>
            <div class="menu-links">
                <li><a href="#about" onclick="toggleMenu()">About</a></li>
                <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
                <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
                <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
            </div>
        </div>
    </div>
</nav>

{{-- HERO / PROFILE SECTION --}}
<section id="profile">
    <div class="hero-bg-grid"></div>
    <div class="hero-blob hero-blob-1"></div>
    <div class="hero-blob hero-blob-2"></div>
    <div class="hero-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>

    <div class="profile-inner">
        <div class="section__pic-container hero-entrance">
            @php
                $profilePic = isset($settings['profile_pic']) && $settings['profile_pic']
                    ? asset('storage/' . $settings['profile_pic'])
                    : asset('assets/profile-pic.png');
            @endphp
            <div class="pic-ring pic-ring-outer"></div>
            <div class="pic-ring pic-ring-inner"></div>
            <div class="pic-glow"></div>
            <img src="{{ $profilePic }}" alt="{{ $settings['name'] ?? 'Profile' }} profile picture" />
        </div>

        <div class="section__text hero-entrance hero-entrance-delay">
            <span class="greeting-chip">
                <span class="chip-pulse"></span>
                👋 Available for work
            </span>
            <p class="section__text__p1">Hello, I'm</p>
            <h1 class="title glitch-text" data-text="{{ $settings['name'] ?? 'John Doe' }}">{{ $settings['name'] ?? 'John Doe' }}</h1>
            <p class="section__text__p2">{{ $settings['subtitle'] ?? 'Frontend Developer' }}</p>

            <div class="btn-container">
                @if (!empty($settings['resume_url']))
                    <a href="{{ $settings['resume_url'] }}" class="btn btn-outline magnetic-btn" target="_blank">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
                        <span>Download CV</span>
                    </a>
                @endif
                <a href="#contact" class="btn btn-primary magnetic-btn">
                    <span>Let's Talk</span>
                    <div class="btn-shine"></div>
                </a>
            </div>

            <div id="socials-container">
                @if (!empty($settings['linkedin_url']))
                    <a href="{{ $settings['linkedin_url'] }}" class="social-link" target="_blank" aria-label="LinkedIn">
                        <div class="social-bg"></div>
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                @endif
                @if (!empty($settings['github_url']))
                    <a href="{{ $settings['github_url'] }}" class="social-link" target="_blank" aria-label="GitHub">
                        <div class="social-bg"></div>
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <a href="#about" class="scroll-indicator" aria-label="Scroll down">
        <span></span>
    </a>
</section>

{{-- ABOUT SECTION --}}
<section id="about">
    <div class="section-header reveal">
        <span class="section-eyebrow">Get To Know More</span>
        <h2 class="title">About Me</h2>
    </div>

    <div class="section-container reveal">
        <div class="section__pic-container about-pic-wrap">
            @php
                $aboutPic = isset($settings['about_pic']) && $settings['about_pic']
                    ? asset('storage/' . $settings['about_pic'])
                    : asset('assets/about-pic.png');
            @endphp
            <div class="about-pic-glass"></div>
            <img src="{{ $aboutPic }}" alt="About picture" class="about-pic" />
            <div class="about-pic-accent"></div>
            <div class="about-pic-badge">
                <span>✦</span>
                <p>{{ $settings['experience_years'] ?? '2+' }}</p>
                <small>years exp.</small>
            </div>
        </div>

        <div class="about-details-container">
            <div class="about-containers">
                <div class="details-container glass-card">
                    <div class="details-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                    </div>
                    <h3>Experience</h3>
                    <p>{{ $settings['experience_years'] ?? '2+ years' }}</p>
                    <p class="details-sub">{{ $settings['title'] ?? 'Frontend Development' }}</p>
                </div>
                <div class="details-container glass-card">
                    <div class="details-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </div>
                    <h3>Education</h3>
                    <p>{!! nl2br(e($settings['education'] ?? 'B.Sc. Bachelors Degree')) !!}</p>
                </div>
            </div>

            <div class="text-container glass-card">
                <p>{{ $settings['about_text'] ?? 'Welcome to my portfolio! I am passionate about creating great digital experiences.' }}</p>
            </div>
        </div>
    </div>
</section>

{{-- EXPERIENCE SECTION --}}
<section id="experience">
    <div class="section-header reveal">
        <span class="section-eyebrow">Explore My</span>
        <h2 class="title">Experience</h2>
    </div>

    <div class="experience-details-container reveal">
        <div class="about-containers">
            @foreach ($skillCategories as $category)
                <div class="details-container skill-card glass-card">
                    <h2 class="experience-sub-title">{{ $category->name }}</h2>
                    <div class="article-container">
                        @foreach ($category->skills as $skill)
                            <article class="skill-pill">
                                <div class="skill-check">
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <div>
                                    <h3>{{ $skill->name }}</h3>
                                    <p>{{ $skill->level }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PROJECTS SECTION --}}
<section id="projects">
    <div class="section-header reveal">
        <span class="section-eyebrow">Browse My Recent</span>
        <h2 class="title">Projects</h2>
    </div>

    <div class="projects-grid reveal">
        @forelse($projects as $project)
            <div class="project-card tilt-card">
                <div class="project-card-glow"></div>
                <div class="project-img-wrap">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="project-img" />
                    <div class="project-overlay">
                        <div class="project-links">
                            @if ($project->github_url)
                                <a href="{{ $project->github_url }}" class="project-link-btn" target="_blank">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg>
                                    Code
                                </a>
                            @endif
                            @if ($project->live_url)
                                <a href="{{ $project->live_url }}" class="project-link-btn project-link-primary" target="_blank">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                    Live
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="project-info">
                    <h3 class="project-title">{{ $project->title }}</h3>
                    @if ($project->description)
                        <p class="project-desc">{{ $project->description }}</p>
                    @endif
                </div>
            </div>
        @empty
            <p class="empty-state">No projects yet. Add some in the admin panel!</p>
        @endforelse
    </div>
</section>

{{-- CONTACT SECTION --}}
<section id="contact">
    <div class="section-header reveal">
        <span class="section-eyebrow">Get in Touch</span>
        <h2 class="title">Contact Me</h2>
    </div>

    <div class="contact-wrapper reveal">
        <div class="contact-left">
            <p class="contact-tagline">Have a project in mind?<br>Let's build something <em>extraordinary</em>.</p>

            <div class="contact-methods">
                @if (!empty($settings['email']))
                    <a href="https://mail.google.com/mail/?view=cm&to={{ $settings['email'] }}" class="contact-method glass-card" target="_blank">
                        <div class="contact-method-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <span class="contact-method-label">Email</span>
                            <span class="contact-method-value">{{ $settings['email'] }}</span>
                        </div>
                        <svg class="contact-arrow" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                @endif
                @if (!empty($settings['linkedin_url']))
                    <a href="{{ $settings['linkedin_url'] }}" class="contact-method glass-card" target="_blank">
                        <div class="contact-method-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        </div>
                        <div>
                            <span class="contact-method-label">LinkedIn</span>
                            <span class="contact-method-value">Connect with me</span>
                        </div>
                        <svg class="contact-arrow" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                @endif
            </div>
        </div>

        <div class="contact-right">
            @if (session('success'))
                <div class="alert-success">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('portfolio.contact') }}" class="contact-form glass-card">
                @csrf
                <div class="form-row">
                    <div class="form-group floating-label">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder=" " required />
                        <label for="name">Your Name</label>
                        @error('name')<span class="field-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group floating-label">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder=" " required />
                        <label for="email">Email Address</label>
                        @error('email')<span class="field-error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group floating-label">
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder=" " />
                    <label for="subject">Subject</label>
                </div>
                <div class="form-group floating-label">
                    <textarea id="message" name="message" placeholder=" " required>{{ old('message') }}</textarea>
                    <label for="message">Your Message</label>
                    @error('message')<span class="field-error">{{ $message }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary btn-full magnetic-btn">
                    <span>Send Message</span>
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    <div class="btn-shine"></div>
                </button>
            </form>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer>
    <div class="footer-inner">
        <div class="footer-logo">
            <span>{{ $settings['name'] ?? 'Portfolio' }}</span>
            <span class="logo-dot"></span>
        </div>
        <nav class="footer-nav">
            <a href="#about">About</a>
            <a href="#experience">Experience</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
        <p class="footer-copy">© {{ date('Y') }} {{ $settings['name'] ?? 'Portfolio' }}. All rights reserved.</p>
    </div>
</footer>

@push('scripts')
<script>
// ── Hamburger ──────────────────────────────────────────
function toggleMenu() {
    document.querySelector('.menu-links').classList.toggle('open');
    document.querySelector('.hamburger-icon').classList.toggle('open');
}

// ── Theme toggle ──────────────────────────────────────
const root = document.documentElement;
const saved = localStorage.getItem('theme') || 'dark';
root.setAttribute('data-theme', saved);

function applyTheme(theme) {
    root.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}
document.getElementById('theme-toggle')?.addEventListener('click', () =>
    applyTheme(root.dataset.theme === 'dark' ? 'light' : 'dark'));
document.getElementById('theme-toggle-mobile')?.addEventListener('click', () =>
    applyTheme(root.dataset.theme === 'dark' ? 'light' : 'dark'));

// ── Scroll reveal ─────────────────────────────────────
const revealObs = new IntersectionObserver((entries) => {
    entries.forEach((el, i) => {
        if (el.isIntersecting) {
            el.target.style.transitionDelay = `${i * 0.07}s`;
            el.target.classList.add('visible');
            revealObs.unobserve(el.target);
        }
    });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

// ── Nav scroll glass effect ───────────────────────────
window.addEventListener('scroll', () => {
    const scrolled = window.scrollY > 50;
    document.querySelector('#desktop-nav')?.classList.toggle('scrolled', scrolled);
    document.querySelector('#hamburger-nav')?.classList.toggle('scrolled', scrolled);
});

// ── Cursor glow ───────────────────────────────────────
const glow = document.getElementById('cursorGlow');
let mx = 0, my = 0, cx = 0, cy = 0;
document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
(function animateCursor() {
    cx += (mx - cx) * 0.12;
    cy += (my - cy) * 0.12;
    glow.style.transform = `translate(${cx - 200}px, ${cy - 200}px)`;
    requestAnimationFrame(animateCursor);
})();

// ── Magnetic buttons ──────────────────────────────────
document.querySelectorAll('.magnetic-btn').forEach(btn => {
    btn.addEventListener('mousemove', e => {
        const r = btn.getBoundingClientRect();
        const dx = e.clientX - (r.left + r.width / 2);
        const dy = e.clientY - (r.top + r.height / 2);
        btn.style.transform = `translate(${dx * 0.28}px, ${dy * 0.28}px)`;
    });
    btn.addEventListener('mouseleave', () => {
        btn.style.transform = '';
        btn.style.transition = 'transform 0.5s cubic-bezier(0.34,1.56,0.64,1)';
        setTimeout(() => btn.style.transition = '', 500);
    });
});

// ── 3D Tilt cards ─────────────────────────────────────
document.querySelectorAll('.tilt-card').forEach(card => {
    card.addEventListener('mousemove', e => {
        const r = card.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width  - 0.5;
        const y = (e.clientY - r.top)  / r.height - 0.5;
        card.style.transform = `perspective(800px) rotateY(${x * 12}deg) rotateX(${-y * 12}deg) translateZ(8px)`;
        const glowEl = card.querySelector('.project-card-glow');
        if (glowEl) {
            glowEl.style.background = `radial-gradient(circle at ${(x+0.5)*100}% ${(y+0.5)*100}%, rgba(74,222,128,0.25), transparent 65%)`;
        }
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = '';
        card.style.transition = 'transform 0.6s cubic-bezier(0.34,1.56,0.64,1)';
        setTimeout(() => card.style.transition = '', 600);
    });
});

// ── Floating label animation ──────────────────────────
document.querySelectorAll('.floating-label input, .floating-label textarea').forEach(input => {
    const check = () => input.value ? input.classList.add('has-value') : input.classList.remove('has-value');
    input.addEventListener('input', check);
    check();
});

// ── Typewriter subtitle ───────────────────────────────
const subtitle = document.querySelector('.section__text__p2');
if (subtitle) {
    const text = subtitle.textContent.trim();
    subtitle.textContent = '';
    subtitle.style.borderRight = '2px solid var(--clr-accent)';
    let i = 0;
    setTimeout(() => {
        const typ = setInterval(() => {
            subtitle.textContent += text[i++];
            if (i >= text.length) {
                clearInterval(typ);
                setTimeout(() => subtitle.style.borderRight = 'none', 800);
            }
        }, 60);
    }, 900);
}

// ── Staggered skill pill entrance ─────────────────────
const skillObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.skill-pill').forEach((pill, i) => {
                pill.style.animationDelay = `${i * 0.045}s`;
                pill.classList.add('pill-animate');
            });
            skillObs.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });
document.querySelectorAll('.skill-card').forEach(c => skillObs.observe(c));
</script>
@endpush

@endsection