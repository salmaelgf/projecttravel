<?php

class Hotel
{
    private $name;
    private $location;
    private $description;

    // Constructor to initialize the object with data
    public function __construct($name, $location, $description)
    {
        $this->name = $name;
        $this->location = $location;
        $this->description = $description;
    }

    // Getter methods to retrieve information
    public function getName()
    {
        return $this->name;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getDescription()
    {
        return $this->description;
    }
}

?>
