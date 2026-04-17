<?php
class UserService
{
    public function getUserById($id)
    {
        if ($id == null) {
            throw new Exception("ID darf nicht leer sein");
        }

        $users = [
                1 => "Max",
                2 => "Anna"
        ];

        return $users[$id];
    }
}





class UserService
{
    public function getUserById($id)
    {
        if ($id == null) {
            throw new Exception("ID darf nicht leer sein");
        }

        $users = [
                1 => "Max",
                2 => "Anna"
        ];

        return $users[$id];
    }
}

function divide($a, $b)
{
    // ❌ Division durch 0 möglich
    return $a / $b;
}

// ❌ kein try-catch
$userService = new UserService();

echo "User: " . $userService->getUserById($_GET['id']);
echo "<br>";

$result = divide(10, $_GET['divider']);
echo "Result: " . $result;