# Portfolio Customization Guide

This guide will help you personalize your WordPress portfolio theme for your internship interviews.

## Quick Customization Checklist

- [ ] Update your name and personal information
- [ ] Add your real projects with descriptions
- [ ] Update your skills list
- [ ] Add your contact information
- [ ] Update social media links
- [ ] Add your education details
- [ ] Customize colors (optional)
- [ ] Add your photo (optional)
- [ ] Test all pages and links

## Step-by-Step Customization

### 1. Update Your Name and Personal Information

**File:** `portfolio-theme/header.php`

Find and replace:
```php
<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
```

Replace with your name:
```php
<a href="<?php echo home_url(); ?>">Your Name</a>
```

**File:** `portfolio-theme/front-page.php`

Update the hero section:
```php
<h1>Your Name</h1>
<p>A brief tagline about yourself</p>
```

### 2. Customize the About Page

**File:** `portfolio-theme/page-about.php`

Update the following sections:

**Who I Am section:**
```php
<p>Replace this with your actual bio. Talk about your background, interests, and what drives you as a developer.</p>
```

**Education section:**
```php
<div style="background: white; padding: 2rem; border-radius: 10px; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
    <h3 style="color: var(--primary-color); margin-bottom: 0.5rem;">Your Degree</h3>
    <p style="color: var(--light-text); margin-bottom: 0.5rem;">Your University • Graduation Year</p>
    <p style="color: var(--light-text);">Relevant Coursework: List your courses</p>
</div>
```

### 3. Add Your Real Projects

**File:** `portfolio-theme/page-projects.php`

Each project card looks like this. Update with your actual projects:

```php
<div class="project-card">
    <div class="project-image">🚀</div>
    <div class="project-content">
        <h3>Your Project Name</h3>
        <p>Detailed description of what your project does, the problem it solves, and your role in it.</p>
        <div class="project-tags">
            <span class="tag">Technology 1</span>
            <span class="tag">Technology 2</span>
            <span class="tag">Technology 3</span>
        </div>
        <div class="project-links">
            <a href="YOUR_LIVE_DEMO_URL">Live Demo</a>
            <a href="YOUR_GITHUB_URL">GitHub</a>
        </div>
    </div>
</div>
```

**Tips for project descriptions:**
- Start with what the project does
- Mention the technologies used
- Explain your contribution
- Highlight any challenges you overcame
- Keep it concise (2-3 sentences)

### 4. Update Your Skills

**File:** `portfolio-theme/page-skills.php`

Update each skill card with your actual skills. Remove skills you don't have and add ones you do.

Example:
```php
<div class="skill-card">
    <h3>Frontend Development</h3>
    <ul>
        <li>HTML5 & CSS3</li>
        <li>JavaScript (ES6+)</li>
        <li>React.js</li>
        <!-- Add or remove as needed -->
    </ul>
</div>
```

### 5. Update Contact Information

**File:** `portfolio-theme/page-contact.php`

Update all contact details:

```php
<div class="contact-item">
    <strong>Email:</strong>
    <a href="mailto:your.email@example.com">your.email@example.com</a>
</div>
<div class="contact-item">
    <strong>Phone:</strong>
    <a href="tel:+1234567890">+1 (234) 567-890</a>
</div>
<div class="contact-item">
    <strong>LinkedIn:</strong>
    <a href="https://linkedin.com/in/yourprofile" target="_blank">linkedin.com/in/yourprofile</a>
</div>
<div class="contact-item">
    <strong>GitHub:</strong>
    <a href="https://github.com/yourusername" target="_blank">github.com/yourusername</a>
</div>
```

Update social links:
```php
<div class="social-links">
    <a href="https://linkedin.com/in/yourprofile" target="_blank">LinkedIn</a>
    <a href="https://github.com/yourusername" target="_blank">GitHub</a>
    <a href="https://twitter.com/yourusername" target="_blank">Twitter</a>
</div>
```

### 6. Customize Colors (Optional)

**File:** `portfolio-theme/style.css`

Find the CSS variables at the top and update:

