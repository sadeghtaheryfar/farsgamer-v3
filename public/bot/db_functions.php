<?php



function db_connect_fg()
{
    try {
        $dns = "mysql:host=localhost;port=3306;dbname=fortnit2_farsgamer;charset=utf8";
        $options = [
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        return new PDO($dns, 'fortnit2_farsgameruser', '8uAMki5kEs1D75Qy', $options);
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
        exit();
    }

    return false;
}

function db_connect_bot()
{
    try {
        $dns = "mysql:host=localhost;port=3306;dbname=fortnit2_bot;charset=utf8";
        $options = [
            PDO::ATTR_EMULATE_PREPARES => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        return new PDO($dns, 'fortnit2_bot', 'MnMl6yS6M', $options);
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
        exit();
    }

    return false;
}

function get_categories($parent = null)
{
	try {
		if ($parent != null) {
			$sql = "SELECT id,title FROM `categories` WHERE `parent_id`= {$parent} AND `telegram_bot` = 1 AND `deleted_at` IS NULL ORDER BY `telegram_bot_view` ";
		} else {
			$sql = "SELECT id,title FROM `categories` WHERE `parent_id` IS NULL AND `telegram_bot` = 1 AND `deleted_at` IS NULL ORDER BY `telegram_bot_view` ";
		}
	   	$stmt = db_connect_fg()->query($sql);
	   	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() >= 1) {
			return $stmt->fetchAll();
		}
	   
	   return null;
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
        exit();
    }
}

function get_products($category , $start = 0)
{
	$products_per_page = PRODUCTS_PER_PAGE;
	try {
		$sql = "
		SELECT 
			id,title,amount,discount_type,discount_amount,form,currency_id,discount_starts_at,discount_expires_at,const_price
			FROM `products` 
			WHERE  products.category_id = $category AND products.telegram_bot = 1 AND products.status != 'unavailable'
			ORDER BY `telegram_bot_view` LIMIT $products_per_page OFFSET $start 
		";
	   	$stmt = db_connect_fg()->query($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() >= 1) {
			return $stmt->fetchAll();
		}
	   
	   return null;
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
        exit();
    }
}

function get_product($id)
{
	try {
		$sql = "
		SELECT 
			id,title,amount,discount_type,discount_amount,type,quantity,form,currency_id,discount_starts_at,discount_expires_at,const_price
			FROM `products` 
			WHERE `id` = $id
		";
	   	$stmt = db_connect_fg()->query($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();
		}
	   
	   return null;
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,"get_product: ".$e->getMessage());
        exit();
    }
}

function get_product_by_slug($slug)
{
	try {
		$sql = "SELECT * FROM `products` WHERE `slug` = ? ";
	   	$stmt = db_connect_fg()->prepare($sql);
		$stmt->execute([$slug]);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();
		}
	   
	   return null;
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,"get_product_by_slug: ".$e->getMessage());
        exit();
    }
}

function get_currency($id)
{
	try {
		$sql = "SELECT amount FROM `currencies` WHERE `id` = ?";
	   	$stmt = db_connect_fg()->prepare($sql);
	   	$stmt->execute([$id]);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();
		}
	   
	   return null;
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,"get_currency: ".$e->getMessage());
        exit();
    }
}

function get_products_count($category)
{
	$col = 'COUNT(id)';
	try {
		$sql = "
		SELECT $col
			FROM `products` 
			WHERE  products.category_id = $category AND products.telegram_bot = 1
		";
	   	$stmt = db_connect_fg()->query($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt->fetch()[$col];
	   
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
        exit();
    }
}

function get_category($id)
{
	try {
		$sql = "SELECT * FROM `categories` WHERE `id` = ? AND `telegram_bot` = ?";
	   	$stmt = db_connect_fg()->prepare($sql);
	   	$stmt->execute([$id,1]);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();
		}
	   
	   return null;
    } catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
        exit();
    }
}


function get_user_request($chat_id)
{
	try {
		$sql = " SELECT * FROM `requests` WHERE `chat_id` = ? ";
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute([$chat_id]);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();
		}

	   return false;
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
 		exit();
	}
}

