<?php

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addPrimaryCategory($data)
    {
        $this->db->query("INSERT INTO categorys (name,parents) VALUES(:name,:parents)");
        // Bind values
        $this->db->bind(':name', $data['categoryPName']);
        $this->db->bind(':parents', 1);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPrimaryCategory()
    {
        $this->db->query("SELECT * FROM categorys WHERE parents=1");
        $results = $this->db->resultSet();
        return $results;
    }

    public function editPrimaryCategory($data)
    {
        $this->db->query("UPDATE categorys SET name = :name where id = :id");
        $this->db->bind(':name', $data['editPrimaryCatName']);
        $this->db->bind(':id', $data['editPrimaryCatId']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePrimaryCategory($data)
    {
        $this->db->query("DELETE FROM categorys where id = :id");
        $this->db->bind(':id', $data['editPrimaryCatId']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //child
    public function addChildCategory($data)
    {
        $this->db->query("INSERT INTO categorys (name,parents,parentsof) VALUES(:name,:parents,:parentsof)");
        // Bind values
        $this->db->bind(':name', $data['categoryCName']);
        $this->db->bind(':parents', 0);
        $this->db->bind(':parentsof', $data['childOf']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getChildCategory()
    {
        $this->db->query("SELECT c.id, c.name, c.parents, c.parentsof,o.name as parents_name FROM categorys AS c JOIN categorys AS o ON c.parentsof = o.id");
        $results = $this->db->resultSet();
        return $results;
    }

    public function editChildCategory($data)
    {
        $this->db->query("UPDATE categorys SET name = :name,parentsof=:parentsof,parents=0 where id = :id");
        $this->db->bind(':name', $data['editChildCat']);
        $this->db->bind(':id', $data['editChildCatId']);
        $this->db->bind(':parentsof', $data['childOf']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteChildCategory($data)
    {
        $this->db->query("DELETE FROM categorys where id = :id");
        $this->db->bind(':id', $data['editChildCatId']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




}
