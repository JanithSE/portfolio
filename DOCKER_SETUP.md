# Docker Setup Guide for WordPress Portfolio

This guide will help you set up a local WordPress development environment using Docker to develop and test your portfolio theme.

## Prerequisites

- Docker Desktop installed on your computer
- Basic understanding of Docker commands

## Quick Start

1. **Navigate to the project directory:**
   ```bash
   cd c:/Users/admin/Desktop/hello
   ```

2. **Start the Docker containers:**
   ```bash
   docker-compose up -d
   ```

3. **Wait for the containers to start** (this may take a few minutes on first run)

4. **Access WordPress:**
   - Open your browser and go to: `http://localhost:8080`
   - You'll see the WordPress installation screen

5. **Complete WordPress Installation:**
   - Select your language
   - Fill in the site information:
     - Site Title: Your Portfolio
     - Username: admin (or your preferred username)
     - Password: Choose a strong password
     - Your Email: your.email@example.com
   - Click "Install WordPress"

6. **Login to WordPress Admin:**
   - Go to: `http://localhost:8080/wp-admin`
   - Login with your credentials

7. **Activate the Theme:**
   - Go to Appearance > Themes
   - You should see "Professional Portfolio" theme
   - Click "Activate"

8. **Create Pages:**
   - Go to Pages > Add New
   - Create the following pages:
     - **Home** - Template: "Front Page"
     - **About** - Template: "About Page"
     - **Projects** - Template: "Projects Page"
     - **Skills** - Template: "Skills Page"
     - **Contact** - Template: "Contact Page"
   - Publish each page

9. **Set Front Page:**
   - Go to Settings > Reading
   - Set "Your homepage displays" to "A static page"
   - Homepage: Select "Home"
   - Posts page: Leave blank or select any page
   - Save changes

## Accessing Services

- **WordPress Site:** http://localhost:8080
- **WordPress Admin:** http://localhost:8080/wp-admin
- **phpMyAdmin:** http://localhost:8081
  - Username: root
  - Password: root

## Docker Commands

### Start containers
```bash
docker-compose up -d
```

### Stop containers
```bash
docker-compose down
```

### Stop and remove containers and volumes
```bash
docker-compose down -v
```

### View logs
```bash
docker-compose logs -f
```

### Access WordPress container
```bash
docker-compose exec wordpress bash
```

### Access database container
```bash
docker-compose exec database bash
```

## Theme Development

When you make changes to the theme files in `portfolio-theme/`, they will be automatically synced to the WordPress container due to the volume mapping in docker-compose.yml.

Simply refresh your browser to see the changes.

## Database Management

You can access the database using phpMyAdmin at http://localhost:8081 or connect directly:

- **Host:** localhost
- **Port:** 3306
- **Database:** wordpress
- **Username:** wordpress
- **Password:** wordpress

## Troubleshooting

### Port already in use
If port 8080 or 8081 is already in use, you can change the ports in docker-compose.yml:

```yaml
ports:
  - "8082:80"  # Change 8080 to 8082
```

### Containers won't start
```bash
docker-compose down -v
docker-compose up -d
```

### Can't access WordPress
1. Check if containers are running: `docker-compose ps`
2. Check logs: `docker-compose logs`
3. Make sure Docker Desktop is running

### Theme not showing up
1. Make sure the portfolio-theme folder is in the correct location
2. Check that style.css has the required theme headers
3. Try deactivating and reactivating the theme

## Customization

After setting up WordPress, you'll want to customize the theme with your information:

1. **Edit theme files:**
   - Open files in `portfolio-theme/` directory
   - Edit the content in page templates (page-about.php, page-projects.php, etc.)
   - Update colors and styles in style.css

2. **Update site information:**
   - Go to Settings > General in WordPress admin
   - Update site title and tagline

3. **Add your content:**
   - Replace placeholder text with your actual information
   - Add your project details, skills, and contact information
   - Update links to your GitHub, LinkedIn, etc.

## Next Steps

After customizing your portfolio locally:

1. Test thoroughly on different browsers and devices
2. Optimize images and performance
3. Set up a contact form (using Contact Form 7 or similar plugin)
4. Prepare for deployment to a hosting provider

See README.md for deployment options and instructions.
