<?php 

$arq_solicitacoes = "solicitacoes";

while(true)
{
    // verifica solicitacoes
    if(file_exists($arq_solicitacoes))
    {
        $linhas = file($arq_solicitacoes, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if(count($linhas) > 0)
        {
            // pega a primeira linha e remove do arquivo
            $linha = $linhas[0];
            array_shift($linhas);
            file_put_contents($arq_solicitacoes, implode(PHP_EOL, $linhas));
            // processa a linha
            if($linha !== false && trim($linha) !== "")
            {
                echo "Processando solicitação: " . trim($linha) . "\n";
                $descricao_do_proesso = [STDIN, STDOUT, STDERR]; # Define a origem de input e output como padrao
                $processo = proc_open("php worker-tarefa.php " . trim($linha), $descricao_do_proesso, $pipes);
                if (is_resource($processo))
                {
                    do
                    {
                        sleep(1);
                        $status = proc_get_status($processo);
                        echo ".";
                    } while ($status['running']);
                    proc_close($processo);
                }
                else 
                {
                    echo "Falha ao iniciar o processo para: " . trim($linha) . "\n";
                }
                if($status['exitcode'] === 0)
                {
                    echo "Processo concluído com sucesso: " . trim($linha) . "\n";
                }
                else
                {
                    echo "Processo falhou: " . trim($linha) . "\n";
                }
            }
        }
    }
    sleep(1); // Espera 1 segundo antes de verificar novamente
}

