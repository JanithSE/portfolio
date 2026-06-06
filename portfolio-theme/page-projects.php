<?php
/**
 * Template Name: Projects Page
 *
 * @package Portfolio
 */

get_header();
?>

<section class="hero hero-short">
    <div class="container">
        <h1>My Projects</h1>
        <p>Real work that showcases my skills and problem-solving ability</p>
    </div>
</section>

<section>
    <div class="container">
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">🌐</div>
                <div class="project-content">
                    <h3>Developer Portfolio Website</h3>
                    <p>A custom WordPress theme with PHP templates, responsive CSS, and Docker-based local development. Built specifically to present my work professionally to employers.</p>
                    <div class="project-tags">
                        <span class="tag">WordPress</span>
                        <span class="tag">PHP</span>
                        <span class="tag">Docker</span>
                        <span class="tag">CSS3</span>
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
                    <p>Full-stack app for managing assignments and deadlines. Features JWT authentication, task categories, priority levels, and a dashboard with overdue alerts.</p>
                    <div class="project-tags">
                        <span class="tag">React</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">Express</span>
                        <span class="tag">MongoDB</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">🌤️</div>
                <div class="project-content">
                    <h3>Weather Dashboard</h3>
                    <p>Real-time weather app using the OpenWeatherMap API. Displays current conditions, 5-day forecast, and supports city search with geolocation fallback.</p>
                    <div class="project-tags">
                        <span class="tag">JavaScript</span>
                        <span class="tag">REST API</span>
                        <span class="tag">HTML/CSS</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">🛒</div>
                <div class="project-content">
                    <h3>E-Commerce REST API</h3>
                    <p>Backend API for an online store with product CRUD, user registration, JWT auth, and order management. Includes input validation and error handling.</p>
                    <div class="project-tags">
                        <span class="tag">Node.js</span>
                        <span class="tag">Express</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">JWT</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">📚</div>
                <div class="project-content">
                    <h3>Library Management System</h3>
                    <p>Desktop-style web app for tracking books, borrowers, and due dates. Built with Python and MySQL with a clean admin dashboard and search functionality.</p>
                    <div class="project-tags">
                        <span class="tag">Python</span>
                        <span class="tag">Flask</span>
                        <span class="tag">MySQL</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">🔐</div>
                <div class="project-content">
                    <h3>Secure Login System</h3>
                    <p>Authentication module with bcrypt password hashing, JWT sessions, protected routes, and role-based access control — reusable across any web project.</p>
                    <div class="project-tags">
                        <span class="tag">Node.js</span>
                        <span class="tag">JWT</span>
                        <span class="tag">bcrypt</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="about-content">
            <h2>How I Approach Projects</h2>
            <p>Every project starts with understanding the problem, then I plan the architecture, build iteratively, and test thoroughly. I document my work on GitHub and focus on code that's readable and maintainable — the kind of code a team would actually want to work with.</p>
        </div>
    </div>
</section>

<?php
get_footer();
