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

// 動作クラス(DI対応)
class MovementsDI
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

// 動作クラス(DI未対応)
class MovementsNotDI
{
  private $creatures;

  public function __construct()
  {
    $this->dog = new Dog();
    $this->cat = new Cat();
  }

  public function cry()
  {
    echo "Cries of dogs: " . $this->dog->cry() . "\n";
    echo "Cries of cats: " . $this->cat->cry() . "\n";
  }
}

// 実行部分
$dog = new Dog();
$cat = new Cat();

// DI対応
$dogMovements = new MovementsDI($dog);
$catMovements = new MovementsDI($cat);

echo "exec DI Pattern\n";
echo "Cries of dogs: " . $dog->cry() . "\n";
echo "Cries of Cats: " . $cat->cry() . "\n";

echo "\n";

// DI未対応
$movements = new MovementsNotDI();
echo "exec Not DI Pattern\n";
$movements->cry();
