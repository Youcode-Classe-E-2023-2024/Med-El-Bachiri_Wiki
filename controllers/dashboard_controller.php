// handle ajax requests here
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // filter request with checking the 'type'

    if (isset($data['type']) && !empty($data['type']) && $data['type'] === 'addCat' && isset($data['name'])) {
        $result = Category::add($data['name']);
        if ($result) {
            exit(true);
        }
    }
}