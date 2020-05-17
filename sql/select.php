<?php
  class Select
  {
    public $select;
    public $name_table;
    public $wher;

    function __construct($select, $name, $wher)
    {
      $this->select = $select;
      $this->name_table = $name;
      $this->wher = $wher;
    }

    function SELECT_db()
    {
      $sql = "SELECT $this->select FROM `$this->name_table` WHERE $this->wher";
      return $sql;
    }

    function SELECT_JOIN($table2)
    {
      $sql = "SELECT $this->select FROM `$this->name_table` JOIN `$table2` ON `$this->name_table`.`id` = `$table2`.`id` WHERE $this->wher";
      return $sql;
    }
  }
?>