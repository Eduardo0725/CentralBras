# CentralBrás

## Requisitos Funcionais

- [ ] RF01: Cadastro de usuários;
- [ ] RF02: Login com email e senha;
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
- [ ] RF13: Cadastro de faturas;
- [ ] RF14: Listar faturas;
- [ ] RF15: Detalhes da fatura;
- [ ] RF16: Cadastro de cartões;
- [ ] RF17: Listar cartões;
- [ ] RF18: Carrinho de compras;
- [ ] RF19: Cadastro de favoritos;
- [ ] RF20: Listar favoritos;
- [ ] RF21: Alteração de email e/ou senha;
- [ ] RF22: Alteração de dados pessoais;
- [ ] RF23: Alteração do endereço;
- [ ] RF24: Exclusão de produtos, cartões e favoritos;
- [ ] RF25: Cadastro de comentários;
- [ ] RF26: Listar comentários;
- [ ] RF27: Página do produto;

## Requisitos não funcionais:

- [ ] RNF01: Desempenho - Receber somente os dados principais da página, e os dados segundários através de funções assíncronas;
- [ ] RNF02: Segurança - Criptografia nas senhas;
- [ ] RNF03: Consistência - Os cadastros dos usuários serão colocados em fila de processamento (queue);

## Regras de Negócio:

- [ ] RN01: Não pode existir duas contas com o mesmo email e/ou CPF;
- [ ] RN02: Após o cadastramento de algum usuário, deverá ser enviado um email de confirmação;
- [ ] RN03: Cada produto deverá ter um codigo de identificação;
- [ ] RN04: O carrinho de compras poderá receber produtos com ou sem login do usuário;
- [ ] RN05: As compras deverão ser finalizadas somente com o usuário logado;
- [ ] RN06: A adição do produto ao favorito deverá ser feito somente com o usuário logado;
- [ ] RN07: Se a compra for em dinheiro deve ter pelo menos um cartão caso aconteça algum problema;
- [ ] RN08: Após a compra, deve ser informado qual a situação do produto, que podem ser quatro, "Para preparar", "Pronto para enviar", "Em trânsito" e "Concluído";
