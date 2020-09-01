<?php 
require("base.php");

class Posts extends Base{

   

    public function getList(){
        

            $query =  $this->db->prepare("
                SELECT post_id, title
                FROM posts
                WHERE parent_id = 0
                ORDER BY post_id DESC
            ");

            $query->execute();

            return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function getThread($post_id){
        $query = $this->db->prepare("
            SELECT p.post_id, p.title, p.message, p.post_date, u.username
            from posts p
            INNER JOIN users u USING(user_id)
            where p.post_id = ? OR p.parent_id = ?

            
        ");

        $query->execute([
            $post_id, $post_id
        ]);

        $posts = $query->fetchAll( PDO::FETCH_ASSOC  );
        
        if(empty($posts)){
            header("http/1.1 404 Not Found");
            die("404 Not Found"); 
        }    

        return $posts;
    }

    public function create($data){
        $query = $this->db->prepare("
        INSERT INTO posts
        (title, message, username, parent_id)
        values(?, ?, ?, 0)
        ");

        $query->execute([
            $data["title"],
            $data["message"],
            $data["username"]
        ]); 

            
        

        return $this->db->lastInsertId();
    }
    public function reply($data){
        $query = $this->db->prepare("
        INSERT INTO posts
        (title, message, username, parent_id)
        values('', ?, ?, ?)
        ");

        $query->execute([
            $data["message"],
            $data["username"],
            $data["parent_id"]
        ]); 

            
        return $data["parent_id"];
        

    }
}