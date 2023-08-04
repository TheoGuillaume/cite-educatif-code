#!/bin/bash

#   ./auto_cp.sh

# Chemin du répertoire "cite-educative"
source_dir="/homez.1951/agoracg/www/cite-educative/public"

# Chemin du répertoire de destination
destination_dir="/homez.1951/agoracg/www/"

# Copie récursive des fichiers et dossiers
cp -R "$source_dir/assets" "$destination_dir"
cp -R "$source_dir/dist" "$destination_dir"
cp -R "$source_dir/docs" "$destination_dir"
cp "$source_dir/favicon.ico" "$destination_dir"
cp "$source_dir/index.php" "$destination_dir"
cp "$source_dir/robots.txt" "$destination_dir"
cp -R "$source_dir/static" "$destination_dir"
cp -R "$source_dir/upload" "$destination_dir"
cp -R "$source_dir/uploads" "$destination_dir"
