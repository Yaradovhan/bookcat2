<?php

class Category
{
    private $id;
    private $title;

    /**
     * User constructor.
     */
    public function __construct()
    {

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
    public function getId()
    {
        return $this->id;
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
     * @param $data
     */
    public function setCategory($data)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->title = isset($data['title']) ? $data['title'] : null;

    }

    /**
     * @return array
     */
    public function getCategory()
    {
        return ['id' => $this->id, 'title' => $this->title];
    }
}