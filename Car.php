<?php
class Car {
    private int $id;
    private string $brand;
    private string $modelType;
    private string $color;
    private int $engine;
    private string $wheelType;

    public function __construct(string $brand, string $modelType, string $color, int $engine, string $wheelType){
        $this->brand = $brand;
        $this->modelType = $modelType;
        $this->color = $color;
        $this->engine = $engine;
        $this->wheelType = $wheelType;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getEngine(): int{
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