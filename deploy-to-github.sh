#!/bin/bash

# Script para subir el proyecto Devstagram a GitHub
# Ejecuta este script desde la raíz del proyecto

echo "🚀 Subiendo proyecto Devstagram a GitHub..."

# Verificar si estamos en un repositorio git
if [ ! -d ".git" ]; then
    echo "📁 Inicializando repositorio Git..."
    git init
fi

# Configurar el repositorio remoto
echo "🔗 Configurando repositorio remoto..."
git remote remove origin 2>/dev/null
git remote add origin https://github.com/davto-xyz/devstagram.git

# Crear rama main si no existe
git checkout -b main 2>/dev/null || git checkout main

# Añadir todos los archivos
echo "📝 Añadiendo archivos al staging..."
git add .

# Crear commit
echo "💾 Creando commit..."
git commit -m "Subir proyecto Devstagram completo

- Sistema de autenticación con Laravel
- Controladores para posts, login y registro  
- Modelos User y Post
- Configuración de Tailwind CSS
- Integración con Dropzone para subida de imágenes
- Estructura completa del proyecto Laravel"

# Subir a GitHub
echo "☁️ Subiendo a GitHub..."
git push -u origin main

echo "✅ ¡Proyecto subido exitosamente a GitHub!"
echo "🔗 Repositorio: https://github.com/davto-xyz/devstagram"
