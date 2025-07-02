#!/bin/bash

#Script para automatizar a criação do banco de dados "nutrifit" e suas tabelas.

#---CONFIGURAÇÕES---
DB_NAME="nutrifit"
DB_USER="postgres"
DB_PASS="88548582"
SQL_FILE="init_nutrifit.sql"

set -e

export PGPASSWORD=#DB_PASS

if ! psql -U "$DB_USER" -lqt | cut -d \| -f 1 | grep -qw "$DB_NAME"; then
	echo "-> Banco de dados '$DB_NAME' não encontrado. Criando..."
	createdb -U "$DB_USER" "$DB_NAME"
	echo "-> Banco de dados '$DB_NAME' criado."
else
	echo "-> Banco de dados '$DB_NAME' já existe. Nenhuma ação nencessária"
fi

echo "-> Executando o script SQL '$SQL_FILE' no banco '$DB_NAME'..."
psql -v ON_ERROR_STOP=1 --username "$DB_USER" --dbname "$DB_NAME" -f "$SQL_FILE"

unset PGPASSWORD

echo ""
echo "--------------------------------------------------------"
echo "  Configuração do banco de dados concluída com sucesso! "
echo "--------------------------------------------------------"
