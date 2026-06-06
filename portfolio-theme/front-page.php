<?php
/**
 * Front Page Template
 *
 * @package Portfolio
 */

get_header();

$photo_extensions = array('jpg', 'jpeg', 'png', 'webp');
$profile_photo_url = '';
foreach ($photo_extensions as $ext) {
    if (file_exists(get_template_directory() . '/assets/images/profile.' . $ext)) {
        $profile_photo_url = get_template_directory_uri() . '/assets/images/profile.' . $ext;
        break;
    }
}
?>

<section class="hero">
    <div class="container hero-layout">
        <div class="profile-photo-wrap">
            <?php if ($profile_photo_url) : ?>
                <img src="<?php echo esc_url($profile_photo_url); ?>" alt="Janith Camitha" class="profile-photo">
            <?php else : ?>
                <div class="profile-photo profile-photo-placeholder" aria-label="Janith Camitha">JC</div>
            <?php endif; ?>
        </div>
        <div class="hero-text">
        <p class="hero-greeting">Hello, I'm</p>
        <h1>Janith Camitha</h1>
        <p class="hero-subtitle">Computer Science Student &amp; Aspiring Software Developer</p>
        <p class="hero-desc">I build clean, functional web applications and I'm actively seeking internship opportunities to grow with a great team.</p>
        <div class="hero-buttons">
            <a href="<?php echo home_url('/projects'); ?>" class="btn">View My Work</a>
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline">Get In Touch</a>
        </div>
        </div>
    </div>
</section>

<section class="stats-bar">
    <div class="container stats-grid">
        <div class="stat-item">
            <span class="stat-number">6+</span>
            <span class="stat-label">Projects Built</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">10+</span>
            <span class="stat-label">Technologies</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">2026</span>
            <span class="stat-label">Seeking Internship</span>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">About Me</h2>
        <p class="section-subtitle">A quick snapshot of who I am and what drives me as a developer.</p>
        <div class="about-content">
            <p>I'm a motivated Computer Science student with hands-on experience building full-stack web applications. From REST APIs to responsive frontends, I enjoy turning ideas into working software — and I'm always eager to learn something new.</p>
            <a href="<?php echo home_url('/about'); ?>" class="btn btn-primary">Learn More About Me</a>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>
        <p class="section-subtitle">A selection of work that shows what I can build and how I think.</p>
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">🌐</div>
                <div class="project-content">
                    <h3>Developer Portfolio Website</h3>
                    <p>A responsive WordPress portfolio built with custom PHP templates, Docker containerization, and a modern UI — designed for internship interviews.</p>
                    <div class="project-tags">
                        <span class="tag">WordPress</span>
                        <span class="tag">PHP</span>
                        <span class="tag">Docker</span>
                    </div>
                    <div class="project-links">
                        <a href="<?php echo home_url(); ?>">Live Site</a>
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">✅</div>
                <div class="project-content">
                    <h3>Student Task Manager</h3>
                    <p>A full-stack task management app with user auth, due-date reminders, and category filtering. Built to help students stay organized.</p>
                    <div class="project-tags">
                        <span class="tag">React</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">MongoDB</span>
                    </div>
                    <div class="project-links">
                        <a href="<?php echo home_url('/projects'); ?>">Details</a>
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">🌤️</div>
                <div class="project-content">
                    <h3>Weather Dashboard</h3>
                    <p>An interactive weather app that fetches live data from a public API, displays 5-day forecasts, and supports city search with a clean UI.</p>
                    <div class="project-tags">
                        <span class="tag">JavaScript</span>
                        <span class="tag">REST API</span>
                        <span class="tag">CSS3</span>
                    </div>
                    <div class="project-links">
                        <a href="<?php echo home_url('/projects'); ?>">Details</a>
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-cta">
            <a href="<?php echo home_url('/projects'); ?>" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">Core Skills</h2>
        <p class="section-subtitle">Technologies and tools I use to bring ideas to life.</p>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>Frontend</h3>
                <ul>
                    <li>HTML5, CSS3 &amp; JavaScript</li>
                    <li>React.js</li>
                    <li>Responsive Design</li>
                    <li>REST API Integration</li>
                </ul>
            </div>
            <div class="skill-card">
                <h3>Backend</h3>
                <ul>
                    <li>Node.js &amp; Express</li>
                    <li>Python &amp; PHP</li>
                    <li>MySQL &amp; MongoDB</li>
                    <li>REST API Design</li>
                </ul>
            </div>
            <div class="skill-card">
                <h3>Tools</h3>
                <ul>
                    <li>Git &amp; GitHub</li>
                    <li>Docker</li>
                    <li>VS Code</li>
                    <li>Linux / Windows</li>
                </ul>
            </div>
        </div>
        <div class="section-cta">
            <a href="<?php echo home_url('/skills'); ?>" class="btn btn-primary">View All Skills</a>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>Let's Build Something Together</h2>
        <p>I'm open to software development internships and excited to contribute to real-world projects.</p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn">Contact Me</a>
    </div>
</section>

<?php
get_footer();
