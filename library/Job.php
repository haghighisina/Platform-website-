<?php /* @noinspection ALL */
class Job{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Get all job
    public function getAllJobs(){
        $this->db->query("SELECT job.*, category.name AS cname 
                    FROM job
                    INNER JOIN category 
                    ON job.category_id = category.id 
                    ORDER BY post_date DESC ");

         $result = $this->db->resultQuery();
         return $result;
    }

    //Get all categories
    public function getCategory(){
        $this->db->query("SELECT * FROM category ");
        $result = $this->db->resultQuery();
        return $result;
    }

    //Get all Job By Category
    public function getCategoryById($category_id){
        $this->db->query("SELECT job.*, category.name AS cname 
                    FROM job
                    INNER JOIN category 
                    ON job.category_id = category.id 
                    WHERE job.category_id = :category
                    ORDER BY post_date DESC ");
        $this->db->bindTheParameters(":category", $category_id);
        $result = $this->db->resultQuery();
        return $result;
    }

    //Get category name by id from category table
    public function getCategoryNameBtId($category_id){
        $this->db->query("SELECT * FROM category WHERE id = :category_id ");
        $this->db->bindTheParameters(":category_id", $category_id);
        $result = $this->db->getSingleRowQuery();
        return $result;
    }

    //Get job data list from job table by id
    public function getJobDetailsById($job_id){
        $this->db->query("SELECT * FROM job WHERE id= :job_id ");
        $this->db->bindTheParameters(":job_id", $job_id);
        $result = $this->db->getSingleRowQuery();
        return $result;
    }

    public function checkemail($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

    //creating createJobLister
    public function createJobLister($company, $category_id, $job_title, $description, $location, $salary, $contact_user, $contact_email){
        $this->db->query("INSERT INTO job SET 
        location= :Location,
        contact_user= :ContactUser,
        contact_email= :ContactEmail,
        category_id= :CategoryId,
        company= :Company,
        job_title= :JobTiltle,
        description= :Description,
        salary= :Salary
        ");
        $this->db->bindTheParameters(":Company", $company,PDO::PARAM_STR);
        $this->db->bindTheParameters(":CategoryId", $category_id, PDO::PARAM_INT);
        $this->db->bindTheParameters(":JobTiltle", $job_title,PDO::PARAM_STR);
        $this->db->bindTheParameters(":Description", $description,PDO::PARAM_STR);
        $this->db->bindTheParameters(":Location", $location, PDO::PARAM_STR);
        $this->db->bindTheParameters(":Salary", $salary,PDO::PARAM_INT);
        $this->db->bindTheParameters(":ContactUser", $contact_user,PDO::PARAM_STR);
        $this->db->bindTheParameters(":ContactEmail", $contact_email,PDO::PARAM_STR);

        if ($this->db->executeTheQuery()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteById($jobId){
        $this->db->query("DELETE FROM job WHERE id= :ID ");
        $this->db->bindTheParameters(":ID", $jobId,PDO::PARAM_INT);

        if ($this->db->executeTheQuery()){
            return true;
        }else{
            return false;
        }
    }

    //UpdateJobLister
    public function UpdateJobLister($location,$contact_user, $contact_email, $category_id, $company, $job_title, $description, $salary, $job_id){
        $this->db->query("INSERT INTO job SET 
        location= :Location,
        contact_user= :ContactUser,
        contact_email= :ContactEmail,
        category_id= :CategoryId,
        company= :Company,
        job_title= :JobTiltle,
        description= :Description,
        salary= :Salary WHERE id= :JobID
        ");
        $this->db->bindTheParameters(":JobID", $job_id,PDO::PARAM_INT);
        $this->db->bindTheParameters(":Company", $company,PDO::PARAM_STR);
        $this->db->bindTheParameters(":CategoryId", $category_id, PDO::PARAM_INT);
        $this->db->bindTheParameters(":JobTiltle", $job_title,PDO::PARAM_STR);
        $this->db->bindTheParameters(":Description", $description,PDO::PARAM_STR);
        $this->db->bindTheParameters(":Location", $location, PDO::PARAM_STR);
        $this->db->bindTheParameters(":Salary", $salary,PDO::PARAM_INT);
        $this->db->bindTheParameters(":ContactUser", $contact_user,PDO::PARAM_STR);
        $this->db->bindTheParameters(":ContactEmail", $contact_email,PDO::PARAM_STR);

        if ($this->db->executeTheQuery()){
            return true;
        }else{
            return false;
        }
    }
}