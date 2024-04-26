<?php
	namespace Project\Models;
	use \Core\Model;

class User extends Model
{
    //получение 1  по ID
		public function getById($id)
		{
			return $this->findOne("SELECT * FROM users WHERE id=$id");
		}
		
    //получение всех записей
		public function getAll()
		{
			return $this->findMany("SELECT * FROM users");
		}
    //получение по имени
        public function getByName($name)
        {
            return $this->findOne("SELECT * FROM users WHERE name = '$name'");
        }
    

      public function countAll()
      {
        return $this->findMany("SELECT Count(id) as count FROM users ");
      }

    //создание нового 
    function create($name, $password)
    {
      return $this->findOne("INSERT INTO users (name, password, id_role) VALUES('$name', '$password', 1)")  ;
        
    }

    //редактирование
    function Edit($id, $name, $avatar)
    {
      return $this->Update("UPDATE users SET name = '$name', avatar = '$avatar' WHERE id = $id ")  ;
        
    }
    // удаление записи
    function delete($id)
    {
      return $this->Update("DELETE FROM users WHERE users.id=$id");
      
    }

}
