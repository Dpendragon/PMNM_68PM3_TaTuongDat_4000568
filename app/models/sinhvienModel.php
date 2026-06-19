<?php
require_once "../app/core/DB.php";
class sinhvienModel
{
  private $conn;
  public function __construct()
  {
    $this->conn = ConnectDB::Connect();
  }

  public function getAllSinhVien()
  {
    $query = "SELECT sv.*, lh.TenLop FROM sinhvien sv LEFT JOIN lophoc lh ON sv.MaLop = lh.MaLop";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function paging($limit = 5, $offset = 0, $search = "")
  {
    $search = trim($search);

    $baseFrom = "FROM sinhvien sv
                 LEFT JOIN lophoc lh ON sv.MaLop = lh.MaLop";

    if ($search !== "") {
      $like = "%" . $search . "%";

      $whereClause = "WHERE sv.MSSV  LIKE :like
                         OR sv.HoTen LIKE :like2
                         OR lh.TenLop LIKE :like3";

      // Đếm tổng bản ghi khớp
      $countStmt = $this->conn->prepare("SELECT COUNT(*) $baseFrom $whereClause");
      $countStmt->bindValue(':like',  $like);
      $countStmt->bindValue(':like2', $like);
      $countStmt->bindValue(':like3', $like);
      $countStmt->execute();
      $totalRecords = (int) $countStmt->fetchColumn();

      // Lấy dữ liệu trang hiện tại
      $stmt = $this->conn->prepare(
        "SELECT sv.*, lh.TenLop
         $baseFrom
         $whereClause
         ORDER BY sv.id ASC
         LIMIT :limit OFFSET :offset"
      );
      $stmt->bindValue(':like',   $like);
      $stmt->bindValue(':like2',  $like);
      $stmt->bindValue(':like3',  $like);
      $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
      $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    } else {
      $totalRecords = (int) $this->conn->query("SELECT COUNT(*) FROM sinhvien")->fetchColumn();

      $stmt = $this->conn->prepare(
        "SELECT sv.*, lh.TenLop
         $baseFrom
         ORDER BY sv.id ASC
         LIMIT :limit OFFSET :offset"
      );
      $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
      $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    }

    $stmt->execute();
    $sinhviens  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalPages = ($totalRecords > 0) ? (int) ceil($totalRecords / $limit) : 1;

    return ['sinhviens' => $sinhviens, 'totalPages' => $totalPages];
  }

  public function getSinhVienById($id)
  {
    $query = "SELECT sv.*, lh.TenLop
              FROM sinhvien sv
              LEFT JOIN lophoc lh ON sv.MaLop = lh.MaLop
              WHERE sv.id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create($MSSV, $HoTen, $GioiTinh, $MaLop)
  {
    $query = "INSERT INTO sinhvien (MSSV, HoTen, GioiTinh, MaLop) VALUES ( :MSSV, :HoTen, :GioiTinh, :MaLop )";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':MaLop', $MaLop);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function update($id, $MSSV, $HoTen, $GioiTinh, $MaLop)
  {
    $query = "UPDATE sinhvien SET MSSV = :MSSV, HoTen = :HoTen, GioiTinh = :GioiTinh, MaLop = :MaLop WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':MaLop', $MaLop);
    return $stmt->execute();
  }

  public function delete($id)
  {
    $query = "DELETE FROM sinhvien WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
