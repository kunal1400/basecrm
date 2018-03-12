<?php


class obj
{
    public $id ;

    public $p1 ;
    public $p2 ;
    public $p3 ;
    public $p4 ;
    public $p5 ;
    public $p6 ;
    public $i1 ;
    public $i2 ;
    public $i3 ;
    public $count;

    public $p;
    public $i;
  /*  function __construct(
        $id  ,
        $p1  ,
        $p2  ,
        $p3 ,
        $p4  ,
        $p5  ,
        $p6 ,
        $i1  ,
        $i2  ,
        $i3
    )
    {
        $this->id=$id  ;
        $this->p1=$p1  ;
        $this->p2=$p2  ;
        $this->p3=$p3  ;
        $this->i1=$i1  ;
        $this->i2=$i2  ;
        $this->i3=$i3  ;
        $this->p4=$p4  ;
        $this->p5=$p5  ;
        $this->p6=$p6  ;

    }
*/
    function __construct(
        $id  ,
        $p  ,
        $i

    )
    {
        $this->id=$id  ;
        $this->p=$p ;
        $this->i=$i ;


    }

}