<?php $__env->startSection('content'); ?>


<nav id="desktop-nav">
    <div class="logo"><?php echo e($settings['name'] ?? 'John Doe'); ?></div>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <button class="theme-toggle" id="theme-toggle" aria-label="Toggle theme">
        <svg class="icon-moon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        <svg class="icon-sun" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
    </button>
</nav>


<nav id="hamburger-nav">
    <div class="logo"><?php echo e($settings['name'] ?? 'John Doe'); ?></div>
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


<section id="profile">
    <div class="hero-bg-grid"></div>
    <div class="hero-blob"></div>

    <div class="profile-inner">
        <div class="section__pic-container reveal">
            <?php
                $profilePic = isset($settings['profile_pic']) && $settings['profile_pic']
                    ? asset('storage/' . $settings['profile_pic'])
                    : asset('assets/profile-pic.png');
            ?>
            <div class="pic-ring"></div>
            <img src="<?php echo e($profilePic); ?>" alt="<?php echo e($settings['name'] ?? 'Profile'); ?> profile picture" />
        </div>

        <div class="section__text reveal reveal-delay">
            <span class="greeting-chip">👋 Available for work</span>
            <p class="section__text__p1">Hello, I'm</p>
            <h1 class="title"><?php echo e($settings['name'] ?? 'John Doe'); ?></h1>
            <p class="section__text__p2"><?php echo e($settings['subtitle'] ?? 'Frontend Developer'); ?></p>

            <div class="btn-container">
                <?php if(!empty($settings['resume_url'])): ?>
                    <a href="<?php echo e($settings['resume_url']); ?>" class="btn btn-outline" target="_blank">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
                        Download CV
                    </a>
                <?php endif; ?>
                <a href="#contact" class="btn btn-primary">Let's Talk</a>
            </div>

            <div id="socials-container">
                <?php if(!empty($settings['linkedin_url'])): ?>
                    <a href="<?php echo e($settings['linkedin_url']); ?>" class="social-link" target="_blank" aria-label="LinkedIn">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                <?php endif; ?>
                <?php if(!empty($settings['github_url'])): ?>
                    <a href="<?php echo e($settings['github_url']); ?>" class="social-link" target="_blank" aria-label="GitHub">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <a href="#about" class="scroll-indicator" aria-label="Scroll down">
        <span></span>
    </a>
</section>


<section id="about">
    <div class="section-header reveal">
        <span class="section-eyebrow">Get To Know More</span>
        <h2 class="title">About Me</h2>
    </div>

    <div class="section-container reveal">
        <div class="section__pic-container about-pic-wrap">
            <?php
                $aboutPic = isset($settings['about_pic']) && $settings['about_pic']
                    ? asset('storage/' . $settings['about_pic'])
                    : asset('assets/about-pic.png');
            ?>
            <img src="<?php echo e($aboutPic); ?>" alt="About picture" class="about-pic" />
            <div class="about-pic-accent"></div>
        </div>

        <div class="about-details-container">
            <div class="about-containers">
                <div class="details-container">
                    <div class="details-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                    </div>
                    <h3>Experience</h3>
                    <p><?php echo e($settings['experience_years'] ?? '2+ years'); ?></p>
                    <p class="details-sub"><?php echo e($settings['title'] ?? 'Frontend Development'); ?></p>
                </div>
                <div class="details-container">
                    <div class="details-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </div>
                    <h3>Education</h3>
                    <p><?php echo nl2br(e($settings['education'] ?? 'B.Sc. Bachelors Degree')); ?></p>
                </div>
            </div>

            <div class="text-container">
                <p><?php echo e($settings['about_text'] ?? 'Welcome to my portfolio! I am passionate about creating great digital experiences.'); ?></p>
            </div>
        </div>
    </div>
</section>


