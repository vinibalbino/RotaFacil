# Viagens App

Este repositório contém a aplicação **Viagens App**, um sistema para controle de viagens com funcionalidades para gerenciamento de motoristas, veículos e viagens. A aplicação foi desenvolvida utilizando **Laravel** com **PostgreSQL** como banco de dados.

## Funcionalidades Principais

### Veículos
- Cadastro de veículos com os seguintes campos:
  - Modelo
  - Ano
  - Data de aquisição
  - KM rodados no momento da aquisição
  - Renavam (deve ser único)
  - Placa (deve ser única)

### Motoristas
- Cadastro de motoristas com os seguintes campos:
  - Nome
  - Data de nascimento (o motorista deve ter no mínimo 18 anos)
  - Número da CNH (deve ser único)

### Viagens
- Registro de viagens com:
  - Veículo
  - KM inicial no início da viagem
  - KM final na volta da viagem
  - Associação de um ou mais motoristas à viagem
  
## Estrutura do Banco de Dados

O banco de dados possui as seguintes tabelas principais:
- **veiculos**: Armazena os dados dos veículos.
- **motoristas**: Armazena os dados dos motoristas.
- **viagens**: Registra as viagens realizadas.
- **motorista_viagem**: Tabela de relacionamento entre motoristas e viagens (relacionamento muitos-para-muitos).

![dataBase](https://github.com/user-attachments/assets/86a51814-8a64-452d-a773-a5728f6ad8e9)


## Tecnologias Utilizadas

- **Framework:** Laravel
- **Banco de Dados:** PostgreSQL
- **Linguagem:** PHP
- **Frontend:** Blade Templates

## Instalação e Configuração

1. Clone o repositório:
   ```bash
   git clone https://github.com/vinibalbino/viagens-app.git
   cd viagens-app
   ```

2. Instale as dependências do projeto:
   ```bash
   composer install
   ```

3. Configure o arquivo `.env` com os detalhes do banco de dados:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=viagens
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Execute as migrações e seeders para criar e popular o banco de dados:
   ```bash
   php artisan migrate --seed
   ```

6. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

A aplicação estará acessível em [http://localhost:8000](http://localhost:8000).

## Estrutura do Projeto

- **Controllers:** Localizados em `app/Http/Controllers`, gerenciam a lógica de negócio.
- **Models:** Localizados em `app/Models`, representam as entidades do banco de dados.
- **Migrations:** Localizadas em `database/migrations`, definem a estrutura do banco de dados.
- **Seeders:** Localizados em `database/seeders`, populam o banco de dados com dados iniciais.
- **Views:** Localizadas em `resources/views`, gerenciam o frontend utilizando Blade Templates.

## Comandos Importantes

- Rodar as migrações:
  ```bash
  php artisan migrate
  ```

- Rodar os seeders:
  ```bash
  php artisan db:seed
  ```

- Limpar o cache:
  ```bash
  php artisan cache:clear
  ```

## Testes

Para rodar os testes da aplicação, execute:
```bash
php artisan test
```
## Ao Se Fazer

- [ ] Fazer com que o usuário possa editar a viagem e fazer um check para que a viagem terminou

## Contribuições

Contribuições são bem-vindas! Para contribuir:
1. Faça um fork do repositório.
2. Crie uma branch para a sua feature ou correção.
3. Envie um pull request com uma descrição clara das alterações realizadas.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

## Contato

Criado por **Vinícius Balbino**. Entre em contato pelo [GitHub](https://github.com/vinibalbino).

