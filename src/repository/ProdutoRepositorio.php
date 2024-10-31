<?php
class ProdutoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = :tipo ORDER BY preco";
        $statement = $this->pdo->prepare($sql1); 
        $statement->execute([':tipo' => 'Café']);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return new Produto(
                $cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['imagem'],
                $cafe['preco']
            );
        }, $produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = :tipo ORDER BY preco";
        $statement = $this->pdo->prepare($sql2);
        $statement->execute([':tipo' => 'Almoço']);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco) {
            return new Produto(
                $almoco['id'],
                $almoco['tipo'],
                $almoco['nome'],
                $almoco['descricao'],
                $almoco['imagem'],
                $almoco['preco']
            );
        }, $produtosAlmoco);

        return $dadosAlmoco;
    }

    public function buscarTodos(): array 
    {
        $sql = "SELECT * FROM produtos";
        $statement = $this->pdo->query($sql); 
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosDados = array_map(function ($produto) {
            return $this->formarObjeto($produto);
        }, $dados);

        return $todosDados;
    }

    private function formarObjeto(array $produto): Produto 
    {
        return new Produto(
            $produto['id'],
            $produto['tipo'],
            $produto['nome'],
            $produto['descricao'],
            $produto['imagem'],
            $produto['preco']
        );
    }
}
