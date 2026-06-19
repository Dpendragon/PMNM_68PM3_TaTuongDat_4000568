<?php
require_once '../app/core/DB.php';
class lophocModel
{
  private $conn;
  public function __construct()
  {
    $this->conn = ConnectDB::Connect();
  }

  public function getAllLopHoc()
  {
    $query = "SELECT * FROM lophoc";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($MaLop, $TenLop, $GhiChu)
  {
    $query = "INSERT INTO lophoc (MaLop, TenLop, GhiChu) VALUES ( :MaLop, :TenLop, :GhiChu )";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':TenLop', $TenLop);
    $stmt->bindParam(':GhiChu', $GhiChu);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function paging($limit = 5, $offset = 0, $search = "")
  {
    $searchParam = "%" . $search . "%";

    // Query lấy dữ liệu trang hiện tại
    $query = "SELECT * FROM lophoc
              WHERE MaLop  LIKE :like1
              OR TenLop LIKE :like2
              ORDER BY id ASC
              LIMIT :limit OFFSET :offset";

    $stmt = $this->conn->prepare($query);
    $stmt->bindValue(':like1', $searchParam);
    $stmt->bindValue(':like2', $searchParam);
    $stmt->bindValue(':limit',  $limit,  PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countQuery = "SELECT COUNT(*) FROM lophoc
                   WHERE MaLop  LIKE :like1
                      OR TenLop LIKE :like2";

    $countStmt = $this->conn->prepare($countQuery);
    $countStmt->bindValue(':like1', $searchParam);
    $countStmt->bindValue(':like2', $searchParam);
    $countStmt->execute();
    $totalRecords = $countStmt->fetchColumn();

    $totalPages = ($totalRecords > 0) ? ceil($totalRecords / $limit) : 1;

    return [
      'lophocs'    => $result,
      'totalPages' => $totalPages,
    ];
  }

  public function getLopHocById($id)
  {
    $query = "SELECT * FROM lophoc WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $MaLop, $TenLop, $GhiChu)
  {
    $query = "UPDATE lophoc SET MaLop = :MaLop, TenLop = :TenLop, GhiChu = :GhiChu WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':TenLop', $TenLop);
    $stmt->bindParam(':GhiChu', $GhiChu);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id)
  {
    $query = "DELETE FROM lophoc WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
