<?php
include_once "../vendor/autoload.php";
//class test
//{
//
//    private $name;
//    private $email;
//    private $password;
//
//    public function addItem($key, $value)
//    {
//        echo "key : " . $key . PHP_EOL;
//        echo "val : " . $value . PHP_EOL;
//        $this->{$key} = $value;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getName()
//    {
//        return $this->name;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getEmail()
//    {
//        return $this->email;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPassword()
//    {
//        return $this->password;
//    }
//
//    /**
//     * @param mixed $email
//     */
//
//}
//
//$obj = new test();
//$obj->addItem('role',"Amir@email");

//function rules()
//{
//    return [
//        'username' => [self::Required_Rule],
//        'password' => [self::Required_Rule,[self::Min_Rule,'min' => 5]]
//    ];
//}

//$array = [1,2,3,4,5];
//
//$array[] = 50;
//
//echo "<pre>";
//print_r($array);
//echo "<pre>";
//$data = [
//    'username' => 'Amir',
//    'password' => "123sadfasd",
//];
//
//$loginModel = new \models\Login();
//$loginModel->loadData($data);
//
//echo "<pre>";
//var_dump($loginModel->validate());
//echo "<pre>";

\models\database\SqlConfig::getConfig();