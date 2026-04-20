# Exemplo em PHP de um Worker Monitor que lê solicitações de um arquivo e executa tarefas em paralelo usando `proc_open`.

O código do `worker-monitor.php` é responsável por monitorar um arquivo chamado "solicitacoes" em busca de novas solicitações. Quando uma nova solicitação é encontrada, o monitor a processa executando um script separado (`worker-tarefa.php`) para cada solicitação, permitindo que as tarefas sejam executadas em paralelo.

O `worker-tarefa.php` é um script simples que simula a execução de uma tarefa, imprimindo a solicitação recebida e dormindo por 10 segundos antes de finalizar.

Para usar este exemplo, basta criar um arquivo chamado "solicitacoes" e adicionar algumas linhas de texto representando as solicitações. Em seguida, execute o `worker-monitor.php` para começar a processar as solicitações. Cada solicitação será processada em paralelo, e o monitor continuará verificando o arquivo para novas solicitações.