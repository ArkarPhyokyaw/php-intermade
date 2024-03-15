<?php
class category extends controller
{
    private $catModel;

    public function __construct()
    {
        $this->catModel = $this->model("CategoryModel");
    }

    public function created($data = [])
    {
        $data = [
            "name" => "",
            "name_err" => "",
            "cats" => $this->catModel->getAllCategory()
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['name'] = $_POST['name'];
            if (empty($data['name'])) {
                $data['name_err'] = "Category must be supplied";
                $this->view('admin/category/home', $data);
            } else {
                if ($this->catModel->getCategoryByName($data['name'])) {
                    $data['name_err'] = "Category name is already in use";
                    $this->view('admin/category/home', $data);
                } else {
                    if ($this->catModel->insertNewCategory($data['name'])) {
                        flash("cat_created_success", "Category created successfully");
                        $data['cats'] = $this->catModel->getAllCategory();
                        $this->view('admin/category/home', $data);
                    } else {
                        flash("cat_created_fail", "Category creation failed");
                        $this->view('admin/category/home', $data);
                    }
                }
            }
        } else {
            $this->view("admin/category/home", $data);
        }
    }

    public function edit($data = [])
    {
        $editdata = [
            'name' => '',
            'name_err' => '',
            'cats' => '',
            'currentCat' => ''
        ];
        $editdata['cats'] = $this->catModel->getAllCategory();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $editdata['name'] = $_POST['name']; // Update 'name' key with the form input value
            if (!empty($editdata['name'])) {
                if ($this->catModel->updateCategory(getCurId(), $editdata['name'])) {
                    deletedCurId();
                    redirected(URLROOT . 'category/created');
                } else {
                    $catid = getCurId();
                    deletedCurId();
                    flash("cats_edit_error", "Category Update fail");
                    redirected(URLROOT . 'admin/category/edit', $catid);
                }
            } else {
                $editdata['name_err'] = "Category must be supplied";
                $editdata['currentCat'] = $this->catModel->getCategoryById(getCurId());
                deletedCurId();
                $this->view("admin/category/edit", $editdata);
            }
        } else {
            if (!empty($data[0])) {
                setCurId($data[0]);
                $editdata['currentCat'] = $crrentCat = $this->catModel->getCategoryById($data[0]);
                $this->view("admin/category/edit", $editdata);
            }
        }
    }

    public function deleted($data = [])
    {
        if ($this->catModel->deletedCategory($data[0])) {
            redirected(URLROOT . "category/created");
        } else {
            redirected(URLROOT . "category/created");
        }
    }
}
?>
