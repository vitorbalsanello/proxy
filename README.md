# Design Pattern - Proxy
O código desse repositório mostra o aplicação do Design Pattern "Proxy" através de um exemplo na linguagem PHP no contexto de conexão a um banco de dados.

## Interface BancoDeDados:
Define uma interface que descreve os métodos que o banco de dados deve implementar, no exemplo 'conectar' e 'consultar'.

## Classe ConexaoReal:
Implementação da conexão verdadeira no banco de dados, que implementa a interface "BancoDeDados" fornecendo implementações reais para os métodos 'conectar' e 'consultar'. Nesse exemplo eles apenas exibem mensagens para simular a execução. Os contrutores apenas recebem informações como host, usúario, senha e nome do banco de dados. 

## Classe ProxyBancoDeDados:
Essa classe funciona como proxy para a conexão real com o banco de dados, implementando a interface "BancoDeDados" e garantindo que tenha os mesmos métodos que a conexão real. Além disso essa classe armazena um instancia de 'ConexaoReal' como um propriedade privada. A partir disso quando um cliente chama o método conectar ou consultar, o proxy verifica se a conexão real já foi criada. Se não, ele cria uma instância de 'ConexaoReal'. O proxy exibe mensagens para indicar que está usando o proxy e, em seguida, encaminha a chamada do método para a instância de conexão real.

## Uso do Proxy
No final do código, um objeto ProxyBancoDeDados é criado com informações de host, usuário, senha e nome do banco de dados. Em seguida, são chamados os métodos 'conectar' e 'consultar' no proxy.
Por fim o proxy garante que a conexão real seja criada apenas quando necessário e atua como intermediário entre o cliente e a conexão real.



