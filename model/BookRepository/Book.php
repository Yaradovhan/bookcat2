<?php

class Book
{
    private $id;
    private $title;
    private $text;
    private $description;
    private $price;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setBook($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : '';
        $this->text = (isset($data['text'])) ? $data['text'] : '';
        $this->description = (isset($data['description'])) ? $data['description'] : '';
        $this->price = (isset($data['price'])) ? $data['price'] : '';
    }

    /**
     * @return array
     */
    public function getBook()
    {
        return ['id' => $this->id,
                'title' => $this->title,
                'text' => $this->text,
                'description' => $this->description,
                'price' => $this->price];
    }

}