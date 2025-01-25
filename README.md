
![Logo](https://static.kabum.com.br/conteudo/icons/logo.svg) 
# 🛠️ Gerenciador de Clientes

Gerenciador de clientes é uma plataforma para facilitar o cadastro, edição e remoção dos clientes do seu sistema. 

Na construção da aplicação foi utilizado boas práticas, sendo elas: a aplição do SOLID, testes automatizados, camadas desacopladas e a escalabilidade.

Para o cliente da aplicação, foi utilizada uma arquitetura de camadas, Barrel Pattern, Composition Pattern, componentização entre outras técnicas de otimização na utilização da stack React.

Para o servidor da aplicação, foi utilizado uma arquitetura próxima do clean architecture, Adapter Pattern, InMemory Repository Pattern e Factory Pattern.


## 💻 Stack utilizada

**Front-end:** React, Redux, TailwindCSS

**Back-end:** PHP, PHP UNIT.


## 📖 Funcionalidades

- Autenticação do usuário
- Cadastro do usuário

- Cadastro de clientes
- Listagem de clientes
- Remoção de clientes
- Edição de clientes


## 💡 Ideias

Uma ideia seria transformar essa aplicação em um CRM, onde o time de suporte teria uma facilidade maior ao gerenciar os clientes.


## 🚀 Rodar o projeto

Rode o projeto utilizando o docker compose.

```bash
  docker compose up -d
```

Após isso, o servidor estará rodando em http://localhost:8000.
## Documentação da API

#### Retorna todos os itens

```http
  GET /customers
```

#### Retorna um item

```http
  POST /customers
```

| Corpo da requisição   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `nome`      | `string` | **Obrigatório**. O Nome do cliente que você quer cadastrar. |
| `telefone`      | `string` | **Obrigatório**. O Telefone do cliente que você quer cadastrar. |
| `cpf`      | `string` | **Obrigatório**. O CPF do cliente que você quer cadastrar. |
| `rg`      | `string` | **Obrigatório**. O RG do cliente que você quer cadastrar. |
| `data_nascimento`      | `string` | **Obrigatório**. A data de nascimento do cliente que você quer cadastrar. |


