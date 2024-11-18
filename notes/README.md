<p align="center">
<img src="https://github.com/user-attachments/assets/cc747c73-24ff-48d2-976f-e2cd2318cbda" align="center"/>
</p>

Sistema de gerenciamento de eventos e suporte para a universidade, desenvolvido com Laravel. Este sistema permite o registro, acompanhamento e gerenciamento de eventos dos alunos, com funcionalidades de Soft Deletes, criptografia de dados e controle de sessão seguro.

## Funcionalidades

- *Cadastro de Eventos*: Administradores podem cadastrar eventos, que os alunos podem associar para comprovar a participação.
- *Controle de Participação*: O sistema monitora as horas dos alunos, assegurando que cada aluno cumpra as horas mínimas exigidas para o semestre.
- *Criptografia e Segurança*: Utiliza criptografia segura para dados sensíveis, incluindo IDs de notas e sessões de usuários, garantidos pela chave de criptografia configurada no arquivo `.env`.
- *Soft Deletes*: Todos os dados que são excluídos do sistema são marcados como deletados de forma suave, sem remoção física dos registros.
- *Gestão de Usuários*: Sistema para gerenciar os alunos, garantindo que não haja submissões duplicadas de certificados e que as informações sejam atualizadas conforme necessário.
- *Controle de Sessão*: As sessões dos usuários são gerenciadas de forma segura, com um ID de sessão criptografado pela chave configurada no `.env`.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para o desenvolvimento backend.
- **Bootstrap**: Framework CSS para o design responsivo.
- **MySQL**: Banco de dados relacional utilizado para armazenar as informações.
- **Criptografia com Laravel**: A chave de criptografia configurada no arquivo `.env` é usada para proteger dados sensíveis, como IDs e sessões de usuários.

## Instalação

Siga as etapas abaixo para rodar o sistema em sua máquina local:

1. **Clone o repositório**:
   ```bash
   https://github.com/SLeess/List-Projects-Laravel.git
   ```

2. **Instale as dependências via Composer**:
   No diretório do projeto, execute:
   ```bash
   composer install
   ```

3. **Configure o arquivo `.env`**:
   Copie o arquivo `.env.example` para `.env` e configure as variáveis necessárias, como a chave de criptografia:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configuração do banco de dados**:
   Atualize as configurações do banco de dados no arquivo `.env` com as credenciais adequadas.

5. **Execute as migrations e seeders**:
   Para criar as tabelas e popular o banco com dados iniciais, execute:
   ```bash
   php artisan migrate --seed
   ```

6. **Inicie o servidor**:
   Execute o servidor de desenvolvimento do Laravel:
   ```bash
   php artisan serve
   ```

## Estrutura de Dados

O sistema utiliza **Soft Deletes**, permitindo que os registros não sejam removidos permanentemente, mas sim marcados como excluídos. Isso pode ser visualizado nos modelos que implementam o trait `SoftDeletes` do Laravel.

### Notas e Sessões

- **Notas**: O ID das notas é armazenado de forma segura e criptografado.
- **Sessões**: O ID da sessão do usuário é criptografado utilizando a chave definida na variável `APP_KEY` no arquivo `.env`, garantindo a segurança durante o uso.

## Contribuição

Sinta-se à vontade para contribuir com este projeto! Se você encontrou um bug ou tem sugestões de melhorias, por favor, abra uma issue ou envie um pull request.

## Licença

Este projeto está sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
```
Esse README agora reflete as mudanças e funcionalidades do sistema implementadas.
