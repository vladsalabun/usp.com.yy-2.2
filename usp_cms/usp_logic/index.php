<?php
    
    /*
        TODO: тут головний контроллер 
        
        Треба вивчити шаблони проектування!
        
        Сюда треба одразу вшити йожика, щоб виключати віддалено.
        Інформування про відвідуваність мені на пошту.
        Віддалене відключення сайту.
        
        Ліцензування. Якщо хтось встановив мою цмс ще десь, то я хочу про це дізнатись 
    
    */
    
    # Підключаю логіку роботи з базою даних:
    require_once 'database/connection_to_database.php';
    
    # Підключаю логіку роботи з базою даних:
    require_once 'prepared_queries.php';   
       
    # Підключаю корисні функції, які використовуються багато разів у різних місцях:
    require_once 'usefull.php';   
    
    # Підключаю логіку роутера:
    require_once 'router_controller.php';