# Sistema ID_Plate

## Introdução

Sistema de gerenciamento para os dados capturados da identificação de placas através de uma IA.

Pode se realizar cadastro de placas relacionado à cadastro de pessoas, e pode relacionar à um usuário.

Com nosso sistema o cliente pode ter um acesso fácil ao sistema através de um cadastro rápido.

## Ações disponiveis

(BackLog3)Cadastro de Usuários;
Cadastro de Funcionários;
Cadastro de Placas;
Cadastro de eventos;
BackLog2)Cadastro de horários e quantidades de veículos disponíves.
Visualização de previsão de movimento.
Notificação via e-mail/SMS/push.
Consulta aos históricos da placa do carro.
(BackLog4)Relatório de movimentação no período.
(BackLog5)Relatório de usuários do sistema.
(BackLog6)Login de usuários.
Restauração de senha.


Projeto Futuro:

(BackLog1)Aviso de placas Roubadas, ou veículos com Documento atrasados.
(BackLog7)Relatório de veículos suspeitos.
(BackLog16)acesso á camera real-time.

## Mais Açoes

#  Para a empresa:
* Pode ter acesso a relatórios gerenciais como: 
* Quantidade de veículos em determinado tempo.
* Horário de maior e menor fluxo. 
* Tipos de clientes.
* Clientes que mais visitam.
* Etc

# Para o cliente da empresa:
* Terá o acesso a horários de menor fluxo, para que saiba o horário para sair de casa.
* Saberá a quantidade de veículos que possuem no local.
* Poderá saber quantas vezes esteve naquele local.
* Visualizará a placa de seu carro.
* Para que tenha acesso ao sistema deverá:
* Entrar no site ou App.( Pode ser por um QR code.)
* Fazer o cadastro rápido.( Caso já esteja cadastrado no sistema, é só colocar o CPF.)
      - CPF, nome, endereço...
      - Placa, cor, marca, modelo....
* Acessar o sistema.


## Instalação

Em uma pasta do seu computador, digitar no cmd =  git clone https://github.com/alisonsassi95/Projeto-3-Sistema-Gerenciamento

OBS: "Irá fazer dowload do projeto"

DENTRO DA PASTA "https://github.com/alisonsassi95/Projeto-3-Sistema-Gerenciamento" digitar = composer install

OBS: "Irá criar as pastas necessárias"

Se não tiver o banco de dados, Criar no mysql o banco "IDPLATE"

Abrir o arquivo .env.example e substituir as linhas : DB_DATABASE=SUA_BASE_DE_DADOS /// DB_USERNAME=SEU_NOME_DE_USUARIO /// DB_PASSWORD=SUA_SENHA

Rodar o comando = php -r "copy('.env.example', '.env');"

Rodar o comando = php artisan key:generate 

Rodar o comando = php artisan migrate --seed

Rodar o comando = php artisan serve

Para logar-se como ADMIN, acesse a url http://SEU_LOCAL_HOST/home

## Login e senha padrão: 
* login: admin 

* senha: admin



##----------------------------------Criar model com o migrate e controller-------------------------------

Rodar o comando = php artisan make:model -m -c "equipment"  // sempre no singular e em inglês pois no migrate vai estar no plural

php artisan make:controller NameController

php artisan make:model NameModel -m

php artisan make:migration create_nametable_table



## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
