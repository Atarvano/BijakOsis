#!/bin/bash

# Create database directory if it doesn't exist
mkdir -p database

# Create SQLite database file if it doesn't exist
touch database/database.sqlite

# Set permissions
chmod 664 database/database.sqlite
