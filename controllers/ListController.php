<?php
  
  namespace Controllers;
  
  interface ListController
  {
    public function index(int $page, $search): void;
    
    public function one($id): void;
  }