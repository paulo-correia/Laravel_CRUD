# CRUD em Laravel

Rotas:

/usuarios  => Lista Todos os usuários, se não tiver nenhum abre a rota de criação

/usuarios/create => Cria um Usuário

/usuarios/{id}/edit => Edita um Usuário, mas a edição é feita pela Listagem

---

Tela Inicial (**Read**)

Deve conter a listagem de usuários já cadastrados, com as colunas: Nome, E-mail, Data de Criação e Ações.
A coluna ações deve conter 2 botões: Editar e Excluir.
**Editar**: Ao clicar o usuário vai para a tela de edição dos dados do usuário (Update)
**Excluir**: Botão que excluirá um usuário da lista (Delete)

Como no primeiro momento o sistema não possuirá nenhum usuário, essa tela inicial deve contar um botão para criar um novo usuário. Que é a tela na sequência do fluxo.

Tela de inserção (**Create**) 

Tela onde deve conter o formulário para criar um usuário novo no sistema.
**Campos**: Nome, E-mail, Data de Nascimento e Senha. 

Regras de validação: 
    • Nome: Campo obrigatório 
    • E-mail: Campo obrigatório
    • Data de nascimento: Máscara de data no formato DD/MM/AAAA. Campo não obrigatório. 
    • Senha: Campo obrigatório de no mínimo 8 caracteres. 

No final do formulário devem existir 2 botões: Salvar e Cancelar.
**Salvar**: Valida as regras acima, e se estiverem OK, registra os dados no banco de dados e apresenta uma mensagem de sucesso ou erro (caso ocorra algum erro no backend). 
**Cancelar**: Volta para a tela inicial

Tela de edição (**Update**)

Ao clicar no botão Editar da listagem da tela inicial, o sistema deve carregar a tela de edição do usuário selecionado. Basicamente é a mesma tela de inserção com o formulário de dados descritos acima (item 2).

Mas o formulário já deve estar com os campos preenchidos. E ao salvar ele deve alterar os dados do usuário já cadastrado.

**Atenção**: O formulário não pode criar um novo usuário! E sim, editar o usuário selecionado na listagem. 

Exclusão (**Delete**)

Essa ação não possui uma tela. Na tela inicial, ao clicar em Excluir, deve ser apresentada uma caixa de confirmação com a mensagem: “Você tem certeza que deseja excluir esse usuário?” 

E os botões de **SIM** e **NÃO**.
**Sim**: Exclui o usuário do banco de dados e recarrega a tela de inicial. O usuário deve “sumir” da listagem por não estar mais no banco de dados.
**Não**: Fecha a caixa de diálogo apenas.

---

Banco de dados

Deve conter apenas uma tabela chamada: usuários
Campos:
    • ID (auto incremento)
    • Nome (varchar 255)
    • E-mail (varchar 255)
    • Senha (varchar 255)
    • Data de Nascimento (varchar 10)
    • Data de criação (date time)





