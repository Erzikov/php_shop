<?php 
namespace models; 

Class Cart
{
    public static function countItems()
    {
        if(isset($_SESSION['order'])) {
            $count = 0;
            foreach ($_SESSION['order'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function totalPrice($orderedProducts)
    {
        $totalPrice = 0;
        foreach ($orderedProducts as $product) {
            $productCount = $_SESSION['order'][$product['id']];  
            $totalPrice += $product['price']*$productCount;
        }
        return $totalPrice;
    }

    public static function addItem(int $id)
    {
        $order = isset($_SESSION['order']) ? $_SESSION['order'] : array(); 

        if(array_key_exists($id, $order)) {
            $order[$id]++;
        } else {
            $order[$id] = 1;
        }

        $_SESSION['order'] = $order;

        return self::countItems();
    }

    public static function deleteItem($id)
    {
        $order = isset($_SESSION['order']) ? $_SESSION['order'] : array();

        if(array_key_exists($id, $order)) {
            if($order[$id] > 1) {
                $order[$id]--;
            } elseif($order[$id] = 1) {
                unset($order[$id]);
            }
        }

        $_SESSION['order'] = $order;

        return true;
    }

    public static function isEmptyCart()
    {
        if (!isset($_SESSION['order']) || empty($_SESSION['order'])) {
            return true;
        } else {
            return false;
        }
    }
} 
