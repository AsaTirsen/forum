#!/usr/bin/env bash
#
#
# Copy the configuration files
rsync -av --exclude navbar --exclude page.php vendor/asatirsen/forum/config ./

# Copy the view
rsync -av vendor/asatirsen/forum/view ./

# copy the src directory
rsync -av vendor/asatirsen/forum/src ./


# copy the src directory
rsync -av vendor/asatirsen/forum/sql ./