<section id="experience">
    <div class="section-header reveal">
        <span class="section-eyebrow">Explore My</span>
        <h2 class="title">Experience</h2>
    </div>

    <div class="experience-details-container reveal">
        <div class="about-containers">
            <?php $__currentLoopData = $skillCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="details-container skill-card">
                    <h2 class="experience-sub-title"><?php echo e($category->name); ?></h2>
                    <div class="article-container">
                        <?php $__currentLoopData = $category->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article>
                                <div class="skill-check">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <div>
                                    <h3><?php echo e($skill->name); ?></h3>
                                    <p><?php echo e($skill->level); ?></p>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section id="projects">
    <div class="section-header reveal">
        <span class="section-eyebrow">Browse My Recent</span>
        <h2 class="title">Projects</h2>
    </div>

    <div class="projects-grid reveal">
        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="project-card">
                <div class="project-img-wrap">
                    <img src="<?php echo e($project->image_url); ?>" alt="<?php echo e($project->title); ?>" class="project-img" />
                    <div class="project-overlay">
                        <div class="project-links">
                            <?php if($project->github_url): ?>
                                <a href="<?php echo e($project->github_url); ?>" class="project-link-btn" target="_blank">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/></svg>
                                    Code
                                </a>
                            <?php endif; ?>
                            <?php if($project->live_url): ?>
                                <a href="<?php echo e($project->live_url); ?>" class="project-link-btn project-link-primary" target="_blank">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                    Live
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="project-info">
                    <h3 class="project-title"><?php echo e($project->title); ?></h3>
                    <?php if($project->description): ?>
                        <p class="project-desc"><?php echo e($project->description); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="empty-state">No projects yet. Add some in the admin panel!</p>
        <?php endif; ?>
    </div>
</section>


<section id="contact">
    <div class="section-header reveal">
        <span class="section-eyebrow">Get in Touch</span>
        <h2 class="title">Contact Me</h2>
    </div>

    <div class="contact-wrapper reveal">
        <div class="contact-left">
            <p class="contact-tagline">Have a project in mind? Let's build something great together.</p>

            <div class="contact-methods">
                <?php if(!empty($settings['email'])): ?>
                    <a href="https://mail.google.com/mail/?view=cm&to=<?php echo e($settings['email']); ?>" class="contact-method" target="_blank">
                        <div class="contact-method-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <span class="contact-method-label">Email</span>
                            <span class="contact-method-value"><?php echo e($settings['email']); ?></span>
                        </div>
                    </a>
                <?php endif; ?>
                <?php if(!empty($settings['linkedin_url'])): ?>
                    <a href="<?php echo e($settings['linkedin_url']); ?>" class="contact-method" target="_blank">
                        <div class="contact-method-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        </div>
                        <div>
                            <span class="contact-method-label">LinkedIn</span>
                            <span class="contact-method-value">Connect with me</span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="contact-right">
            <?php if(session('success')): ?>
                <div class="alert-success">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('portfolio.contact')); ?>" class="contact-form">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Your name" required />
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="your@email.com" required />
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="What's this about?" />
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Tell me about your project..." required><?php echo e(old('message')); ?></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="field-error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    Send Message
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>


<footer>
    <div class="footer-inner">
        <div class="footer-logo"><?php echo e($settings['name'] ?? 'Portfolio'); ?></div>
        <nav class="footer-nav">
            <a href="#about">About</a>
            <a href="#experience">Experience</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
        <p class="footer-copy">© <?php echo e(date('Y')); ?> <?php echo e($settings['name'] ?? 'Portfolio'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php $__env->startPush('scripts'); ?>
<script>
    // Hamburger toggle
    function toggleMenu() {
        document.querySelector('.menu-links').classList.toggle('open');
        document.querySelector('.hamburger-icon').classList.toggle('open');
    }

    // Scroll reveal
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(el => {
            if (el.isIntersecting) {
                el.target.classList.add('visible');
                observer.unobserve(el.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Theme toggle
    const root = document.documentElement;
    const saved = localStorage.getItem('theme') || 'dark';
    root.setAttribute('data-theme', saved);

    function applyTheme(theme) {
        root.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    }

    document.getElementById('theme-toggle')?.addEventListener('click', () => {
        applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    });
    document.getElementById('theme-toggle-mobile')?.addEventListener('click', () => {
        applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    });

    // Nav scroll effect
    window.addEventListener('scroll', () => {
        document.querySelector('#desktop-nav')?.classList.toggle('scrolled', window.scrollY > 50);
        document.querySelector('#hamburger-nav')?.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portfolio-laravel\resources\views/portfolio/index.blade.php ENDPATH**/ ?>