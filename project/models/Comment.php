<?php
	namespace Project\Models;
	use \Core\Model;

class Comment extends Model
{

    //Создаются все методы для работы с таблицей

    //получение 1  по ID
		public function PgetById($id)
		{
			return $this->findOne("SELECT * FROM comments_posts WHERE id=$id");
		}
    public function FgetById($id)
    {
        return $this->findOne("SELECT * FROM comments_forum WHERE id=$id");
    }
            
		
    //получение всех записей
		public function PgetAll($post)
		{
			return $this->findMany("SELECT comments_posts.author, comments_posts.text, comments_posts.data, comments_posts.likes, avatar FROM comments_posts, users, posts WHERE comments_posts.id_post = ".$post." AND users.name = comments_posts.Author GROUP BY author");
		}
		public function FgetAll()
		{
			return $this->findMany("SELECT * FROM comments_forum, users, forum_posts WHERE forum_posts.id = comments_forum.id_post");
		}
    //создание нового 
    function create($id_post, $author, $text, $data)
    {
      return $this->Update("INSERT INTO comments_posts (id_post, author, text, data, likes) VALUES('$id_post', '$author','$text','$data', 1)")  ;
    }

    // // удаление записи
    // function delete($id)
    // {
    //     $this->id = $id;
    //     $query = "DELETE FROM " . $this->tablname . " WHERE id = ?";
    //     $this->conn->query($query, [ $this->id]);
    //         return true;
    // }

    // //Редактирование записи
    // function Edit($id)
    // {
    //     $this->id = $id;
    //     $query = "UPDATE " . $this->tablname .
    //         " SET name = ?, passsword = ?, foto = ?  WHERE id = ?";

    //     $this->conn->query($query, [$this->name, $this->$id, $this->avatar, $this->id]);
    //         return true;
    // }
}
