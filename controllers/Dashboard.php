<?php
  
  namespace Controllers;
  
  use View\View;
  use Models\User;
  use Models\Avatar;
  
  class Dashboard implements BaseController
  {
    public function index(): void
    {
      $model = new Avatar();
      $user = $_SESSION['user'];
      
      $avatar = $model->get($user['id'])[0];
      $user['avatar'] = $avatar;
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
  }