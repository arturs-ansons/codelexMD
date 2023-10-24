<?php declare(strict_types=1);

class Dog {
    private string $name;
    private $mother;
    private $father;

    public function __construct($name, $mother = null, $father = null) {
        $this->name = $name;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function setMother($mother) {
        $this->mother = $mother;
    }

    public function setFather($father) {
        $this->father = $father;
    }

    public function getMother() {
        return $this->mother;
    }

    public function getFather() {
        return $this->father;
    }

    public function getName() {
        return $this->name;
    }

    public function fathersName(): string
    {
        if ($this->father) {
            return $this->father->getName();
        } else {
            return "Unknown";
        }
    }
        public function hasSameMotherAs($otherDog): bool
        {
        if ($this->mother !== null && $otherDog->mother !== null) {
            return $this->mother->getName() === $otherDog->mother->getName();
        }
        return false;
    }
}

class DogTest {
    public static function main() {
        $max = new Dog("Max");
        $coco = new Dog("Coco");
        $rocky = new Dog("Rocky");
        $buster = new Dog("Buster");
        $lady = new Dog("Lady");
        $molly = new Dog("Molly");
        $sam = new Dog("Sam");
        $sparky = new Dog("Sparky");

        // Set mother and father for each dog
        $max->setMother($lady);
        $max->setFather($rocky);

        $coco->setMother($molly);
        $coco->setFather($buster);

        $rocky->setMother($molly);
        $rocky->setFather($sam);

        $buster->setMother($lady);
        $buster->setFather($sparky);


        echo "{$max->getName()} has {$max->getMother()->getName()} as mother, and {$max->getFather()->getName()} as father\n";
        echo "{$coco->getName()} has {$coco->getMother()->getName()} as mother, and {$coco->getFather()->getName()} as father\n";
        echo "{$rocky->getName()} has {$rocky->getMother()->getName()} as mother, and {$rocky->getFather()->getName()} as father\n";
        echo "{$buster->getName()} has {$buster->getMother()->getName()} as mother, and {$buster->getFather()->getName()} as father\n";


        echo "{$sparky->fathersName()}\n";

        if ($coco->hasSameMotherAs($rocky)) {
            echo "{$coco->getName()} has the same mother as {$rocky->getName()}\n";
        } else {
            echo "{$coco->getName()} does not have the same mother as {$rocky->getName()}\n";
        }
    }
}
DogTest::main();
