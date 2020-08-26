<?php
    require ('connect.php');

    var_dump($_POST['title']); 
    var_dump($_POST['start_date']) ;
    var_dump($_POST['end_date']) ;
    var_dump($_POST['description']) ;
    var_dump($_POST['city']) ;
    var_dump($_POST['address_article']) ;
    var_dump($_POST['category']);
    var_dump($_POST['price']);

    if(!empty($_POST['title']) 
        && !empty($_POST['start_date']) 
        && !empty($_POST['end_date']) 
        && !empty($_POST['description']) 
        && !empty($_POST['city']) 
        && !empty($_POST['address_article']) 
        && !empty($_POST['category'])
        && !empty($_POST['price']))
      {
        echo 'not empty ok';
        $title = htmlspecialchars($_POST['title']);
        $start_date = htmlspecialchars($_POST['start_date']);
        $end_date = htmlspecialchars($_POST['end_date']);
        $description = htmlspecialchars($_POST['description']);
        $city = htmlspecialchars($_POST['city']);
        $address_article = htmlspecialchars($_POST['address_article']);
        $category = htmlspecialchars($_POST['category']);
        $price = htmlspecialchars($_POST['price']);
        $image_url = htmlspecialchars($_POST['image_url']);

        $sth = $db->prepare("INSERT INTO REGISTRY annonces (title, start_date, end_date,description, address_article, city, category,price, image_url) VALUES (:title, :start_date, :end_date,:description, :address_article, :city, :category,:price, :image_url)");

        var_dump($sth);

        $sth->bindValue(':title',$title);
        $sth->bindValue(':start_date',$start_date);
        $sth->bindValue(':end_date',$end_date);
        $sth->bindValue(':description',$description);
        $sth->bindValue(':city',$city);
        $sth->bindValue(':address_article',$address_article);
        $sth->bindValue(':category',$category);
        $sth->bindValue(':price',$price);
        $sth->bindValue(':image_url',$image_url);

        $sth->execute();


    }else{
        echo 'empty';
        // header("Location:signin.php?action=e");
    }


?>