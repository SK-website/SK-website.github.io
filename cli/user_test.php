<?php

//Всего в классе есть 3 области видимости которые задаются модификатором доступа к объекту:
// public, - доступно
// protected, - видно у наследников (можно обратиться - читать и писать)
// private - доступно только методам класса изнутри

class User 
{
    //Properties
    public $username = "Cat";
    public $first_name;
    public $last_name;

}
//Cоздаем экземпляр класса. Он является объектом класса
//В скобках указываем параметры, если они есть и нужны, а если нет, то нет
$user = new User();
//var_dump($user);
//var_dump(User);//Подчеркиевает ошибку, так как обращаться напрямую к классу нельзя, только к экземпляру класса

//С помощью ф-ции get_class можно узнать какому классу принадлежит объект
//echo get_class($user);

class UserPrivate 
{
    //Properties
    public $username = "Test";
    private $first_name = "Tom";
    private $last_name = "Cat";
    protected $age = 24; //  у любого наследника (не экземпляра(!)) класса есть воз-ть обращаться  к протектед свойствам 
    public const TABLE = 'users';

    public function name(){
        return $this->first_name.' '.$this->last_name;
    }
    public function getAge(){
        return $this->age;
    }

    public function setAge($number){
        $this->age = $number;
    }

    //МАГИЧЕСКИЕ МЕТОДЫ (ИХ МНОГО). Рассмотри 2 - конструктор и деструктор. Обязательно д.б. публичными
    // public function __construct()
    // {
    //     echo "Instance of ".__CLASS__;
    // }
    // public function __destruct()
    // {
    //     echo "Remove item ".__CLASS__;
    // }
    
   
}

$user2 = new UserPrivate();
//var_dump($user2);

//////////////////////
// Объектный оператор (->)для обращения к свойствам объекта  с модификатором доступа Public
//получить значение свойства username
//echo $user->username; 
//echo $user2->username;

//как присвоить новое значение свойству объекта
$user->username = "First User";
//echo $user->username;

//
//echo $user2->name();
//echo $user2->setAge(25); //mutator
//var_dump($user2);
//echo $user2->getAge(); //acsessor


//обратиться к константе можно непосредственно от имени класса 
//echo UserPrivate::TABLE;
// и от имени объекта
//echo $user2::TABLE;

class UserNew 
{
    //Properties
    public $username;
    private $first_name;
    private $last_name;
    protected $age; //  у любого наследника (не экземпляра(!)) класса есть воз-ть обращаться  к протектед свойствам 
   
    public function name(){
        return $this->first_name.' '.$this->last_name;
    }
    public function getAge(){
        return $this->age;
    }

    public function setAge($number){
        $this->age = $number;
    }

    //МАГИЧЕСКИЕ МЕТОДЫ -конструктор
        
    public function __construct($username, $first_name, $last_name, $age)
    {
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }

}
$user3 = new UserNew('User3', 'Mary', 'Ann', 17);
echo $user3->name();
echo $user3->getAge(); 

$user4 = new UserNew('User4', 'Pall', 'Harrison', 28);
echo $user4->name();
echo $user4->getAge();