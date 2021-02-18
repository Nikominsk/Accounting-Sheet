<?php

    class Database {

        protected $serverName;
        protected $userName;
        protected $password;
        protected $databaseName;

        protected $connection;

        function __construct() {

            $this->serverName = 'localhost:3325';
            $this->userName = 'root';
            $this->password = '';
            $this->databaseName = 'accounting2';

            $this->connect();
        }

        public function connect() {

            $this->connection = new mysqli($this->serverName, $this->userName, $this->password, $this->databaseName);

            if (!$this->connection->connect_error) {
                $this->connection->set_charset('utf8');
            }

        }

        public function isConnected() : bool {

            if ($this->connection->connect_error) {
                return FALSE;
            }

            return TRUE;
        }

        public function close() {
            $this->connection->close();
        }

        public function query($sqlQuery) {

            $this->connect();

            if ($this->isConnected() == FALSE) {
                alert("Connection to Database failed!");
                return false;
            }

            //execute sql
            $result = $this->connection->query($sqlQuery);

            $this->close();

            return $result;

        }

        public function insert($sqlQuery) {

            $this->connect();

            if ($this->isConnected() == FALSE) {
                alert("Connection to Database failed!");
                return false;
            }

            //execute sql
            $result = $this->connection->query($sqlQuery);

            if($result === TRUE) {
                return $this->connection->insert_id;
            } else {
                return FALSE;
            }

            $this->close();

            return $result;

        }

        public function fastQuery($sqlQuery) {

            if ($this->isConnected() == FALSE) {
                alert("Connection to Database failed!");
                return false;
            }

            //execute sql
            $result = $this->connection->query($sqlQuery);

            return $result;

        }


    }

?>