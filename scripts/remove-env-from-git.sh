#!/bin/bash

# Script para remover el archivo .env del repositorio de Git
# manteniendo el archivo local

echo "🔧 Removiendo .env del repositorio de Git..."

# Verificar si estamos en un repositorio Git
if [ ! -d ".git" ]; then
    echo "❌ Error: No estamos en un repositorio Git"
    exit 1
fi

# Verificar si el archivo .env existe
if [ ! -f ".env" ]; then
    echo "❌ Error: El archivo .env no existe"
    exit 1
fi

# Verificar si el archivo está siendo rastreado
if git ls-files --error-unmatch .env >/dev/null 2>&1; then
    echo "📁 El archivo .env está siendo rastreado por Git"
    echo "🗑️  Removiendo .env del índice de Git (manteniendo archivo local)..."
    git rm --cached .env
    echo "✅ Archivo .env removido del índice de Git"
else
    echo "✅ El archivo .env ya NO está siendo rastreado por Git"
fi

# Verificar que .env esté en .gitignore
if grep -q "^\.env$" .gitignore; then
    echo "✅ .env está correctamente listado en .gitignore"
else
    echo "⚠️  Agregando .env al .gitignore..."
    echo ".env" >> .gitignore
fi

# Mostrar estado actual
echo ""
echo "📊 Estado actual:"
git status --porcelain | grep -E "\.(env|gitignore)$" || echo "No hay cambios pendientes relacionados con archivos de entorno"

echo ""
echo "🎉 Proceso completado. Recuerda hacer commit de los cambios:"
echo "git add .gitignore"
echo "git commit -m 'Remove .env from repository and update .gitignore'"
echo "git push origin main"