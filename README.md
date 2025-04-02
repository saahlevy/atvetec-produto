
# Marketplace Laravel
Decidi expandir um pouco o projeto, para fazer sentido a integração usuário, produto e categoria do projeto anterior.

Atualmente, o sistema permite que usuários explorem produtos e categorias, enquanto vendedores podem cadastrar ofertas e, em alguns casos, criar novos produtos. A autenticação é feita com o  **Laravel Breeze** e para o banco de dados, usei o MySQL.

---

## Regras de Negócio do Projeto

### Produtos
- Qualquer usuário (logado ou não) pode visualizar os produtos e suas respectivas ofertas.  
- Somente **vendedores autenticados** podem **criar** produtos.  
- **Edição e exclusão de produtos não são permitidas** para vendedores.  

### Ofertas de Produtos
- Somente **vendedores autenticados** podem **criar, editar e excluir** suas próprias ofertas.  
- Cada oferta pertence a um produto e é vinculada a um vendedor específico.  
- Apenas **administradores (no futuro)** poderão editar e excluir categorias.  

### Usuários e Autenticação
- O sistema diferencia **vendedores** e **usuários comuns**.  
- Apenas usuários autenticados podem adicionar itens ao carrinho e visualizar seu perfil.  
- Vendedores não têm acesso aos carrinhos dos usuários.  

---

## Problemas/Anotações do Desenvolvimento
- Carrinho de compras ainda não está pronto.  
- A rota `create` de `product-offers` não está funcionando corretamente.  
- No geral, tive bastante problemas com colisão de rota, consegui debugar a maioria, mas não consegui deixar o projeto 100%. Se puder me dar um feedback dessa questão na correção eu agradeço.
- Aprendi sobre o conceito de layouts e apliquei mesmo nas views sem o css.