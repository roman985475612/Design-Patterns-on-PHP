<?php
namespace App\System\Model;


abstract class Model
{
    public $ins_db;

    protected $table;

    protected $select = [];

    protected $from = '';

    protected $where = [];

    protected $limit = '';

    protected $sql = "";

    protected $typeSql = "select";

    protected $data;

    protected $id;

    public function __construct($id = null)
    {
        $this->ins_db = DbDriver::getInstance();

        if (!$this->table) {
            $this->table = strtolower((new \ReflectionClass($this))->getShortName()) . 's';
        }

        if ($id) {
            $this->id = $id;

            $obj = new static;
            $obj->select(["*"])->from()->where('id', $id);

            $result = $obj->get();
            if ($result && $result[0]) {
                $this->data = $result[0];
            } else {
                throw new \Exception('Error');
            }
        }
    }

    public function select($fields)
    {
        if (is_array($fields)) {
            $this->select = $fields;
        } elseif (is_string($fields) && func_num_args() == 1) {
            $this->select[] = $fields;
        } elseif (func_num_args() > 1) {
            $this->select[] = func_num_args();
        }
        return $this;
    }
    
    public function from($table = null)
    {
        if ($table) {
            $this->from = $table;
        } else {
            $this->from = $this->table;
        }
        return $this;
    }
    
    public function where($field, $operator = '', $value = '')
    {
        if (func_num_args() == 2) {
            $this->where[] = $field . ' = ' . $this->ins_db->getInsDb()->real_escape_string($operator);
        } else {
            $this->where[] = $field . ' '
                           . $operator . ' '
                           . $this->ins_db->getInsDb()->real_escape_string($value);
        }
        return $this;
    }
    
    public function limit(int $start, int $offset)
    {
        $this->limit = $start . ', ' . $offset;
        return $this;
    }
    
    public static function __callStatic($name, $arguments)
    {
        switch ($name) {
            case 'all':
                $obj = new static;
                $obj->select(["*"])->from();
                return $obj->get();
            
            case 'find':
                $obj = new static;
                $obj->select(["*"])->from()->where('id', $arguments[0]);
                return $obj->get();

            default:
                break;
        }
    }

    public function save()
    {
        if ($this->id) {
            $this->sql = "UPDATE {$this->table} SET ";

            foreach ($this->data as $key => $val) {
                $this->sql .= "{$key} = '{$val}', ";
            }

            $this->sql = rtrim($this->sql, ',');
            $this->where('id', $this->id);
            $this->sql .= $this->wherePrepare();
            $this->typeSql = "update";
        } else {
            if (count($this->data)) {
                $keys = array_keys($this->data);
                $values = array_values($this->data);

                $this->sql = "INSERT INTO {$this->table}";
                $this->sql .= " (" . implode(',', $keys) . ") ";
                $this->sql .= "VALUES (";

                foreach ($values as $val) {
                    $this->sql .= "'{$val}',";
                }

                $this->sql = rtrim($this->sql, ',') . ")";
                $this->typeSql = 'insert';
            }
        }
        return $this->execute();
    }

    public function destroy()
    {
        if ($this->id) {
            $this->where('id', $this->id);
            $this->sql = "DELETE FROM {$this->table}";
            $this->sql .= $this->wherePrepare();
            $this->typeSql = 'delete';

            return $this->execute();
        }
    }

    public function fromPrepare()
    {
        return " FROM {$this->from}";
    }

    public function selectPrepare()
    {
        return "SELECT " . implode(',', $this->select);
    }

    public function limitPrepare()
    {
        $str = "";
        if ($this->limit) {
            $str = " LIMIT {$this->limit}";
        }
        return $str;
    }

    public function wherePrepare()
    {
        $str = "";
        if (count($this->where) > 0) {
            $i = 0;
            foreach ($this->where as $key => $val) {
                if ($i == 0) {
                    $str .= " WHERE {$val}";
                } else {
                    $str .= " AND {$val}";
                }
                $i++;
            }
        }
        return $str;
    }

    public function get()
    {
        $this->sql = $this->selectPrepare()
                   . $this->fromPrepare()
                   . $this->wherePrepare()
                   . $this->limitPrepare();
        if ($this->sql) {
            return $this->execute();
        }
        return null;
    }


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    protected function execute()
    {
        if ($this->sql) {
            $result = $this->ins_db->query($this->sql);

            if (!$result) {
                throw new DbException("Ошибка запроса");
            }

            switch ($this->typeSql) {
                case 'select':
                    if ($result->num_rows == 0) {
                        return false;
                    }

                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $row[] = $result->fetch_assoc();
                    }

                    return $row;
                    break;
                case 'insert':
                    return $this->ins_db->getInsDb()->insert_id;
                    break;
                case 'updata':
                case 'delete':
            }
        }
    }
}