```css
:root {
    --primary-color: #2563eb;      /* Change to your preferred color */
    --secondary-color: #1e40af;    /* Darker shade of primary */
    --text-color: #1f2937;         /* Main text color */
    --light-text: #6b7280;         /* Secondary text color */
    --bg-color: #ffffff;           /* Background color */
    --light-bg: #f9fafb;           /* Light background for sections */
}
```

**Professional color suggestions:**
- Blue: `#2563eb` (trustworthy, professional)
- Green: `#10b981` (growth, fresh)
- Purple: `#7c3aed` (creative, modern)
- Navy: `#1e3a8a` (traditional, serious)
- Teal: `#0d9488` (balanced, calm)

### 7. Add Your Photo (Optional)

**Option 1: Add to hero section**

**File:** `portfolio-theme/front-page.php`

Add after the hero title:
```php
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/your-photo.jpg" 
     alt="Your Name" 
     style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin: 1rem auto; display: block; border: 4px solid white;">
```

**Option 2: Add to about page**

**File:** `portfolio-theme/page-about.php`

Add at the beginning of the about content:
```php
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/your-photo.jpg" 
     alt="Your Name" 
     style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; margin: 0 auto 2rem; display: block; border: 4px solid var(--primary-color);">
```

**Note:** Create an `assets/images/` folder in your theme directory and add your photo there.

### 8. Update Navigation Menu

**Option 1: Through WordPress Admin (Recommended)**

1. Go to Appearance > Menus
2. Create a new menu named "Primary Menu"
3. Add your pages: Home, About, Projects, Skills, Contact
4. Check "Primary Menu" in menu settings
5. Save menu

**Option 2: Edit header.php**

**File:** `portfolio-theme/header.php`

The default menu is already set up. If you want to change the default menu, edit the `portfolio_default_menu()` function.

### 9. Add a Contact Form (Optional)

For a working contact form, install a plugin:

1. Go to Plugins > Add New
2. Search for "Contact Form 7"
3. Install and activate
4. Create a new contact form
5. Copy the shortcode
6. Paste it in `portfolio-theme/page-contact.php` replacing the demo form

### 10. Update Footer

**File:** `portfolio-theme/footer.php`

```php
<p>&copy; <?php echo date('Y'); ?> Your Name. All rights reserved.</p>
```

## Content Writing Tips

### About Me
- Keep it to 2-3 paragraphs
- Focus on your passion for development
- Mention your learning mindset
- Highlight what makes you unique

### Project Descriptions
- Start with the problem you solved
- Mention the technologies used
- Explain your specific contribution
- Include any measurable results if possible

### Skills
- Be honest about your skill level
- Group skills logically (frontend, backend, tools)
- Prioritize skills relevant to the positions you're applying for
- Include both technical and soft skills

## Testing Your Portfolio

Before using for interviews:

1. **Test on multiple browsers:** Chrome, Firefox, Safari, Edge
2. **Test on mobile:** Check responsive design on phone
3. **Test all links:** Make sure no broken links
4. **Check spelling:** Proofread all content
5. **Load time:** Ensure pages load quickly
6. **Contact form:** Test if you added one
7. **Accessibility:** Check color contrast and screen reader compatibility

## Common Mistakes to Avoid

- ❌ Leaving placeholder text
- ❌ Broken links
- ❌ Typos and grammatical errors
- ❌ Overloading with too much information
- ❌ Using unprofessional language
- ❌ Including irrelevant projects
- ❌ Forgetting to update contact information

## Professional Tips

- ✅ Keep design clean and simple
- ✅ Use professional language
- ✅ Highlight relevant experience
- ✅ Include links to live projects when possible
- ✅ Keep content up to date
- ✅ Ask for feedback from peers or mentors
- ✅ Test thoroughly before interviews

## Need Help?

- WordPress Documentation: https://developer.wordpress.org/
- WordPress Codex: https://codex.wordpress.org/
- CSS Reference: https://developer.mozilla.org/en-US/docs/Web/CSS
- JavaScript Reference: https://developer.mozilla.org/en-US/docs/Web/JavaScript
