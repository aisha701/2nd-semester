<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Oriented Progamming</title>
    <style>
    .main_heading{
        color:teal;
        text-transform:uppercase;
    }
    .b-details span{
        color:black;
        font-family:georgia;
        text-transform:uppercase;

    }
    .b-details {
        color:darkgreen;
        font-family:cursive;
    }
</style>
</head>

<body>
    <?php
    
    class Books{
        public $name,$publishDate,$author,$chapters,$pages;
        public function __construct($name="not specified",$publishDate="not specified",$author="not specified",$chapters="not specified",$pages="not specified"){
          $this->name=$name;
          $this->publishDate=$publishDate;
          $this->author=$author;
          $this->chapters=$chapters;
          $this->pages=$pages;
        }
        public function ShowBooksDetails(){
            echo"<h1 class='main_heading'>House details</h1>";
            echo "<h3 class='b-details'><span>Book name : </span>".$this->name."</h3>";
            echo "<h3 class='b-details'><span>Publish date : </span>".$this->publishDate."</h3>";
            echo "<h3 class='b-details'><span>Author : </span>".$this->author."</h3>";
            echo "<h3 class='b-details'><span>Chapters : </span>".$this->chapters."</h3>";
            echo "<h3 class='b-details'><span>Pages : </span>".$this->pages."</h3>";
        }
    }
    $book1 = new Books("Verity","20-05-2020","Collen Hoover",45,"700");
    $book1->ShowBooksDetails();
    
    ?>
</body>
</html>
