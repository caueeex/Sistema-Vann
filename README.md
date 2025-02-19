# README - Banco de Dados banco_vann(4)

## 📌 Descrição
O banco de dados **banco_vann(4)** foi desenvolvido para armazenar todas as informações do sistema de gestão de vans escolares. Ele é compatível com **MySQL** e pode ser gerenciado através do **HeidiSQL**.

## 🚀 Instalação
### Requisitos:
- MySQL Server instalado
- HeidiSQL (opcional, para gerenciar o banco de forma gráfica)

### Passos para Importar o Banco de Dados:
1. **Baixe o arquivo SQL** correspondente ao banco (**banco_vann(4).sql**).
2. **Abra o MySQL Workbench ou HeidiSQL** e conecte-se ao servidor.
3. **Crie o banco de dados**:
   ```sql
   CREATE DATABASE banco_vann;
   USE banco_vann;
   ```
4. **Importe o arquivo SQL**:
   - No MySQL Workbench, utilize a opção "Data Import".
   - No HeidiSQL, utilize "Arquivo -> Carregar arquivo SQL" e execute o script.
5. **Verifique se as tabelas foram criadas corretamente**:
   ```sql
   SHOW TABLES;
   ```

## 🛠 Estrutura do Banco
### Principais Tabelas:
- **usuarios** (armazenamento de pais, alunos e condutores)
- **vans** (informações sobre os veículos)
- **rotas** (percursos definidos para cada van)
- **localizacoes** (armazenamento de coordenadas GPS em tempo real)

Se houver problemas na instalação, verifique se o MySQL está rodando corretamente e se os arquivos estão bem formatados.

---

# README - Sistema de Vans Escolares 🚌📍

## 📌 Sobre o Projeto
Este sistema permite que **pais acompanhem em tempo real** a localização de seus filhos durante o trajeto escolar. Os **condutores** têm acesso a um painel de controle para evitar esquecimentos e otimizar as rotas.

## 🎯 Funcionalidades Principais
✅ **Pais acompanham a localização do aluno em tempo real** via GPS.
✅ **Condutores acessam um painel** com lista de alunos e paradas.
✅ **Otimização das rotas**, reduzindo atrasos e melhorando a segurança.
✅ **Notificações** de chegada e saída dos alunos.

## 🛠 Tecnologias Utilizadas
- **Backend:** PHP, MySQL
- **Frontend:** HTML, CSS, JavaScript
- **API de Localização:** Google Maps API
- **Banco de Dados:** MySQL, HeidiSQL (opcional para gestão)

## 🚀 Como Configurar o Projeto
### 1️⃣ Configurar o Banco de Dados
- Siga as instruções do README do **banco_vann(4)** para importar as tabelas.

### 2️⃣ Instalar Dependências
Caso use composer:
```sh
composer install
```

### 3️⃣ Configurar o `.env`
Crie um arquivo `.env` e adicione suas credenciais do banco:
```
DB_HOST=localhost
DB_NAME=banco_vann
DB_USER=root
DB_PASS=
```

### 4️⃣ Rodar o Servidor Local
```sh
php -S localhost:8000
```
Acesse no navegador: [http://localhost:8000](http://localhost:8000)

## 📌 Contato e Contribuição
Se deseja contribuir, envie um pull request ou entre em contato.

📧 Email: contato@seudominio.com

