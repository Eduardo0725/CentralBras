# CentralBrás

## Requisitos Funcionais

- [x] RF01: Cadastro de usuários;
- [x] RF02: Login com email e senha;
- [ ] RF03: Opção de vinculo/desvinculo com conta Google;
- [ ] RF04: Login com a conta Google;
- [ ] RF05: Cadastro de produtos;
- [ ] RF06: Listar produtos;
- [ ] RF07: Cadastro de vendas;
- [ ] RF08: Listar vendas;
- [ ] RF08: Detalhes da venda;
- [ ] RF09: Alteração da situação da venda;
- [ ] RF10: Cadastro de compras;
- [ ] RF11: Listar compras;
- [ ] RF12: Detalhes da compra;
- [ ] RF13: Cadastro de cartões;
- [ ] RF14: Listar cartões;
- [ ] RF15: Carrinho de compras;
- [ ] RF16: Cadastro de favoritos;
- [ ] RF17: Listar favoritos;
- [ ] RF18: Alteração de email e/ou senha;
- [ ] RF19: Alteração de dados pessoais;
- [ ] RF20: Alteração do endereço;
- [ ] RF21: Exclusão de produtos, cartões e favoritos;
- [ ] RF22: Cadastro de comentários;
- [ ] RF23: Listar comentários;
- [ ] RF24: Página do produto;

## Requisitos não funcionais:

- [ ] RNF01: Desempenho - Receber somente os dados principais da página, e os dados segundários através de funções assíncronas;
- [ ] RNF02: Segurança - Criptografia nas senhas;
- [ ] RNF03: Consistência - Os cadastros dos usuários serão colocados em fila de processamento (queue);

## Regras de Negócio:

- [x] RN01: Não pode existir duas contas com o mesmo email e/ou CPF;
- [ ] RN02: Após o cadastramento de algum usuário, deverá ser enviado um email de confirmação;
- [x] RN03: Cada produto deverá ter um codigo de identificação;
- [ ] RN04: O carrinho de compras poderá receber produtos com ou sem login do usuário;
- [ ] RN05: As compras deverão ser finalizadas somente com o usuário logado;
- [ ] RN06: A adição do produto ao favorito deverá ser feito somente com o usuário logado;
- [ ] RN07: Se a compra for em dinheiro deve ter pelo menos um cartão caso aconteça algum problema;
- [ ] RN08: Após a compra, deve ser informado qual a situação do produto, que podem ser quatro, "Para preparar", "Pronto para enviar", "Em trânsito" e "Concluído";