function new_user_request($chat_id,$model,$model_id)
{
	try {
		$sql = "INSERT INTO `requests` (`chat_id`,`model`,`model_id`) VALUES (?,?,?)";
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute([$chat_id,$model,$model_id]);
	   	$stmt->close();
	   return false;
	} catch (PDOException $e) {
 		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function update_user_request($chat_id,$model,$model_id,$session = null, $session_data = null , $quantity = null ,  $session_data_key = null)
{
	try {
		$sql = "
			UPDATE `requests` SET 
			`model` = ? , `model_id` = ? , `session` = ? , `session_data` = ? , `quantity` = ? , `session_data_key` = ? 
			WHERE `chat_id` = ? 
		";
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute([$model,$model_id,$session,$session_data,$quantity,$session_data_key,$chat_id]);
		return get_user_request($chat_id);
	} catch (PDOException $e) {
 		file_put_contents(ERROR_FILE,'AA: '.$e->getMessage());
		exit();
	}
}

function add_to_cart(array $data)
{
	try {
		$sql = "INSERT INTO `cart` (`chat_id`,`product_id`,`product_title`,`price`,`total_price`,`quantity`,`forms`,`reduction_amount`,`status`) VALUES (?,?,?,?,?,?,?,?,?) ";
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute([
			$data['chat_id'],$data['product_id'],$data['product_title'],$data['price'],$data['total_price'],$data['quantity'],$data['forms'],$data['reduction_amount'],$data['status']
		]);
		$stmt = db_connect_bot()->query("SELECT id FROM `cart` ORDER BY `id` DESC ");
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt->fetch();

	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function get_user_cart_count($chat_id)
{
	try {
		$sql = "SELECT COUNT(*) AS count FROM `cart` WHERE `chat_id` = ?";
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute([$chat_id]);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		return $stmt->fetch();
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function get_user_cart_items($chat_id)
{
	try {
		$sql = "SELECT * FROM `cart` WHERE `chat_id` = ?";
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute([$chat_id]);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() >= 1) {
			return $stmt->fetchAll();
		}

	   return false;
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function get_cart_item($chatId , $item_id)
{
	try {
		$sql = "SELECT id FROM `cart` WHERE `chat_id` = ? AND `id` = ?";
		$exe = [$chatId,$item_id];
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute($exe);
		if ($stmt->rowCount() == 1) {
			return true;
		}

	   return false;
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function get_order($chatId)
{
	try {
		$sql = "SELECT * FROM `orders` WHERE `chat_id` = ?";
		$exe = [$chatId];
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute($exe);
		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();
		}

	   return false;
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function update_orders(array $data , $where)
{
	$table = 'orders';
	$condition = $where['where'];
    try {
        $set = '';
        $execute = [];
        foreach ($data as $key => $value) {
            $set .= ",`$key` = ?";
            $execute[] = $value;
        }
        $set = trim($set,',');
		
        $query = "UPDATE `{$table}` SET {$set} {$condition} ";
        $stmt =  db_connect_bot()->prepare($query);
        $stmt->execute(array_merge($execute,$where['execute']));
        $stmt = null;
        return true;
    } catch (PDOException $e) {
        file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
    }
}

function where(...$conditions)
{
    $execute = [];
    $where = '';
    if (sizeof($conditions) > 0){
        $where = "WHERE (";
        $single = false;
        foreach ($conditions as $key => $value) {
            if (gettype($value) == 'array')
            {
                $value['AndOr'] = emptyToNUll($value['AndOr'] ?? '');
                $value[3] = emptyToNUll($value[3] ?? '');

                $last_element = $key == count($conditions) - 1;

                if ((isset($value[4]) && $value[4]) || (isset($value['priority'])) && $value['priority'])
                    $where .= "`".($value['column'] ?? $value[0])."` ".($value['operator'] ?? $value[1] )." ? ) ".
                        ($last_element ? '' : ($value['AndOr'] ?? $value[3] ?? 'AND'))." ( ";
                    else $where .= "`".($value['column'] ?? $value[0])."` ".($value['operator'] ?? $value[1] )."  ?  ".
                        ($last_element ? '' : ($value['AndOr'] ?? $value[3] ?? 'AND'))." ";
                    $execute[] = $value['value'] ?? $value[2];
            } else {
                $single = true;
                break;
            }
        }
        if ($single) {
            $where .= "`{$conditions[0]}` {$conditions[1]} ? ";
            $execute[] = $conditions[2];
        }
        $where .= ")";
    }
    return [
        'where' => $where,
        'execute' => $execute
    ];
}

function set_order($data)
{
	try {
		$sql = "INSERT INTO `orders` (`chat_id`,`price`,`reduction_value`,`total_price`) VALUES (?,?,?,?) ";
		$exe = [$data['chat_id'],$data['price'],$data['reduction_value'],$data['total_price']];
		$stmt = db_connect_bot()->prepare($sql);
		$stmt->execute($exe);
		$stmt = null;
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function delete_order($where)
{
	$condition = $where['where'];
	try {
		$sql = "DELETE FROM `orders` $condition";
		$stmt = db_connect_bot()->prepare($sql);
		return $stmt->execute($where['execute']);
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function empty_cart($chatId , $item_id = null)
{
	try {
		if (!is_null($item_id)) {
			$sql = "DELETE FROM `cart` WHERE `chat_id` = ? AND `id` = ?";
			$exe = [$chatId,$item_id];
		} else {
			$sql = "DELETE FROM `cart` WHERE `chat_id` = ?";
			$exe = [$chatId];
		}
		
		$stmt = db_connect_bot()->prepare($sql);
		return $stmt->execute($exe);
	} catch (PDOException $e) {
		file_put_contents(ERROR_FILE,$e->getMessage());
		exit();
	}
}

function emptyToNUll($value)
{
    if (empty(trim($value)))
        return null;

    return $value;
}