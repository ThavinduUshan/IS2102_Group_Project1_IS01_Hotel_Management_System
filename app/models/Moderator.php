<?php
  class Moderator{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getIssueDetails($issueId){
      $this->db->query('SELECT * FROM issues WHERE `issuesId` = :issueId');

      $this->db->bind(':issueId', $issueId);

      $result = $this->db->Single();

      return $result;
    }

    public function updateIssue($data){
      $this->db->query('UPDATE issues SET `status` = :status WHERE `issuesId` = :issueId');

      $this->db->bind(':status', $data['status']);
      $this->db->bind(':issueId', $data['issueId']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    
  }