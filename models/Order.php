<?php
namespace models;

use components\Database;
    
Class Order 
{

    public const STATUSES = ['Заказ принят', 'Ожидает отправки', 'Отправлен', "Заказ выполнен"];

    public static function createOrder($name, $number, $comment, $order, $user_id)
    {
        $db = Database::getConnection();
        $jsonOrder = json_encode($order);

        $query = $db->prepare('INSERT INTO order_products (user_id, user_name, user_number, comment, products)
                               VALUES (:id, :name, :number, :comment, :order)');
        $result = $query->execute(array('id' => $user_id,
                                        'name' => $name,
                                        'number' => $number,
                                        'comment' => $comment,
                                        'order' => $jsonOrder));

        return $result;
    }

    public static function getAllOrders()
    {
    	$db = Database::getConnection();
    	$query = $db->query("SELECT * FROM order_products ORDER BY date ASC");
    	$result = $query->fetchAll();

    	return $result;
    }

    public static function getUsersOrders($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare("SELECT * FROM order_products WHERE user_id = :id");
        $query->execute(array('id' => $id));
        $result = $query->fetchAll();

        return $result;
    }

    public static function getOrderById($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare("SELECT * FROM order_products WHERE id = :id");
        $query->execute(array('id' => $id));
        $result = $query->fetch();

        return $result;
    }

    public static function getStatus($status)
    {
        return self::STATUSES[$status];
    }

    public static function updateOrderStatus($id, $status)
    {
        $db = Database::getConnection();
        $query = $db->prepare("UPDATE order_products SET status = :status WHERE id = :id");
        $result = $query->execute(array('status' => $status, 'id' => $id));
        
        return $result;
    }   
}