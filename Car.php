<?php
class Car {
    private string $brand;
    private string $modelType;
    private string $color;
    private Engine $engine;
    private string $wheelType;

    private Window $window;

    public function __construct(string $brand, string $modelType, string $color, Engine $engine, string $wheelType){
        $this->brand = $brand;
        $this->modelType = $modelType;
        $this->color = $color;
        $this->engine = $engine;
        $this->wheelType = $wheelType;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getModel(): string{
        return $this->modelType;
    }
    public function getColor(): string{
        return $this->color;
    }
    public function getEngine(): Engine{
        return $this->engine;
    }
    public function getWheelType(): string{
        return $this->wheelType;
    }
    public function setColor(string $color)
    {
        $this->color = $color;
    }
}