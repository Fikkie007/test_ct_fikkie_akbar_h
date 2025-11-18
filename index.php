<?php

class Main
{
    private int $num;
    private array $nama = [];
    private array $place = [];
    private array $fruit = [];

    public function __construct(int $num = 0, array $nama = [], array $place = [], array $fruit = [])
    {
        $this->num  = $num;
        $this->nama = $nama;
        $this->place = $place;
        $this->fruit = $fruit;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;
        return $this;
    }

    public function addNama(string $nama): self
    {
        if (str_contains($nama, 'o')) {
            $nama = str_replace('o', 'A', $nama);
        }

        $this->nama[] = $nama;
        return $this;
    }

    public function setPlace(array $place): self
    {
        $this->place = $place;
        return $this;
    }

    public function addPlace(array $place): self
    {
        $place = array_map(function ($p) {
            return $p === 'Semarang' ? 'Samarinda' : $p;
        }, $place);

        $this->place = array_merge($this->place, $place);
        return $this;
    }

    public function setFruit(array $fruit): self
    {
        $this->fruit = $fruit;
        return $this;
    }

    public function addFruit(array $fruit): self
    {
        $this->fruit = array_merge($this->fruit, $fruit);
        if (isset($this->fruit['animal'])) {
            $this->fruit['animal'] = 'Cat';
        }

        return $this;
    }


    public function getFormattedNum(): string
    {
        return number_format($this->num, 0, "", ",");
    }

    public function getNama(): array
    {
        return $this->nama;
    }

    public function print(): void
    {
        echo $this->getFormattedNum() . "<br>";
        echo implode(", ", $this->nama) . "<br>";
        echo implode(", ", $this->place) . "<br>";
        echo implode(", ", $this->fruit) . "<br>";
        echo implode(", ", array_merge($this->place, $this->fruit)) . "<br>";
    }
}

class Pattern
{
    public function gambarPattern(int $cols, int $rows): void
    {
        $patterns = [
            'abcxyz',
            'xyzdef'
        ];

        for ($i = 0; $i < $rows; $i++) {
            $pattern = $patterns[$i % count($patterns)];
            for ($j = 0; $j < $cols; $j++) {
                echo $pattern[$j % strlen($pattern)];
            }

            echo "<br>";
        }
    }
}

$main = new Main();
$main->setNum(77777)
    ->addNama('fiki')
    ->addNama('CrossTechno Developer')
    ->addPlace(['Surabaya', 'Jakarta', 'Semarang', 'Makassar'])
    ->addPlace(['Aceh'])
    ->addFruit([
        'fruit' => 'Orange',
        'animal' => 'Dog',
        'bird' => 'Eagle',
        'food' => 'Rice',
    ])
    ->print();

$pattern = new Pattern();
$pattern->gambarPattern(12, 6);
