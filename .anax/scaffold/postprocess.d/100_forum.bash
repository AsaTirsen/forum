#!/usr/bin/env bash
#
#
# Copy the configuration files
rsync -av vendor/forum/forum/config ./

# Copy the view
rsync -av vendor/forum/forum/view ./

# copy the src directory
rsync -av vendor/forum/forum/src ./
