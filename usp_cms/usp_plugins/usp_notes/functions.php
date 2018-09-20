<?php 

    // To add a column to an existing table the syntax would be:
    // mysql_query("ALTER TABLE birthdays ADD street CHAR(30)");
    
    // You can also specify where you want to add the field.
    // mysql_query("ALTER TABLE birthdays ADD street CHAR(30) AFTER birthday");
    /*
    mysql_query("ALTER TABLE birthdays
ADD street CHAR(30) AFTER birthday,
Add city CHAR(30) AFTER street,
ADD state CHAR(4) AFTER city,
ADD zipcode CHAR(20) AFTER state,
ADD phone CHAR(20) AFTER zipcode");
*/

/*
Column definitions can be modified using the ALTER method. The following code would change the existing birthday column from 7 to 15 characters.

    mysql_query("ALTER TABLE birthdays CHANGE birthday birthday VARCHAR(15)");
*/

/*
Columns can be removed from an existing table. The next example of code would remove the lastname column.
mysql_query("ALTER TABLE birthdays DROP lastname");
*/

    // TODO: чи видно змінні з одного плагіну в іншому?
    
    require_once 'plugin_database.php';

    $moneyCategory = array (
		0 => 'невідомо', 
		1 => 'їжа', 
		2 => 'одяг', 
		3 => 'речі', 
		4 => 'книги', 
		5 => 'транспорт', // бензин, запчастини, маршрутка
		6 => 'догляд', 
		7 => 'бізнес', // будь-які вкладення, навіть оплата хостингу і домену
		8 => 'рахунки', // оренда квартири, світло, газ, інтернет
		9 => 'відклав', // оренда квартири, світло, газ, інтернет
		50 => 'прибуток'
	);
    
    $monthNames = array (
		'01' => 'січ', 
		'02' => 'лют', 
		'03' => 'бер', 
		'04' => 'кві', 
		'05' => 'тра', 
		'06' => 'чер',
		'07' => 'лип', 
		'08' => 'сер', 
		'09' => 'вер', 
		'10' => 'жов', 
		'11' => 'лис', 
		'12' => 'гру'
	);
    
    
    
    // Якщо чітко вказано, що це запит до плагіну:
    if ($_POST['actionTo'] == 'plugin') {
        
        // якщо чітко вказано, що це запит до цього плагіну:
        if ($_POST['pluginFolder'] == basename(pathinfo(__FILE__)['dirname'])) {
            
            // тільки тоді виконую якусь дію:
            if (isset($_POST['action'])) {
                
                ##############################################
                
                // Дія:
                if ($_POST['action'] == 'addNote') {
                    
                    // update in db:
                    $array = array(
                    "INSERT INTO" => $quickNotestablesArray[0],
                        "COLUMNS" => array(
                            "text" => nl2br($_POST['text'])
                            )                            
                    );
                            
                    $db->insert($array); 
                    
                    $link = $pluginConfigUrl;
                    
                    header ("Location: $pluginConfigUrl");
                    exit();
                    
                } // <-- Дія
                
                // Дія:
                if ($_POST['action'] == 'moderate') {
                    
                    $array = array(
                        "UPDATE" => $quickNotestablesArray[0],
                        "SET" => array(
                            "moderation" => $_POST['moderation'],
                        ),
                        "WHERE" => array(
                            "ID" => $_POST['ID']
                        ),
                    );
                            
                    $db->update($array); 
                    
                    $link = $_POST['url'];
                    
                    header ("Location: $link");
                    exit();
                    
                } // <-- Дія                
 
                // Дія:
                if ($_POST['action'] == 'editNote') {
                    
                    $array = array(
                        "UPDATE" => $quickNotestablesArray[0],
                        "SET" => array(
                            "text" => nl2br($_POST['text']),
                        ),
                        "WHERE" => array(
                            "ID" => $_POST['ID']
                        ),
                    );
                            
                    $db->update($array); 
                    
                    $link = $_POST['url'];
                    
                    header ("Location: $link");
                    exit();
                    
                } // <-- Дія  
                
            } // <-- кінець виконання дій
        } // <-- кінець перевірки папки плагіну
    } // <-- кінець перевірки запиту до плагіну
     
   
     
    function getNotesCount($type) {
        
        global $db;
        global $quickNotestablesArray;

        if($type == 'onModeration') {
            $array = array(
                "SELECT" => "*",
                "FROM" => $quickNotestablesArray[0],
                "WHERE" => "moderation = 0",
                "ORDER" => "date",
                "SORT" => "DESC",
            );
            return count($db->select($array));
        } else if ($type == 'Approved') {
            $array = array(
                "SELECT" => "*",
                "FROM" => $quickNotestablesArray[0],
                "WHERE" => "moderation = 2",
                "ORDER" => "date",
                "SORT" => "DESC",
            );
            return count($db->select($array));
        } else if ($type == 'Deleted') {
            $array = array(
                "SELECT" => "*",
                "FROM" => $quickNotestablesArray[0],
                "WHERE" => "moderation = 1",
                "ORDER" => "date",
                "SORT" => "DESC",
            );
            return count($db->select($array));
            
        }
    }
    
    function getNotes($type) {
        
        global $db;
        global $quickNotestablesArray;
        
        if($type == 'onModeration') {
            
            $array = array(
                "SELECT" => "*",
                "FROM" => $quickNotestablesArray[0],
                "WHERE" => "moderation = 0",
                "ORDER" => "date",
                "SORT" => "DESC",
            );
            return $db->select($array);
            
        } else if ($type == 'Approved') {
            $array = array(
                "SELECT" => "*",
                "FROM" => $quickNotestablesArray[0],
                "WHERE" => "moderation = 2",
                "ORDER" => "date",
                "SORT" => "DESC",
            );
            return $db->select($array);
        } else if ($type == 'Deleted') {
             $array = array(
                "SELECT" => "*",
                "FROM" => $quickNotestablesArray[0],
                "WHERE" => "moderation = 1",
                "ORDER" => "date",
                "SORT" => "DESC",
            );
            return $db->select($array);
        }
    }    