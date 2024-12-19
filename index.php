<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP test</title>
    </head>
    <body>
        <h1>File index.php</h1>
        <?php
        echo "hello world";
        echo "<br>";
        print("hello");
        echo "<br>";
        print_r("hello");
        echo "<br>";
        print("hello");
        echo "<br>";
        var_dump("hello");
        echo "<br>";
        $myvar = "hello world";
        ?>
        <h1><?php echo $myvar; ?></h1>
        <?php
        echo "<h1>" .$myvar."</h1>";
        ?>
        <?php 
        $x = 1;
        function myfunction($myparam) {
            global $x;
            $x = "Hello";
            return $myparam;
        }
        echo "<p>" .MYFUNCTION("hello world!"). "</p>";
        ?>
        <h1> <?php echo $x; ?> </h1>
        <?php echo 1 + 1; ?>
        <?php echo "1" + '1'; ?>
        <?php 
        $mychar = "a";
        ?>
        <h1> <?php echo ++$mychar; ?> </h1>
        <?php
        
        
    </body>
</html>