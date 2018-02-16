<?php 
namespace controllers;

use components\Pagination;
use components\AdminBaseController;
use models\{Product, Category};

Class AdminProductsController extends AdminBaseController
{
    public function actionIndex($page = 1)
    { 
      $content = $this->getProductIndexPartial($page);
      $this->view->renderPartial('admin/main', array('content' => $content));

      return true;
    }

    public function actionCreate()
    {
      $newProduct = array();

      $newProduct['name'] = '';
      $newProduct['category_id'] = '';
      $newProduct['price'] = '';
      $newProduct['brand'] = '';
      $newProduct['description'] = '';
      $newProduct['avability'] = false;
      $newProduct['is_new'] = false;
      $newProduct['is_recommended'] = false;

      $title = 'Добавить продукт';
      $errors = array();
      $result = false;

      if (isset($_POST['submit'])) {        
          $newProduct['name'] = trim($_POST['name']);
          $newProduct['category_id'] = $_POST['category'];
          $newProduct['price'] = $_POST['price'];
          $newProduct['brand'] = $_POST['brand'];
          $newProduct['description'] = $_POST['description'];
          $newProduct['avability'] = isset($_POST['avability']);
          $newProduct['isNew'] = isset($_POST['isNew']);
          $newProduct['isRecommended'] = isset($_POST['isRecommended']);

          if (empty($newProduct['name'])) {
              $errors[] = "Заполните поле 'Название'!";
          }

          if (empty($newProduct['price'])) {
              $errors[] = "Заполните поле 'Цена'!";
          }

          if (empty($newProduct['brand'])) {
              $errors[] = "Заполните поле 'Брэнд'!";
          }

          if (empty($newProduct['description'])) {
              $errors[] = "Заполните поле 'Описание товара'!";
          }

          if (empty($errors)) {
            $id = Product::createProduct($newProduct);  
            $result = $id;

            Product::setImg($id);
          }
        }

        $this->renderProductFormPartial($newProduct, $errors, $result, $title);

        return true;
    }

    public function actionEdit($id)
    { 
      $product = Product::getProductById($id);
      $errors = array();
      $title = 'Редактировать продукт';
      $result = false;

      if (isset($_POST['submit'])) {        
          $product['name'] = trim($_POST['name']);
          $product['category_id'] = $_POST['category'];
          $product['price'] = $_POST['price'];
          $product['brand'] = $_POST['brand'];
          $product['description'] = $_POST['description'];
          $product['avability'] = isset($_POST['avability']);
          $product['is_new'] = isset($_POST['isNew']);
          $product['is_recommended'] = isset($_POST['isRecommended']);

          if (empty($product['name'])) {
              $errors[] = "Заполните поле 'Название'!";
          }

          if (empty($product['price'])) {
              $errors[] = "Заполните поле 'Цена'!";
          }

          if (empty($product['brand'])) {
              $errors[] = "Заполните поле 'Брэнд'!";
          }

          if (empty($product['description'])) {
              $errors[] = "Заполните поле 'Описание товара'!";
          }

          if (empty($errors)) {
            $result = Product::updateProduct($product);

            Product::setImg($id);
          }
        }


      $this->renderProductFormPartial($product, $errors, $result, $title);
      return true;
    }

    public function actionDelete($id)
    {

      Product::deleteProduct($id);

      $url = $_SERVER['HTTP_REFERER'];
      $segments = explode('/', $url);
      $page = end($segments);

      if (preg_match('~page-[0-9]+~', $page)) {
        $page = preg_replace('~page-([0-9]+)~', "$1", $page);
      } else {
        $page = 1;
      }

      $_SERVER['REQUEST_URI'] = $_SERVER['HTTP_REFERER'];
      echo $this->getProductIndexPartial((int)$page);

      return true;
    }


    private function getProductIndexPartial($page)
    {
        $limit = 5;
        $total = Product::getTotalAllProducts();

        $products = Product::getAllProducts($page, $limit);
        $pagination = new Pagination($total, $page, $limit, 'page-');
        
        return $this->view->fetchPartial('admin/products/index', array('products' => $products, 'pagination' => $pagination));
    }

    private function renderProductFormPartial($product, $errors, $result, $title)
    {
      $categoryList = Category::getAllCategory();
      $errorsView = $this->view->fetchPartial('layouts/errors', array('errors'=>$errors));

      $this->view->render('admin/products/form', array('name' => $product['name'],
                                                       'productCategory' => $product['category_id'],
                                                       'price' => $product['price'],
                                                       'avability' => $product['avability'],
                                                       'brand' => $product['brand'],
                                                       'description' => $product['description'],
                                                       'isNew' => $product['is_new'],
                                                       'isRecommended' => $product['is_recommended'],
                                                       'errors' => $errorsView,
                                                       'result' => $result,
                                                       'title' => $title,
                                                       'categoryList' => $categoryList));
    }
}