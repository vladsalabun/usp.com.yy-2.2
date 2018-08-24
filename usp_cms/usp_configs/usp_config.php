<?php

    # CMS version:
    $version = '1.0';
    
    # CMS prefix:
    $usp = 'usp';                                               // <- Треба редагувати при встановленні

    # CMS статус:
    $debug = 1;
    $showErrors = 0;

    # Посилання:
    $webSiteUrl = 'http://usp.com.yy/';                         // <- Треба редагувати при встановленні
    $loginPage = $webSiteUrl.'gateway/';
    
    # Модулі:
    $cmsStylesArray = array(
        // TODO: підключай автоматично з папки:
        // TODO: для CMS одні стилі, а для теми - інші:
        $webSiteUrl.'usp_cms/usp_css/basic4.css',
        $webSiteUrl.'usp_cms/usp_css/usefull.css',
        $webSiteUrl.'usp_cms/usp_css/navbar_style.css',
        $webSiteUrl.'usp_cms/usp_css/modal_style.css',
        $webSiteUrl.'usp_cms/usp_css/cms_style.css',
        $webSiteUrl.'usp_cms/usp_css/links_style.css',
    );
    $cmsImg = $webSiteUrl.'usp_cms/usp_img/';
    $cmsJsArray = array(
        // TODO: підключай автоматично з папки:
        // TODO: для CMS одні js скрипти, а для теми - інші:
        $webSiteUrl.'usp_cms/usp_js/jQuery_v1.12.4.js',
        $webSiteUrl.'usp_cms/usp_js/fade.js',
        $webSiteUrl.'usp_cms/usp_js/bootstrap.js'
    );
    
    
    $cmsFonts = $webSiteUrl.'usp_cms/usp_fonts/';
    
    
    # Логін та пароль адміна, які встановлюються по замовчуванню:
    $defaultAdmin = 'usp';
    $defaultPassword = 'marketing';