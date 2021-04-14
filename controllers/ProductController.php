<?php


namespace app\controllers;


use app\models\Product;
use app\Router;

class ProductController
{
    public function index(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $products = $router->db->getProducts($search);
        $router->renderView('partials/list',[
            'products' => $products,
            'search' => $search
        ]);
    }

    public function create(Router $router)
    {
        $productData = [
            'title' => '',
            'image' => '',
            'description' => '',
            'price' => ''
        ];
        $error = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData['title'] =         $_POST['title'];
            $productData['description'] =   $_POST['description'];
            $productData['price'] =         (float)$_POST['price'];
            $productData['imageFile'] =     $_POST['image'] ?? null;

            $product = new Product();
            $product->load($productData);
            $error = $product->save();

            if(!$error) {
                header('Location: /');
                exit;
            }
        }

        $router->renderView('partials/form',[
            'product' => $productData,
            'error' => $error
        ]);
    }

    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /');
            exit;
        }

        $productData = $router->db->getProductById($id);
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData['title'] =         $_POST['title'];
            $productData['description'] =   $_POST['description'];
            $productData['price'] =         (float)$_POST['price'];
            $productData['imageFile'] =     $_POST['image'] ?? null;

            $product = new Product();
            $product->load($productData);
            $error = $product->save();

            if(!$error) {
                header('Location: /');
                exit;
            }
        }

        $router->renderVIew('partials/form', [
            'product' => $productData,
            'error' => $error
        ]);
    }

    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            $router->db->deleteProduct($id);
        }

        header('Location: /');
        exit;
    }
}
