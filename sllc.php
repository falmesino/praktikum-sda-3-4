<?php

  /**
   * SDA Praktikum 3-4 - Kelompok 1
   * Implementasi SLLC untuk Manajemen Barang
   * 1. 231232001 Chaerul Figri 
   * 2. 231232020 Fadhillah Muhammad Wahyudi 
   * 3. 231232028 Falmesino Abdul Hamid
   * 4. ⁠231232021 M Rivaldi Fahru 
   * 5. 231232027 Tegar FB
   * 6. 23123 Farhan
   */

  class ItemNode {
    public $itemName;
    public $quantity;
    public $next;

    public function __construct($itemName, $quantity) {
      $this->itemName = $itemName;
      $this->quantity = $quantity;
      $this->next = null;
    }
  }

  class CircularItemList {
    private $head = null;
    private $tail = null;

    // Menambahkan barang baru
    public function addItem($itemName, $quantity = 0) {

      $newItem = new ItemNode($itemName, $quantity);

      if ($this->head === null) {
        $this->head = $newItem;
        $this->tail = $newItem;
        $this->tail->next = $this->head; // Membuat circular
      } else {
        $this->tail->next = $newItem;
        $this->tail = $newItem;
        $this->tail->next = $this->head; // Tetap circular
      }

    }

    // Menampilkan semua barang
    public function displayItems() {
      if ($this->head === null) {
        return "No items available.";
      }

      $current = $this->head;
      $itemsOutput = "";

      do {
        $itemsOutput .= "Item: " . $current->itemName . ", Quantity: " . $current->quantity . "\n";
        $current = $current->next;
      } while ($current !== $this->head);

      return $itemsOutput;
    }
  }

  // Contoh penggunaan CircularItemList
  $itemList = new CircularItemList();
  $itemList->addItem("Laptop", 2);
  $itemList->addItem("Printer", 3);
  $itemList->addItem("Scanner", 4);

  // Menampilkan semua barang
  echo nl2br("Available Items in Warehouse:\n");
  echo nl2br($itemList->displayItems());
?>