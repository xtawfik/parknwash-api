# ParknWash API - Coolify Deployment Guide

This guide will help you deploy the ParknWash API to your server using Coolify.

## Prerequisites

1. **Coolify installed** on your server
2. **Git repository** with your code
3. **Domain name** (optional but recommended)
4. **SSL certificate** (Coolify can handle this automatically)

## Deployment Steps

### 1. Prepare Your Repository

Make sure your repository contains the following files:
- `Dockerfile` - Production-ready Docker configuration
- `docker-compose.yml` - Service orchestration
- `coolify.yaml` - Coolify-specific configuration
- `deploy.sh` - Deployment script
- `.dockerignore` - Excludes unnecessary files from build
- `env.example` - Environment variables template

### 2. Set Up Coolify Project

1. **Login to Coolify Dashboard**
   - Access your Coolify instance
   - Navigate to the dashboard

2. **Create New Project**
   - Click "New Project"
   - Choose "Application"
   - Select "Docker Compose" as deployment method

3. **Configure Source**
   - **Source**: Git Repository
   - **Repository URL**: Your Git repository URL
   - **Branch**: `main` or your production branch
   - **Docker Compose File**: `docker-compose.prod.yml` (use this instead of docker-compose.yml)

4. **Important**: Make sure to select "Docker Compose" and NOT "Build Pack" to avoid Nixpacks issues

### 3. Configure Environment Variables

In Coolify, add the following environment variables:

#### Required Variables:
```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
APP_KEY=base64:your-generated-key

DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=parknwash_api
DB_USERNAME=your-db-username
DB_PASSWORD=your-secure-password

REDIS_HOST=your-redis-host
REDIS_PORT=6379
```

#### Optional Variables:
```
API_DEBUG=false
REQUESTS_DEBUG=false
QUERIES_DEBUG=false
DEBUGBAR_ENABLED=false
APP_LOG_LEVEL=error

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=noreply@your-domain.com
```

### 4. Configure Services

#### Database (MySQL)
- **Service Type**: MySQL
- **Version**: 8.0
- **Database Name**: `parknwash_api`
- **Username**: `parknwash_user`
- **Password**: Generate a secure password

#### Redis (Optional but Recommended)
- **Service Type**: Redis
- **Version**: 7-alpine
- **Port**: 6379

### 5. Configure Networking

1. **Create Network**: Coolify will create a network automatically
2. **Port Mapping**: 
   - **Host Port**: 80 (or your preferred port)
   - **Container Port**: 80

### 6. Configure Domain (Optional)

1. **Add Domain**: Your domain name (e.g., `api.parknwash.com`)
2. **SSL**: Enable automatic SSL certificate generation
3. **Force HTTPS**: Enable redirect from HTTP to HTTPS

### 7. Deploy

1. **Review Configuration**: Double-check all settings
2. **Deploy**: Click "Deploy" button
3. **Monitor**: Watch the deployment logs for any issues

## Post-Deployment

### 1. Run Database Migrations

After successful deployment, run migrations:

```bash
# Connect to your server and run:
docker exec -it parknwash-api php artisan migrate --force
```

### 2. Verify Application

1. **Health Check**: Visit your domain to ensure the API is responding
2. **API Endpoints**: Test your main API endpoints
3. **Logs**: Check application logs for any errors

### 3. Set Up Monitoring

1. **Enable Logs**: Configure log aggregation
2. **Health Checks**: Set up monitoring endpoints
3. **Backups**: Configure database backups

## Troubleshooting

### Common Issues:

1. **Nixpacks Build Error**
   - **Error**: "php80 has been dropped due to the lack of maintenance"
   - **Solution**: Make sure you're using "Docker Compose" deployment method, not "Build Pack"
   - **Alternative**: Use `docker-compose.prod.yml` instead of `docker-compose.yml`

2. **Permission Errors**
   ```bash
   docker exec -it parknwash-api chmod -R 755 storage bootstrap/cache
   docker exec -it parknwash-api chown -R www-data:www-data storage bootstrap/cache
   ```

2. **Database Connection Issues**
   - Verify database credentials
   - Check network connectivity
   - Ensure database service is running

3. **Cache Issues**
   ```bash
   docker exec -it parknwash-api php artisan config:clear
   docker exec -it parknwash-api php artisan cache:clear
   ```

4. **Storage Issues**
   ```bash
   docker exec -it parknwash-api php artisan storage:link
   ```

### Logs

Check logs in Coolify dashboard or via command line:
```bash
docker logs parknwash-api
```

## Security Considerations

1. **Environment Variables**: Never commit sensitive data to Git
2. **Database**: Use strong passwords and limit access
3. **SSL**: Always use HTTPS in production
4. **Updates**: Regularly update dependencies and Coolify
5. **Backups**: Set up automated backups

## Maintenance

1. **Regular Updates**: Keep your application and dependencies updated
2. **Monitoring**: Monitor application performance and logs
3. **Backups**: Regular database and file backups
4. **Security**: Regular security audits and updates

## Support

If you encounter issues:
1. Check Coolify documentation
2. Review application logs
3. Verify configuration settings
4. Contact your system administrator 