<?php
	namespace Project\Models;
	use \Core\Model;

class Post extends Model
{
    //получение 1  по ID
		public function getById($id)
		{
			return $this->findOne("SELECT * FROM posts, categories WHERE posts.id=$id AND posts.id_category = categories.id_category");
		}
		
    //получение всех записей
		public function getAll($category)
		{
			return $this->findMany("SELECT * FROM posts, Categories WHERE posts.id_category = Categories.id_category AND  name_category = '$category' ORDER BY posts.data DESC");
		}
		public function getAllPosts()
		{
			return $this->findMany("SELECT * FROM posts, Categories WHERE posts.id_category = Categories.id_category");
		}
		public function getAllCategories()
		{
			return $this->findMany("SELECT * FROM Categories ");
		}
		public function countAll()
		{
			return $this->findMany("SELECT Count(id) as count FROM posts, Categories WHERE posts.id_category = Categories.id_category ");
		}

    //получение по имени
        public function getByName($name)
        {
            return $this->findMany("SELECT * FROM posts WHERE name LIKE %$name%");
        }
    



    //создание нового 
    function Create($header, $author, $data,  $text, $image, $id_category)
    {
      return $this->Update("INSERT INTO `posts` (`id`, `header`, `author`, `data`, `text`, `image`, `id_category`) VALUES (NULL, '$header', '$author', '$data', '$text', '$image', '$id_category')");
    }

    // удаление записи
    function delete($id)
    {
      return $this->Update("DELETE FROM posts WHERE posts.id=$id");
      
    }

    //Редактирование записи
    function Edit($id, $header, $data, $text, $image, $id_category)
    {
      return $this->Update("UPDATE posts SET header = '$header', data = '$data', text = '$text', image = '$image', id_category = '$id_category'  WHERE posts.id=$id");
    }
}
