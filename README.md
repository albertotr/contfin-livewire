# 💰 Controle Financeiro Pessoal

[![Licença: GPL v3](https://img.shields.io/badge/Licença-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-pink.svg)](https://livewire.laravel.com)

Sistema de controle financeiro pessoal desenvolvido com Laravel e Livewire. Gerencie suas contas, cartões de crédito, receitas e despesas de forma simples e intuitiva.

## ✨ Funcionalidades

### 💵 Lançamentos Financeiros
- Registro de receitas e despesas
- Categorização personalizada
- Lançamentos parcelados e recorrentes

### 🏦 Contas
- Múltiplas contas (corrente, poupança, dinheiro)
- Transferências entre contas
- Saldo atualizado em tempo real

### 💳 Cartões de Crédito
- Cadastro de cartões com limite e data de vencimento
- Controle de faturas
- Compras parceladas

### 📊 Dashboard
- Resumo financeiro (saldo, receitas, despesas)
- Gráfico de gastos por categoria
- Últimos lançamentos
- Faturas futuras

## 🚀 Tecnologias

- **Laravel 11** - Framework PHP
- **Livewire 3** - Componentes dinâmicos
- **TailwindCSS** - Estilização
- **MySQL** - Banco de dados

## 📋 Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e NPM
- MySQL

## 🔧 Instalação

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/controle-financeiro.git
cd controle-financeiro

# Instale as dependências
composer install
npm install

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no arquivo .env
# DB_DATABASE=controle_financeiro
# DB_USERNAME=root
# DB_PASSWORD=

# Execute as migrações
php artisan migrate
php artisan db:seed

# Compile os assets
npm run build

# Inicie o servidor
php artisan serve
