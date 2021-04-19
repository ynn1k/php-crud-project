<?php


namespace app\models;


use app\Databse;

class Product
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?float $price = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->description = $data['description'] ?? '';
        $this->price = $data['price'];
        $this->imageFile = $data['imageFile'];
        $this->imagePath = $data['image'] ?? null;
    }

    public function save()
    {
        $error = false;
        if(!$this->title || !$this->price) {$error = true;}

        if (!$error) {
            if ($this->imagePath) {
                unlink('../public/' . $this->imagePath);
            }

            if ($this->imageFile && $this->imageFile['tmp_name']) {
                $this->imagePath = 'images/'.uniqid('', true).'/'.$this->imageFile['name'];
                mkdir(dirname('../public/' . $this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], '../public/' . $this->imagePath);
            }

            $db = Databse::$db;
            if ($this->id) {
                $db->updateProduct($this);
            } else {
                $db->createProduct($this);
            }
        }

        return $error;
    }
}