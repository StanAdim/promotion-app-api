#!/bin/bash

# MySQL database credentials
db_user="root"
db_password="BeyondOrder24"
db_name="staging_ictc"

# Backup directory path
backup_dir="/home/db_script"

# Backup filename prefix
backup_filename_prefix="innovation_DB_$(date +%Y%m%d%H%M%S)"

# Create the backup
mysqldump -u"$db_user" -p"$db_password" "$db_name" > "$backup_dir/$backup_filename_prefix.sql"

echo "MySQL backup created successfully: $backup_dir/$backup_filename_prefix.sql"