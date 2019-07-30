<?php
    class MyDB
    {
        private $db = null;     //

        private function getConn()
        {
            if ($this->db === null)
            {
                $this->db = new mysqli("127.0.0.1", "root", "admin", "sursystem") or die($this->db->error);
                $this->db->query("SET NAMES 'utf8'");
            }
        }
        public function GetData($query)
        {
            $this->getConn();
            $result = $this->db->query($query) or die ($this->db->error);
            return $result;
        }
        public function execSQL($query)
        {
            $this->getConn();
            $result = $this->db->query($query) or die ($this->db->error);
            return $result;
        }


        public function FreeResult($result)
        {
            $result->free_result();
        }
        public function __destruct()
        {
            if ($this->db !== null)
            {
                $this->db->close();
                $this->db = null;
            }
        }

        public function GetLastInsertId()
        {
            $this->getConn();
            $result = $this->db->insert_id;
            return $result;
        }

        public function GetAffectedRows()
        {
            $this->getConn();
            $result = $this->db->affected_rows;
            return $result;
        }
    }
?>