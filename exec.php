<?php
// 生物Interface
interface CreaturesInterface
{
  public function cry();
}

// Dogクラス
class Dog implements CreaturesInterface
{
  public function __construct()
  {
  }

  public function cry()
  {
  return "Bow!";
  }
}

// Catクラス
class Cat implements CreaturesInterface
{
  public function __construct()
  {
  }

  public function cry()
  {
    return "Meow";
  }
}

// 動作クラス
class Movements
{
  private $creatures;

  public function __construct(CreaturesInterface $creatures)
  {
    $this->creatures = $creatures;
  }

  public function cry()
  {
    $this->creatures->cry();
  }
}


// 実行部分
$dog = new Dog();
$cat = new Cat();

$dogMovements = new Movements($dog);
$catMovements = new Movements($cat);

echo "Cries of dogs: " . $dog->cry() . "\n";
echo "Cries of Cats: " . $cat->cry() . "\n";
