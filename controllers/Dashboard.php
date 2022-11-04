<?php
  
  namespace Controllers;
  
  use View\View;
  use Models\User;
  use Models\Avatar;
  use Models\Article;
  use Core\SessionManager;
  
  class Dashboard implements BaseController
  {
    public function index(): void
    {
      $model = new User();
      $user = $model->getOne(SessionManager::read('userId'));
      $data['user'] = $user;
      
      View::generate('dashboard', $data);
    }
    
    public function updateAvatar(): void
    {
      $model = new Avatar();
      $file_name = $_FILES['avatar']['name'];
      $file_tmp = $_FILES['avatar']['tmp_name'];
      $ext = pathinfo($file_name)['extension'];
      $fileName = 'avatar_' . $_SESSION['user']['id'];
      
      move_uploaded_file($file_tmp, __DIR__ . '/../avatars/' . $fileName . '.' . $ext);
      $model->update($_SESSION['user']['id'], $fileName . '.' . $ext);
    }
    
    public function updateInfo(array $data): void
    {
      
      $model = new User();
      $model->updateFields($data);
      
      foreach ($data as $key => $value) {
        $_SESSION['user'][$key] = $value;
      }
      
    }
    
    public function myArticles(): void
    {
      $model = new Article;
      $articles = $model->getMyArticles(SessionManager::read('userId'));
      $data['articles'] = $articles;
      
      View::generate('dashboard/articles', $data);
    }
  }