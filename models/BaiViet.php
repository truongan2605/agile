<?php
class BaiViet {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy danh sách tất cả bài viết
    public function getAllBaiViet() {
        try {
            $sql = 'SELECT * FROM bai_viets ORDER BY ngay_dang DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy chi tiết 1 bài viết theo ID
    public function getDetailBaiViet($id) {
        try {
            $sql = 'SELECT * FROM bai_viets WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Tìm kiếm bài viết theo tiêu đề
    public function searchBaiViet($keyword) {
        try {
            $sql = 'SELECT * FROM bai_viets WHERE tieu_de LIKE :keyword ORDER BY ngay_dang DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':keyword' => "%$keyword%"]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy các bài viết mới nhất
    public function getBaiVietMoi($limit = 5) {
        try {
            $sql = 'SELECT * FROM bai_viets ORDER BY ngay_dang DESC LIMIT :limit';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
