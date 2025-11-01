<?php

require_once 'database.php';

class validator extends Database{
    protected $errors = [];

    public function numeric($value, $field) {
        if(!is_numeric($value)) {
            $this->errors[$field][] = "Field $field harus berupa angka.";
        }
    }

    public function between($value, $min, $max, $field) {
        if($value < $min || $value > $max) {
            $this->errors[$field][] = "Field $field harus antara $min dan $max.";
        }
    }
    
    public function in($value, $field, $options){
        if(!in_array($value, $options)){
            $this->errors[$field][] = "Field $field harus salah satu dari: " . implode(", ", $options) . ".";
        }
    }

    public function unique($value, $field, $table, $column, $exceptId = null)
    {
        if (!$this->db) return;

        $sql = "SELECT COUNT(*) AS total FROM $table WHERE $column = ?";
        $params = [$value];

        if ($exceptId) {
            $sql .= " AND id != ?";
            $params[] = $exceptId;
        }

        $stmt = $this->db->prepare($sql);
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_assoc()['total'];

        if ($count > 0) {
            $this->errors[$field][] = "Field $field sudah digunakan.";
        }
    }


    public function confirmed($value, $field, $confirmationValue){
        if($value !== $confirmationValue){
            $this->errors[$field][] = "Field $field tidak sesuai dengan konfirmasi.";
        }
    }

    public function dateFormat($value, $field, $format){
        $d = DateTime::createFromFormat($format, $value);
        if (!$d || $d->format($format) !== $value) {
            $this->errors[$field][] = "Field $field tidak sesuai format tanggal $format.";
        }
    }

    public function errors()
    {
        return $this->errors;
    }
}
?>