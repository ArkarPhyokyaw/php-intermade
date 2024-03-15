<?php
class database
{
    private $host=DB_HOST;
    private $dbname=DB_NAME;
    private $dbuser=DB_USER;
    private $pass=DB_PASS;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dbc="mysql::host= ".$this->host.";dbname=".$this->dbname;
        $options=[
            PDO::ATTR_PERSISTENT=> true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh=new PDO($dbc,$this->dbuser,$this->pass,$options);
        }catch(PDOException $e)
        {
           exit( $e->getMessage());
        }
    }

    public function query($qry)
    {
        $this->stmt = $this->dbh->prepare($qry);
    }

    public function bind($params,$value,$type='')
    {
        if(empty($type))
        {
            switch($value){
                case is_int($value): $type=PDO::PARAM_INT;break;
                case is_bool($value):$type=PDO::PARAM_BOOL;break;
                case is_null($value):$type=PDO::PARAM_NULL;break;
                default : $type=PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($params,$value,$type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function singleSet()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function multiSet()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
?>