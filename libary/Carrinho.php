<?php 
class Carrinho {
    public function adicionarcarrinho(Produto $produto){
        if(isset($_SESSION['carrinho'][$produto->getId()])){
            
            $_SESSION['carrinho'][$produto->getId()]['Quantidade'] += 1;
        } else {
            
            $quantidade = 1;
            $_SESSION['carrinho'][$produto->getId()] = [
                'Nome' => $produto->getNome(), 
                'Quantidade' => $quantidade, 
                'Preço' => $produto->getPreco(),
                'Id' => $produto->getId()
            ];
        }

        //var_dump($_SESSION['carrinho']);
    }

    public function diminuir(Produto $produto){
        $_SESSION['carrinho'][$produto->getId()]['Quantidade'] -= 1;
        if($_SESSION['carrinho'][$produto->getId()]['Quantidade'] == 0){
            unset($_SESSION['carrinho'][$produto->getId()]);
        }
           
        
        //var_dump($_SESSION['carrinho']);
    }

    
}
