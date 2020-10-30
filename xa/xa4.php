<?PHP

require "db.php";

//$dbtest1 = new mysqli("127.0.0.1","root","123456","laravel_blog")or die("dbtest1 连接失败");
//$dbtest2     = new mysqli("127.0.0.1","root","123456","laravel_blog_2")or die("dbtest2 连接失败");


$dbtest1 = new db("192.168.1.89","root","root123","test1");
$dbtest2 = new db("192.168.1.89","root","root123","test2");
//$dbtest2 = new db("39.99.165.81","root","123456","test");

//为XA事务指定一个id，xid 必须是一个唯一值。
$xid = uniqid("");

//两个库指定同一个事务id，表明这两个库的操作处于同一事务中
$dbtest1->exec("XA START '$xid'");//准备事务1
$dbtest2->exec("XA START '$xid'");//准备事务2


try {

    //$dbtest1

    $return = $dbtest1->exec("UPDATE atest SET id=2 WHERE id=1") ;
    echo "xa1:"; print_r($return);


    if(!in_array($return,['0','1'])) {

        throw new Exception("库1执行sql操作失败!!!!!！");

    }
    if(!$return){
        throw new Exception("库1执行sql操作失败！");
    }



    //$dbtest2

    $return = $dbtest2->exec("UPDATE atest_2 SET id2=2 WHERE id2=1") ;
    echo "xa2:"; print_r($return);

    if(!in_array($return,['0','1'])) {

        throw new Exception("库2执行sql操作失败！");

    }



    //阶段1：$dbtest1提交准备就绪

    $dbtest1->exec("XA END '$xid'");

    $dbtest1->exec("XA PREPARE '$xid'");

    //阶段1：$dbtest2提交准备就绪

    $dbtest2->exec("XA END '$xid'");

    $dbtest2->exec("XA PREPARE '$xid'");




    //阶段2：提交两个库

    $dbtest1->exec("XA COMMIT '$xid'");

    $dbtest2->exec("XA COMMIT '$xid'");

}

catch (Exception $e) {

    //阶段2：回滚

    $dbtest1->exec("XA ROLLBACK '$xid'");

    $dbtest2->exec("XA ROLLBACK '$xid'");

    die("Exception:".$e->getMessage());

}

echo "执行完毕";exit;
/*
$dbtest1->close();
$dbtest2->close();*/

?>
