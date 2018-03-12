<?php


class Client
{
    public $id ;
    public $sponserid ;
    public $casemanagerid ;
    public $activeclient ;
    public $i1 ;
    public $i2 ;
    public $i3 ;
    public $fname ;
    public $lname ;
    public $memberid ;
    public $referralid;
    public $streetaddress ;
    public $city ;
    public $st ;
    public $zip ;
    public $phone ;
    public $email ;
    public $documentsavename ;
    public $documentshowname ;
    public $n1 ;
    public $n2;
    public $username;
    public $userpassword ;
    public $n3 ;
    public $joindate ;
    public $packagemailedoutdate ;
    public $d1 ;
    public $linkid1;



    function __construct(
      $id  ,
      $sponserid  ,
      $casemanagerid  ,
      $activeclient ,
      $i1  ,
      $i2  ,
      $i3  ,
      $fname  ,
      $lname  ,
      $memberid ,


      $referralid ,
      $streetaddress  ,
      $city  ,
      $st  ,
      $zip  ,
      $phone  ,
      $email  ,
      $documentsavename  ,
      $documentshowname  ,
      $n1  ,
      $n2 ,
      $username ,
      $userpassword  ,
      $n3  ,
      $joindate  ,
      $packagemailedoutdate  ,
      $d1  ,
      $linkid1 

    )
    {
      $this->id=$id  ;
      $this->sponserid=$sponserid  ;
      $this->casemanagerid=$casemanagerid  ;
      $this->activeclient=$activeclient  ;
          $this->i1=$i1  ;
           $this->i2=$i2  ;
           $this->i3=$i3  ;
           $this->fname=$fname  ;
           $this->lname=$lname  ;
           $this->memberid=$memberid  ;

           $this->referralid=$referralid ;
           $this->streetaddress=$streetaddress  ;
           $this->city=$city  ;
           $this->st=$st  ;
           $this->zip=$zip  ;
           $this->phone=$phone  ;
           $this->email=$email  ;
           $this->documentsavename=$documentsavename  ;
           $this->documentshowname=$documentshowname  ;
           $this->n1=$n1  ;

           $this->n2=$n2 ;
           $this->username=$username ;
           $this->userpassword=$userpassword  ;
           $this->n3=$n3  ;
           $this->joindate=$joindate  ;
           $this->packagemailedoutdate=$packagemailedoutdate  ;
           $this->d1=$d1  ;
           $this->linkid1=$linkid1;
    }
}