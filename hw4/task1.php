<?php

class BinaryNode //класс узла
{
    public $value;
    public $left = null;
    public $right = null;

    public function __construct($value)
    {
        $this->value = $value;
    }
}


class BinaryTree //класс дерева
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    function insert(int $int)
    {
        $node = new BinaryNode($int); //создаём новый узел

        if ($this->root === null) { //если корень равен null, то принятое занчение и будет корнем
            $this->root = $node;
        } else { // а если корень не равен null, то вызываем метод insertNode() для вставки нового узла(значения)
            $this->insertNode($node, $this->root);
        }
    }

    private function insertNode(BinaryNode $node, &$subtree)
    {
        if ($subtree === null) {
            $subtree = $node;
        } elseif ($subtree->value < $node->value) {
            $this->insertNode($node, $subtree->right);
        } elseif ($subtree->value > $node->value) {
            $this->insertNode($node, $subtree->left);
        }
    }

    public function delete($value)
    {
        if ($this->root === null) {
            throw new Exception("Дерево пустое");
        }

        $node = &$this->findNode($value, $this->root);

        if ($node) {
            $this->deleteNode($node);
        } else {
            throw new Exception("Такого элемента нет");
        }
    }

    private function &findNode($value, BinaryNode &$subtree)
    {
        if (is_null($subtree)) {
            return false;
        }

        if ($subtree->value > $value) {
            return $this->findNode($value, $subtree->left);
        } elseif ($subtree->value < $value) {
            return $this->findNode($value, $subtree->right);
        } else {
            return $subtree;
        }
    }

    private function &findParentNode($node, &$subtree)
    {
        if (is_null($subtree)) {
            return false;
        }

        if ($subtree->left === $node or $subtree->right === $node) {
            return $subtree;
        } elseif ($subtree->value > $node->value) {
            return $this->findParentNode($node, $subtree->left);
        } else {
            return $this->findParentNode($node, $subtree->right);
        }
    }

    private function &findMin($subtree)
    {
        if ($subtree->left === null) {
            return $subtree;
        } else {
            return $this->findMin($subtree->left);
        }
    }

    private function deleteNode(BinaryNode $node)
    {
        if ($node->left === null && $node->right === null) {
            $node = null;
        } else if (is_null($node->left)) {
            $node = $node->right;
        } else if (is_null($node->right)) {
            $node = $node->left;
        } else {
            $nodeMin = $this->findMin($node->right);
            $parentNodeMin = $this->findParentNode($nodeMin, $node->right);
            $node->value = $nodeMin->value;
            if ($nodeMin->right !== null) {
                $nodeMin = $nodeMin->right;
            } else {
                $nodeMin = null;
            }
            $parentNodeMin->left = $nodeMin;
        }
    }
}

$tree = new BinaryTree();

$tree->insert(5);
$tree->insert(3);
$tree->insert(4);
$tree->insert(2);
$tree->insert(1);
$tree->insert(0);
$tree->insert(9);
$tree->insert(7);
$tree->insert(6);
$tree->insert(8);
$tree->insert(10);

$tree->delete(5);

print_r($tree);
