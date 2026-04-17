<?php
require_once "IEngine.php";
class Engine implements IEngine
{
    private bool $status = false;
    private ?float $hubraum;

    private string $type;

    public function __construct($type)
    {
      $this->hubraum = $type == "diesel" ? 2.0 :
          ($type == "benzin" ? 3.0 : NULL);
      $this->type = $type;
    }
    public function getStatus(): bool
    {
        return $this->status;
    }
    public function startEngine()
    {
        $this->status = true;
    }
    public function stopEngine()
    {
        $this->status = false;
    }

    public function getHubraum() : float|null
    {
        return $this?->hubraum;
    }
}