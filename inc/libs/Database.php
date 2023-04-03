<?php

class Database extends PDO
{


    private $sql;

    private $tableName;

    private $where;

    private $join;

    private $orderBy;

    private $groupBy;

    private $limit;

    private $page;

    private $totalRecord;

    private $pageCount;

    private $paginationLimit;

    private $html;

    public function __construct($host, $dbname, $username, $password, $charset = 'utf8')
    {
        parent::__construct('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
        $this->query('SET CHARACTER SET ' . $charset);
        $this->query('SET NAMES ' . $charset);
    }
    
 






  public function affectedRows($sql, $array = array()){
    $sth = $this->prepare($sql);
    foreach ($array as $key => $value) {
        $sth->bindValue($key, $value);
    }
    $sth->execute();
    return $sth->rowCount();
}

public function ekle($tableName, $data){
    $fieldKeys = implode(",", array_keys($data));
    $fieldValues = ":" . implode(", :", array_keys($data));

    $sql = "INSERT INTO $tableName($fieldKeys) VALUES($fieldValues)";
    $sth = $this->prepare($sql);
    foreach ($data as $key => $value) {
        $sth->bindValue(":$key", $value);
    }
    return $sth->execute();
}

public function guncelle($tableName, $data, $where){
    $updateKeys = null;
    foreach ($data as $key => $value) {
        $updateKeys .= "$key=:$key,";
    }
    $updateKeys = rtrim($updateKeys, ",");
    $sql = "UPDATE $tableName SET $updateKeys WHERE $where";

    $sth = $this->prepare($sql);
    foreach ($data as $key => $value) {
        $sth->bindValue(":$key", $value);
    }
    return $sth->execute();
}

public function sil($tableName, $where, $limit = 1){
    return $this->exec("DELETE FROM $tableName WHERE $where LIMIT $limit");
}

//bileşkeler

   /**
     * Sql sorguda tablo seçme işlemi belirlenir.
     *
     * @param $tableName
     * @return $this
     */
   public function select($tableName)
   {
    $this->sql = 'SELECT * FROM `' . $tableName . '`';
    $this->tableName = $tableName;
    return $this;
}

    /**
     * Sql sorguda kolon seçme işlemi belirlenir.
     *
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->sql = str_replace('*', $from, $this->sql);
        return $this;
    }

    /**
     * Sql sorguda -where- işlemini belirler.
     *
     * @param $column
     * @param $value
     * @param string $mark
     * @param bool $filter
     * @return $this
     */
    public function where($column, $value = '', $mark = '=', $logical = '&&'){

        if($mark =="like"){
            $value = '%'.$value.'%';    
        }

        $this->where[] = array($column, $value, $mark, $logical);
        return $this;
    }


    public function wheredizi($dizi){

       $logical = '&&';

       foreach ($dizi as $key => $value) {
        if ($key == 'news_name') {
         $mark = 'like';
     } else {
        $mark = '=';
    }

    

    if($mark =="like"){
        $value = '%'.$value.'%';    
    }
    
    $this->where[] = array($key, $value, $mark, $logical);


}
return $this;
}


    /**
     * Sql sorguda -or where- işlemini belirler.
     *
     * @param $column
     * @param $value
     * @param $mark
     * @return $this
     */
    public function or_where($column, $value, $mark = '='){
        $this->where($column, $value, $mark, '||');
        return $this;
    }

    /**
     * Sql sorguda -join- işlemini belirler.
     *
     * @param $targetTable
     * @param $joinSql
     * @param string $joinType
     * @return $this
     */
    public function join($targetTable, $joinSql, $joinType = 'inner')
    {
        $this->join[] = ' ' . strtoupper($joinType) . ' JOIN ' . $targetTable . ' ON ' . sprintf($joinSql, $targetTable, $this->tableName);
        return $this;
    }

    /**
     * Sql sorguda -orderby- işlemini belirler.
     *
     * @param $columnName
     * @param string $sort
     */
    public function orderby($columnName, $sort = 'ASC')
    {
        $this->orderBy = ' ORDER BY ' . $columnName . ' ' . strtoupper($sort);
        return $this;
    }

    /**
     * Sql sorguda -groupby- işlemini belirler.
     *
     * @param $columnName
     * @return $this
     */
    public function groupby($columnName)
    {
        $this->groupBy = ' GROUP BY ' . $columnName;
        return $this;
    }

    /**
     * Sql sorguda -limit- işlemini belirler.
     *
     * @param $start
     * @param $limit
     * @return $this
     */
    public function limit($start, $limit)
    {
        $this->limit = ' LIMIT ' . $start . ',' . $limit;
        return $this;
    }

    /**
     * Insert/Update/Select işlemlerini çalıştırmak için kullanılır.
     *
     * @param bool $single
     * @return array|mixed
     */
    public function run($single = false)
    {
        if ($this->join) {
            $this->sql .= implode(' ', $this->join);
            $this->join = null;
        }
        $this->get_where();
        if ($this->orderBy) {
            $this->sql .= $this->orderBy;
            $this->orderBy = null;
        }
        if ($this->groupBy) {
            $this->sql .= $this->groupBy;
            $this->groupBy = null;
        }
        if ($this->limit) {
            $this->sql .= $this->limit;
            $this->limit = null;
        }
        $query = $this->query($this->sql);

        if ($single)
            return $query->fetch(PDO::FETCH_ASSOC);
        else
            return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Sorgu çalıştırma metodlarında where işlemini yerine getirir.
     */
    private function get_where()
    {
        if (is_array($this->where) && count($this->where) > 0) {
            $this->sql .= ' WHERE ';
            $where = array();
            foreach ($this->where as $key => $arg) {
                if (!is_numeric($arg[1])) {
                    $arg[1] = '"' . $arg[1] . '"';
                }
                $where[] = ( $key > 0 ? $arg[3] : null ) . ' `' . $arg[0] . '` ' . strtoupper($arg[2]) . ' ' . $arg[1];
            }
            $this->sql .= implode(' ', $where);
            $this->where = null;
        }
    }

    /**
     * Insert işlemi için kullanılır.
     *
     * @param $tableName
     * @return $this
     */
    public function insert($tableName)
    {
        $this->sql = 'INSERT INTO ' . $tableName;
        return $this;
    }

    /**
     * Insert işlemi için veri yüklemede kullanılır.
     *
     * @param $columns
     * @return bool
     */
    public function set($columns)
    {
        $val = array();
        $col = array();
        foreach ($columns as $column => $value) {
            $val[] = $value;
            $col[] = $column . ' = ? ';
        }
        $this->sql .= ' SET ' . implode(', ', $col);
        $this->get_where();
        $query = $this->prepare($this->sql);
        $result = $query->execute($val);
        return $result;
    }

    /**
     * Son eklenen id yi geriye döndürür.
     *
     * @return string
     */
    public function lastId()
    {
        return $this->lastInsertId();
    }

    /**
     * Güncelleme işlemi için kullanılır.
     *
     * @param $columnName
     * @return $this
     */
    public function update($columnName)
    {
        $this->sql = 'UPDATE ' . $columnName;
        return $this;
    }

    /**
     * Silme işlemi için kullanılır.
     *
     * @param $columnName
     * @return $this
     */
    public function delete($columnName)
    {
        $this->sql = 'DELETE FROM ' . $columnName;
        return $this;
    }

    /**
     * Silme işlemini tamamlamak için kullanılır.
     *
     * @return int
     */
    public function done()
    {
        $this->get_where();
        $query = $this->exec($this->sql);
        return $query;
    }

    /**
     * Toplam sonucu -total- sütun adıyla geriye döndürür.
     *
     * @return mixed
     */
    public function total()
    {
        if (is_array($this->where) && count($this->where) > 0) {
            $this->sql .= ' WHERE ';
            $where = array();
            foreach ($this->where as $arg) {
                if (!is_numeric($arg[1])) {
                    $arg[1] = '"' . $arg[1] . '"';
                }
                $where[] = '`' . $arg[0] . '` ' . $arg[2] . ' ' . $arg[1];
            }
            $this->sql .= implode(' && ', $where);
            $this->where = null;
        }
        $query = $this->query($this->sql)->fetch(PDO::FETCH_ASSOC);
        return $query['total'];
    }

    /**
     * Sayfalama işlemine ait start ve limit değerlerini geriye döndürür.
     *
     * @param $totalRecord
     * @param $paginationLimit
     * @param $pageParamName
     * @return array
     */
    public function pagination($totalRecord, $paginationLimit, $pageParamName)
    {
        $this->paginationLimit = $paginationLimit;
        $this->page = isset($pageParamName) ? $pageParamName : 1;
        $this->totalRecord = $totalRecord;
        $this->pageCount = ceil($this->totalRecord / $this->paginationLimit);
        $start = ($this->page * $this->paginationLimit) - $this->paginationLimit;
        return array(
            'start' => $start,
            'limit' => $this->paginationLimit
            );
    }

    /**
     * Sayfalama işlemini geriye döndürür.
     *
     * @param $url
     * @return mixed
     */
    public function showPagination($url,$totalci,$limitci,$id,$fpageCount)
    {
        if ($totalci > $limitci) {
            for ($i = $id - 3; $i < $id + 4 + 1; $i++) {
                if ($i > 0 && $i <= $fpageCount) {
                    $this->html .= '<li class="';
                    $this->html .= ($i == $id ? 'active' : null);
                    $this->html .= '"><a href="' . str_replace('[page]', $i, $url) . '">' . $i . '</a></li>';
                }
            }
            return $this->html;
        }
    }

    /**
     * Sayfalama işleminde bir sonraki sayfayı geriye döndürür.
     *
     * @return bool
     */
    public function nextPage()
    {
        return ($this->page + 1 < $this->pageCount ? $this->page + 1 : $this->pageCount);
    }

    /**
     * Sayfalama işleminde bir önceki sayfayı geriye döndürür.
     *
     * @return bool
     */
    public function prevPage()
    {
        return ($this->page - 1 > 0 ? $this->page - 1 : 1);
    }

    /**
     * SQL sorgusunu string olarak geriye döndürür.
     *
     * @return mixed
     */
    public function getSqlString()
    {
        return $this->sql;
    }



    public function schema($table) {

        $q = $this->prepare("SHOW COLUMNS FROM `$table`");
        $q->execute();
        $table_fields = $q->fetchAll(PDO::FETCH_ASSOC);

        return $table_fields;
    }



    public function list_tables5()
    {
        $sql = 'SHOW TABLES';
        if($this->is_connected)
        {
            $query = $this->query($sql);
            return $query->fetchAll(PDO::FETCH_COLUMN);
        }
        return FALSE;
    }

    public function list_tables() {
        try {   
            $tableList = array();
            $result = $this->query("SHOW TABLES");
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $tableList[] = $row[0];
            }
            return $tableList;
        }
        catch (PDOException $e) {
          return  $e->getMessage();
      }
  }




  public function tabloyap($sql='')
  {

     try {

             $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

             $this->exec($sql);
             return true;

         } catch(PDOException $e) {
            return false;
        }

    }



}
