#!/bin/bash

# Build script for Render
echo "🚀 Starting BijakOSIS build..."

# Install Composer dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build
echo "🔨 Building assets..."
npm install
npm run build

# Set permissions
echo "🔧 Setting permissions..."
chmod -R 755 bootstrap/cache
chmod -R 755 storage

# Migrate database
echo "🗄️ Running migrations..."
php artisan migrate --force

echo "✅ Build complete!"