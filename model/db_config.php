<?php
 
class Database
{
    //khai báo biến
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'travel';

    private $conn = NULL;
    private $result = NULL;


    public function connect()
    {
        //Muốn sử dụng một thuộc tính nào đó có trong lớp thì sẽ sử dụng từ khoá $this->tên_thuộc_tính
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if (!$this->conn) {
            echo "Connect Fail";
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
            //echo"Thành công";
        }
        return $this->conn;
    }

    //Thực thi câu lệnh truy vấn;

    public function execute($sql)
    {
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    // Phương thức lấy dữ liệu
    public function getData()
    {
        if ($this->result) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    // Phương thức đếm số lượng bản ghi
    public function num_rows()
    {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }

    // Phương thức lấy toàn bộ dữ liệu
    public function Show_table($table)
    {
        $sql = "SELECT * FROM $table";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }

    public function Showtable($table)
    {
        $sql = "SELECT * FROM $table";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }


    /** Check user, pass trang Admin */
    public function checkAdmin($admin, $user, $pass)
    {
        $sql = "SELECT User,Pass FROM $admin WHERE User = '$user' AND Pass = '$pass'";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            echo "<script>alert('Sai tài khoản hoặc mật khẩu')</script>";
        } else {
            $_SESSION['User'] = $user;
            echo "<script>alert('Đăng nhập thành công')</script>";
            header('location: http://localhost/travel/index.php?controller=admin&action=dashboard');
        }
    }
    /**Dashboard */
    public function Doanhthu($doanhthu)
    {
        $sql = "SELECT Total 
        FROM $doanhthu WHERE Pending = 'Đã Thanh Toán' ";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    public function Tour_count($tour)
    {
        $sql = "SELECT $tour.*, tbl_destination.Name_city,tbl_activities.Name_LH 
        FROM $tour INNER JOIN tbl_destination ON $tour.id_destination = tbl_destination.id_destination
        INNER JOIN tbl_activities ON $tour.id_activities  = tbl_activities.id_activities 
        ORDER BY $tour.id_tour DESC";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    /**Quản Lý Tour*/
    // Phương thức lấy toàn bộ dữ liệu
    public function Show_Tour($tour, $page_item, $offset)
    {
        $sql = "SELECT $tour.*, tbl_destination.Name_city,tbl_activities.Name_LH 
        FROM $tour INNER JOIN tbl_destination ON $tour.id_destination = tbl_destination.id_destination
        INNER JOIN tbl_activities ON $tour.id_activities  = tbl_activities.id_activities 
        ORDER BY $tour.id_tour DESC LIMIT $page_item OFFSET $offset";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    // Phương thức thêm dữ liệu
    public function Insert_Tour($chkdes, $chkact, $code, $name, $startDate, $Timetour, $price, $img, $img1, $img2, $img3, $sale, $content, $detail, $feature)
    {
        $sql  = "INSERT INTO tbl_tour(id_tour,id_destination,id_activities,Code, Name_tour,startDate,time_tour,Price,Img,Img1,Img2,Img3,Sale,Content,CtTour,Feature) 
            VALUES(null,'$chkdes','$chkact', '$code', '$name', '$startDate', '$Timetour', '$price', '$img','$img1','$img2','$img3', '$sale','$content','$detail','$feature')";
        return $this->execute($sql); // Thực thi câu lệnh truy vấn.
    }
    // Phương thức sửa dữ liệu
    // Phương thức lấy dữ liệu cần sửa theo ID
    public function ShowTourID($tour, $id)
    {
        $sql = "SELECT $tour.*, tbl_destination.Name_city,tbl_activities.Name_LH 
        FROM $tour INNER JOIN tbl_destination ON $tour.id_destination = tbl_destination.id_destination
        INNER JOIN tbl_activities ON $tour.id_activities  = tbl_activities.id_activities 
        WHERE id_tour = '$id'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function Update_tour($id, $chkdes, $chkact, $name, $startDate, $Timetour, $price, $img, $img1, $img2, $img3, $sale, $content, $detail)
    {
        $sql = "UPDATE tbl_tour SET id_destination = '$chkdes', id_activities = '$chkact', Name_tour = '$name', startDate = '$startDate', time_tour = '$Timetour', Price = '$price', Img = '$img', Img1 = '$img1', Img2 = '$img2', Img3 = '$img3',Sale = '$sale', Content = '$content', CtTour = '$detail' 
        WHERE id_tour = '$id'";
        return $this->execute($sql);
    }
    //Xóa dữ liệu 
    public function Delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id_tour = '$id'";
        return $this->execute($sql);
    }

    //Feature Tour
    public function featureTour($feature, $id)
    {
        $sql = "UPDATE $feature set Feature = 'On' WHERE id_tour = $id ";
        $this->execute($sql);
    }

    public function featureTour_OFF($feature, $id)
    {
        $sql = "UPDATE $feature set Feature = 'Off' WHERE id_tour = $id ";
        $this->execute($sql);
    }

    /** ----------------Thành Phố -------------*/
    // Phương thức thêm dữ liệu
    public function Insert_area($city, $detail, $pic)
    {
        $sql  = "INSERT INTO tbl_destination(id_destination, Name_city, Details, Picture) VALUES(null, '$city', '$detail', '$pic')";
        return $this->execute($sql); // Thực thi câu lệnh truy vấn.
    }

    /*Phương thức sửa dữ liệu*/
    // Phương thức lấy dữ liệu cần sửa theo ID 
    public function getDataID($area, $id)
    {
        $sql = "SELECT * FROM $area WHERE id_destination = '$id'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // Update
    public function Update_are($id, $city, $detail, $pic)
    {
        $sql = "UPDATE tbl_destination SET Name_city = '$city', Details = '$detail', Picture = '$pic' WHERE id_destination = '$id'";
        return $this->execute($sql);
    }

    /**Loại Hình*/
    // Phương thức thêm dữ liệu
    public function Insert_act($act, $detail, $picture)
    {
        $sql  = "INSERT INTO tbl_activities(id_activities, Name_LH, Details, Picture) VALUES(null ,'$act', '$detail', '$picture')";
        return $this->execute($sql); // Thực thi câu lệnh truy vấn.
    }

    /*Phương thức sửa dữ liệu*/
    // Phương thức lấy dữ liệu cần sửa theo ID 
    public function getdataActID($act, $id)
    {
        $sql = "SELECT * FROM $act  WHERE id_activities = '$id'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    // Update
    public function Update_act($id, $city, $detail, $pic)
    {
        $sql = "UPDATE tbl_destination SET Name_city = '$city', Details = '$detail', Picture = '$pic' WHERE id_destination = '$id'";
        return $this->execute($sql);
    }

    /**Quản Lý Đặt Tour */
    public function BookTour($bookings)
    {
        $sql = "SELECT $bookings.*, tbl_tour.Code, tbl_tour.Price
        FROM $bookings INNER JOIN tbl_tour ON $bookings.id_tour = tbl_tour.id_tour";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    //Check Book
    public function checkBks($ckbks, $id)
    {
        $sql = "UPDATE $ckbks set Pending = 'Đã Thanh Toán' WHERE id_bks = $id ";
        $this->execute($sql);
    }

    public function checkBks_1($ckbks, $id)
    {
        $sql = "UPDATE $ckbks set Pending = 'Cọc 30% Giá' WHERE id_bks = $id ";
        $this->execute($sql);
    }

    // Hủy Vé
    public function Delete_bks($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id_bks = '$id'";
        return $this->execute($sql);
    }

    /** Quản Lý Tin Tức */
    public function Show_News($news, $page_item, $offset)
    {
        $sql = "SELECT * FROM $news ORDER BY $news.id_news DESC LIMIT $page_item OFFSET $offset";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }

    // Phương thức thêm dữ liệu
    public function Insert_news($title, $detail, $timenews, $author, $img)
    {
        $sql  = "INSERT INTO tbl_news (id_news,Title, Content,Time_news,author,Picture) 
            VALUES(null,'$title','$detail', '$timenews', '$author', '$img')";
        return $this->execute($sql); // Thực thi câu lệnh truy vấn.
    }
    // Phương thức sửa dữ liệu
    // Phương thức lấy dữ liệu cần sửa theo ID
    public function ShowNewsID($news, $id)
    {
        $sql = "SELECT * FROM $news WHERE id_news = '$id'";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }
    public function Update_news($id, $title, $detail, $timenews, $author, $img)
    {
        $sql = "UPDATE tbl_news SET Title = '$title', Content = '$detail', Time_news = '$timenews', author = '$author', Picture = '$img'  WHERE id_news = '$id'";
        return $this->execute($sql);
    }
    //Xóa dữ liệu 
    public function Delete_news($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id_news = '$id'";
        return $this->execute($sql);
    }


    //--------------------------------------------------------------------------------------------Phía Người Dùng------------------------------------------------

    //Trang Chủ
    public function Tour($tour)
    {
        $sql = "SELECT $tour.*, tbl_destination.Name_city,tbl_activities.Name_LH 
        FROM $tour INNER JOIN tbl_destination ON $tour.id_destination = tbl_destination.id_destination
        INNER JOIN tbl_activities ON $tour.id_activities  = tbl_activities.id_activities 
        ORDER BY $tour.id_tour DESC LIMIT 8 OFFSET 1";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    public function Fea_Tour($tour)
    {
        $sql = "SELECT $tour.*, tbl_destination.Name_city,tbl_activities.Name_LH 
        FROM $tour INNER JOIN tbl_destination ON $tour.id_destination = tbl_destination.id_destination
        INNER JOIN tbl_activities ON $tour.id_activities  = tbl_activities.id_activities 
        WHERE Feature = 'On'";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    /**  Bookings */
    // Đặt tour
    public function Booking($idtour, $fname, $mobile, $email, $address, $person, $Date_tour, $status, $total)
    {
        $sql  = "INSERT INTO tbl_bookings(id_bks,id_tour,Fname,Mobile, Email,Addr, Person, Date_tour,Pending,Total) 
        VALUES(null,'$idtour' ,'$fname','$mobile', '$email','$address',' $person', '$Date_tour','$status','$total')";
        return $this->execute($sql); // Thực thi câu lệnh truy vấn.
    }

    /** Địa Điểm, Loại Hình tour */
    public function search_ID($tourbydes, $id)
    {
        $sql = "SELECT $tourbydes.*, tbl_destination.Name_city,tbl_activities.Name_LH,tbl_activities.Details
        FROM $tourbydes,tbl_destination,tbl_activities WHERE  $tourbydes.id_destination = tbl_destination.id_destination AND $tourbydes.id_activities = tbl_activities.id_activities AND  ($tourbydes.id_destination = '$id' OR $tourbydes.id_activities = '$id') ";
        $this->execute($sql);
        if ($this->num_rows() != 0) {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        } else {
            $data = 0;
        }
        return $data;
    }

    public function search_Category($table, $id_des, $id_act)
    {
        $sql = "SELECT $table.*, tbl_destination.Name_city  
        FROM $table, tbl_destination WHERE $table.id_destination = tbl_destination.id_destination 
        AND  id_activities  = '$id_act'  AND   $table.id_destination = '$id_des'";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }

    //Phương thức Tìm Kiếm  
    public function select_Category($table, $start, $id)
    {
        $sql = "SELECT $table.*, tbl_destination.Name_city  
        FROM $table, tbl_destination WHERE $table.id_destination = tbl_destination.id_destination 
        AND ( id_activities  = '$start'  OR $table.id_destination  = '$start' ) 
        AND  ( $table.id_destination = '$id' OR $table.id_activities =  '$id')";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas; // mảng không tuần tự
            }
        }
        return $data;
    }
    
    /**Liên hệ */
    public function Contact($fname, $mobile, $email, $content)
    {
        $sql  = "INSERT INTO tbl_contact(id_contact,Fname,Mobile,Email,Content) 
        VALUES(null,'$fname','$mobile', '$email','$content')";
        return $this->execute($sql); // Thực thi câu lệnh truy vấn.
    }
}
