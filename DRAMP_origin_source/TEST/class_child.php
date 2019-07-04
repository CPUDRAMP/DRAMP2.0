<?php
class A
{
    var $foo;

    function A()
    {
        $this->foo = "asdf";
    }
   
    function bar()
    {
        echo $this->foo." : Running in A";
    }
}

class B extends A
{
    function bar()
    {
        echo $this->foo." : Running in B";
    }
}

$myClass = new B;
$myClass->bar();
?>