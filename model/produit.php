<?php
class UserModel
{
    private $db;

    public function __construct($host, $username, $password, $database)
    {
        $this->db =  mysqli_connect($host, $username, $password, $database);
    }




    public function allProduit()
    {
        // $hashedPassword = 'password_hash'($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("select *from produit");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
        
    }
    public function createProduit($name, $prix, $quantity)
    {
        // $hashedPassword = 'password_hash'($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO produit  VALUES (null,?, ?, ?)");
        $stmt->bind_param('sii', $name, $prix, $quantity);
        if ($stmt->execute()) {
            echo  "true";
        } else {
            echo  "false";
        }
    }
}


// $user = new UserModel('localhost','root','','oop');

// echo '<pre>';
// print_r($user->allProduit());
// echo '</pre>';


//     public function createUser($nom, $email, $password) {
//         $hashedPassword = 'password_hash'($password, PASSWORD_DEFAULT);

//         $stmt = $this->db->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
//         $stmt->bind_param('sss', $nom, $email, $hashedPassword);

//         if ($stmt->execute()) {
//             return true;
//         } else {
//             return false;
//         }
//     }

//     public function getUsers() {
//         $result = $this->db->query("SELECT * FROM users");
//         $users = [];

//         while ($row = $result->fetch_assoc()) {
//             $users[] = $row;
//         }

//         return $users;
//     }

//     public function updateUser($id, $nom, $email, $password) {
//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//         $stmt = $this->db->prepare("UPDATE users SET nom = ?, email = ?, password = ? WHERE id = ?");
//         $stmt->bind_param('sssi', $nom, $email, $hashedPassword, $id);

//         if ($stmt->execute()) {
//             return true;
//         } else {
//             return false;
//         }
//     }

//     public function deleteUser($id) {
//         $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
//         $stmt->bind_param('i', $id);

//         if ($stmt->execute()) {
//             return true;
//         } else {
//             return false;
//         }
//     }

//     public function __destruct() {
//         $this->db->close();
//     }
// }

// Usage example:
// $host = 'your_database_host';
// $username = 'your_database_username';
// $password = 'your_database_password';
// $database = 'your_database_name';

// $user = new User($host, $username, $password, $database);

// // Create a user
// $user->createUser('John Doe', 'john@example.com', 'password123');

// // Get all users
// $users = $user->getUsers();
// print_r($users);

// // Update a user
// $user->updateUser(1, 'Updated User', 'updated@example.com', 'newpassword');

// // Delete a user
// $user->deleteUser(1);