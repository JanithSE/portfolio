<footer>
    <div class="container footer-content">
        <div class="footer-brand">
            <p class="footer-name">Janith Chamitha</p>
            <p class="footer-tagline">Computer Science Student &amp; Aspiring Developer</p>
        </div>
        <div class="footer-links">
            <a href="<?php echo home_url('/about'); ?>">About</a>
            <a href="<?php echo home_url('/projects'); ?>">Projects</a>
            <a href="<?php echo home_url('/skills'); ?>">Skills</a>
            <a href="<?php echo home_url('/contact'); ?>">Contact</a>
        </div>
        <div class="footer-social">
            <a href="mailto:janithcamitha@gmail.com">Email</a>
            <a href="https://github.com/janithcamitha" target="_blank">GitHub</a>
            <a href="https://linkedin.com/in/janithcamitha" target="_blank">LinkedIn</a>
            <a href="<?php echo esc_url(portfolio_whatsapp_url('Hi Janith, I saw your portfolio and would like to connect!')); ?>" target="_blank" rel="noopener noreferrer" class="footer-whatsapp">
                <?php echo portfolio_whatsapp_icon(16); ?> WhatsApp
            </a>
        </div>
    </div>
    <div class="container footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Janith Chamitha. All rights reserved.</p>
    </div>
</footer>

<a href="<?php echo esc_url( get_template_directory_uri() . '/assets/Janith_Chamith_CV.pdf' ); ?>"
   class="whatsapp-float"
   download
   aria-label="Download CV"
   title="Download CV">
    <?php echo portfolio_whatsapp_icon(28); ?>
</a>

<?php wp_footer(); ?>
</body>
</html>

