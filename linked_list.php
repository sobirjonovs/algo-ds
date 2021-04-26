<?php

/**
 * Class Node
 */
class Node
{
    /**
     * @var
     */
    public $data;
    /**
     * @var null
     */
    public $next;

    /**
     * Node constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

/**
 * Class LinkedList
 */
class LinkedList
{
    /**
     * @var null
     */
    private $head;

    /**
     * LinkedList constructor.
     */
    public function __construct()
    {
        $this->head = null;
    }

    public function loop()
    {
        $head = $this->head;
        while ($head !== null) {
            echo $head->data . PHP_EOL;
            $head = $head->next;
        }
    }

    /**
     * @param $data
     */
    public function insert($data)
    {
        $node = new Node($data);
        $node->next = $this->head;
        $this->head = $node;
    }

    /**
     * @param $key
     */
    public function delete($key)
    {
        /** @var LinkedList|Node $head */
        $head = $this->head;

        if ($head !== null && $head->data === $key) {
            $this->head = $head->next;
            $head = null;
        }

        while ($head !== null) {
            if ($head->data === $key) break;
            $prev = $head;
            $head = $head->next;
        }

        if ($head === null) return;

        /** @var Node $prev */
        $prev->next = $head->next;
        /** @var LinkedList $head */
        $head = null;
    }
}

/**
 * Example of use
 */

// Create LinkedList
$linkedList = new LinkedList();
// Add data into list
$linkedList->insert("Data 1");
$linkedList->insert("Data 2");
// Remove a data in the list
$linkedList->delete("Data 1");
// Read the data in the list
$linkedList->loop();


