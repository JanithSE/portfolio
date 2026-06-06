<?php
/**
 * Template Name: Contact Page
 *
 * @package Portfolio
 */

get_header();
?>

<section class="hero hero-short">
    <div class="container">
        <h1>Contact Me</h1>
        <p>I'd love to hear about internship opportunities</p>
    </div>
</section>

<section>
    <div class="container">
        <div class="contact-content">
            <h2>Get In Touch</h2>
            <p>Whether you have an internship opening or just want to connect — I'm always happy to chat. I typically respond within 24 hours.</p>

            <div class="contact-info">
                <div class="contact-item">
                    <strong>Email</strong>
                    <a href="mailto:janithcamitha@gmail.com">janithcamitha@gmail.com</a>
                </div>
                <div class="contact-item">
                    <strong>Location</strong>
                    <span>Colombo, Sri Lanka</span>
                </div>
                <div class="contact-item">
                    <strong>LinkedIn</strong>
                    <a href="https://www.linkedin.com/in/janith-chamith-308b42296" target="_blank">linkedin.com/in/janithchamitha</a>
                </div>
                <div class="contact-item">
                    <strong>GitHub</strong>
                    <a href="https://github.com/JanithSE" target="_blank">github.com/janithcamitha</a>
                </div>
                <div class="contact-item contact-item-whatsapp">
                    <strong>WhatsApp</strong>
                    <a href="<?php echo esc_url(portfolio_whatsapp_url('Hi Janith, I saw your portfolio and would like to connect!')); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo portfolio_whatsapp_icon(18); ?>
                        Chat on WhatsApp
                    </a>
                </div>
            </div>

            <div class="social-links">
                <a href="mailto:janithcamitha@gmail.com" class="social-btn">Email Me</a>
                <a href="<?php echo esc_url(portfolio_whatsapp_url()); ?>" target="_blank" rel="noopener noreferrer" class="social-btn social-btn-whatsapp">
                    <?php echo portfolio_whatsapp_icon(18); ?> WhatsApp
                </a>
                <a href="www.linkedin.com/in/janith-chamith-308b42296" target="_blank" class="social-btn">LinkedIn</a>
                <a href="https://github.com/JanithSE" target="_blank" class="social-btn">GitHub</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2 class="section-title">Send a Message</h2>
        <div class="contact-content">
            <form id="contact-form" class="contact-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required placeholder="Your name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="your@email.com">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required placeholder="Internship inquiry">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Tell me about the opportunity..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-full">Send Message</button>
            </form>
            <p class="form-note">Prefer email? Reach me directly at <a href="mailto:janithcamitha@gmail.com">janithcamitha@gmail.com</a></p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="about-content">
            <h2>Availability</h2>
            <p>I'm available for <strong>software development internships</strong> starting 2026. Open to remote, hybrid, or on-site roles. Flexible with start dates and willing to relocate for the right opportunity.</p>
        </div>
    </div>
</section>

<?php
get_footer();
