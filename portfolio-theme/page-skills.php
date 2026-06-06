<?php
/**
 * Template Name: Skills Page
 *
 * @package Portfolio
 */

get_header();
?>

<section class="hero hero-short">
    <div class="container">
        <h1>Skills &amp; Technologies</h1>
        <p>What I know and what I'm actively learning</p>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">Technical Skills</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>Frontend Development</h3>
                <ul>
                    <li>HTML5 &amp; CSS3</li>
                    <li>JavaScript (ES6+)</li>
                    <li>React.js</li>
                    <li>Responsive &amp; Mobile-First Design</li>
                    <li>REST API Integration</li>
                </ul>
            </div>

            <div class="skill-card">
                <h3>Backend Development</h3>
                <ul>
                    <li>Node.js &amp; Express.js</li>
                    <li>Python (Flask)</li>
                    <li>PHP &amp; WordPress</li>
                    <li>REST API Design</li>
                    <li>Authentication (JWT, bcrypt)</li>
                </ul>
            </div>

            <div class="skill-card">
                <h3>Databases</h3>
                <ul>
                    <li>MySQL</li>
                    <li>MongoDB</li>
                    <li>Database Design &amp; Normalization</li>
                    <li>SQL Queries &amp; Joins</li>
                </ul>
            </div>

            <div class="skill-card">
                <h3>DevOps &amp; Tools</h3>
                <ul>
                    <li>Git &amp; GitHub</li>
                    <li>Docker &amp; Docker Compose</li>
                    <li>VS Code</li>
                    <li>Linux / Windows</li>
                    <li>Postman (API Testing)</li>
                </ul>
            </div>

            <div class="skill-card">
                <h3>Programming Languages</h3>
                <ul>
                    <li>JavaScript</li>
                    <li>Python</li>
                    <li>PHP</li>
                    <li>Java</li>
                    <li>C++</li>
                    <li>SQL</li>
                </ul>
            </div>

            <div class="skill-card">
                <h3>Soft Skills</h3>
                <ul>
                    <li>Problem Solving</li>
                    <li>Team Collaboration</li>
                    <li>Clear Communication</li>
                    <li>Time Management</li>
                    <li>Self-Motivated Learning</li>
                    <li>Attention to Detail</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">Proficiency Overview</h2>
        <div class="skill-bars">
            <div class="skill-bar-item">
                <div class="skill-bar-header"><span>JavaScript / React</span><span>Advanced</span></div>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 85%"></div></div>
            </div>
            <div class="skill-bar-item">
                <div class="skill-bar-header"><span>Node.js / Express</span><span>Advanced</span></div>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 80%"></div></div>
            </div>
            <div class="skill-bar-item">
                <div class="skill-bar-header"><span>Python</span><span>Intermediate</span></div>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 70%"></div></div>
            </div>
            <div class="skill-bar-item">
                <div class="skill-bar-header"><span>MySQL / MongoDB</span><span>Intermediate</span></div>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 75%"></div></div>
            </div>
            <div class="skill-bar-item">
                <div class="skill-bar-header"><span>Docker / Git</span><span>Intermediate</span></div>
                <div class="skill-bar-track"><div class="skill-bar-fill" style="width: 70%"></div></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">Currently Learning</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <h3>Next Steps</h3>
                <ul>
                    <li>TypeScript</li>
                    <li>Cloud (AWS basics)</li>
                    <li>Automated Testing (Jest)</li>
                    <li>System Design Fundamentals</li>
                </ul>
            </div>
            <div class="skill-card">
                <h3>Exploring</h3>
                <ul>
                    <li>Next.js</li>
                    <li>GraphQL</li>
                    <li>CI/CD Pipelines</li>
                    <li>Kubernetes basics</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
