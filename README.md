> CONFIGURAR PROJETO

- git clone
- composer install
- cp .env.example .env
- php artisan key:generate
- configurar banco (.ENV)
- php artisan migrate
- php artisan serve
- npm run dev

> SEEDERS E FACTORIES:
- php artisan migrate:fresh; (apaga dados do BD e executa as migrations novamente);
- php artisan db:seed; (preenche o banco com dados da factory a partir do seed);

> ESTRUTURA DE PASTAS VUE:
Dashboard

Livro/
- ListarLivro
- CadastrarLivro
- EditarLivro

Leitor/
- ListarLeitor
- CadastrarLeitor
- EditarLeitor
- HistoricoLeitor

Locacao/
- ListarLocacao
- CadastrarLocacao

Relatorio/
- LivroPorLeitor


> DESCRIÇÃO GERAL:

> 06 - Desenvolva um sistema para locação de livros. 
> Requisitos Funcionais 
1. Livros: título, autor, categoria, status. 
2. Leitores: nome, documento, endereço. 
3. Locações: leitor, livro, datas de retirada e devolução. 
> Regras de Negócio 
1. Livro só pode ser emprestado se estiver “disponível”. 
2. Ao emprestar → status = “emprestado”. 
3. Ao devolver → status = “disponível”. 
4. Uma locação ativa por livro. 
5. Não excluir livro com histórico.

> Descrição das atividades

Baseado nos temas já distribuídos em sala e detalhados no arquivo em anexo, desenvolva um projeto completo em Laravel, contendo todas as camadas necessárias para o pleno funcionamento do sistema.

O sistema deve incluir:

1. Back-end
Migrações, Models, Controllers, Factories (se necessário) e Routes organizadas conforme as boas práticas do framework.

Implementação completa do CRUD para todas as tabelas envolvidas em seu tema.

Aplicação das Regras de Negócio descritas no enunciado correspondente ao seu tema.

Implementação do relatório obrigatório indicado na atividade.

2. Front-end
Interface construída utilizando Bootstrap, garantindo navegação intuitiva, tabelas organizadas e formulários funcionais.

Páginas para listar, cadastrar, editar e visualizar dados.

Páginas específicas para os relatórios, conforme exigido no seu tema.

> Relatório Obrigatório:

Livros emprestados por leitor: listar todos os livros que um leitor já alugou 
ou está alugando. 

> Orientações Importantes

A aceitação do trabalho está condicionada a uma banca de até 5 perguntas, feitas pelo professor, destinadas a confirmar se o aluno compreende profundamente o funcionamento do código entregue e se é realmente o autor da solução apresentada.

O uso de ferramentas de Inteligência Artificial é permitido, porém:

Apenas para depuração, refinamentos, pequenos ajustes e apoio no aprendizado.

O aluno deve entender totalmente o código que está entregando.

O uso de IA para gerar código que o aluno não é capaz de explicar poderá resultar na reprovação do trabalho (nota zero).

O projeto deve rodar sem erros e estar devidamente organizado. Nomes de tabelas, modelos e relacionamentos devem seguir a ementa do seu tema.


