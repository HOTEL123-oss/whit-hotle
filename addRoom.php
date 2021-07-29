<?php
include("header.php");
include('config.php');
include('conn.php');
include('database_connection.php');
if($_SESSION['user_type']!=='admin')
{
    echo "<script> window.location.href='index.php'; </script>";
}
if($_SERVER["REQUEST_METHOD"] == "POST") {           // إختبار دالة الإرسال
    //valdation form data
    if (empty($_POST['room_no'])) {
        echo "<script>alert('ادخل رقم الغرفة ')</script>";
    } elseif (empty($_POST['room_type'])) {
        echo "<script>alert('حدد نوع الغرفة')</script>";
    } elseif (empty($_POST['rent_day'])) {
        echo "<script>alert('ادخل سعر ايجار اليوم')</script>";
    } elseif (empty($_POST['gust_cont'])) {
        echo "<script>alert('ادخل عدد النزلاء ')</script>";
    }
    elseif (empty($_POST['room_details'])) {
        echo "<script>alert('ادخل  وصف الغرفة')</script>";
    }  else {
    if (isset($_POST['insert']) == true) {              // إختبار العملية

            $room_no = $_POST['room_no'];                   // تعريف المتغيرات
            $room_type = $_POST['room_type'];
            $rent_day = $_POST['rent_day'];

            $gust_cont = $_POST['gust_cont'];
            $room_details = $_POST['room_details'];

        $banner=$_FILES['fileToUpload']['name']; 
        $expbanner=explode('.',$banner);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());                       //upload img 
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="photos/".$bannername;
    
            // $imgData = addslashes(file_get_contents($_FILES['img']['tmp_name']));       // رفع الصورة
            // $imageProperties = getimageSize($_FILES['img']['tmp_name']);
            // // تخزين معلومات الصورة
            $myqry = "INSERT INTO `room`
             (`room_no`, `room_type`, `rent_day`, `gust_cont`, `room_details`, `img`) 
             VALUES
              ($room_no, '$room_type', $rent_day, $gust_cont, '$room_details' , '$bannerpath');";

            if (mysqli_query($conn, $myqry) === true) {    
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$bannerpath) ;                // إختبار نجاح الاضافة
                echo "<script>alert('تم إضافة غرفة')</script>";
                echo "<script>window.location='addroom.php'</script>";
            } else {
                echo $conn->error;
              //  echo "<script>alert('رقم الغرفة مسجل من قبل')</script>";
              //  echo "<script>window.location='addroom.php'</script>";
            }

        }
    }
}
?>



    <!-- About Us Area Start -->
    <section class="roberto-about-us-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms">
                       <h2 class="text-title text-center">إضافة غرفة</h2>
                    

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6">
                                    
                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="number" name="room_no" class="form-control mb-30" placeholder="رقم الغرفة">
                                </div>

                                <div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                
                                <p>
                                    <input type="radio" id="test2" name="room_type" value="غرفة كبيرة" checked>
                                    <label for="test2">غرفة كبيرة </label>
                                </p>
                               <p>
                                    <input type="radio" id="test1" name="room_type" value="غرفة صغيرة" >
                                    <label for="test1">غرفة صغيرة</label>
                                </p>
                                

                                      
                               
                                </div>

                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="number" name="rent_day" class="form-control mb-30" placeholder="سعر إيجار اليوم للغرفة">
                                </div>

                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="number" name="gust_cont" class="form-control mb-30" placeholder="عدد النذلاء ">
                                </div>

                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="room_details" class="form-control mb-30" placeholder="وصف الغرفة "></textarea>
                                </div>
                                
                                </div>






                                
                            <div class="col-md-6 relative">
                                
                            <div class="input-file-container">  
     <input class="input-file" id="fileToUpload" type="file" name="fileToUpload">
    <label tabindex="0" for="my-file" class="input-file-trigger">إضافة صورة للغرفة </label>
  </div>
                        
                             <img id="image_upload_preview" src="img/no.png" style="width: 100%;height: 72%;border-radius: 10px;" alt="your image" />
                            
                          </div>
                          <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit" name="insert" class="btn roberto-btn mt-15">إضافة الغرفة</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>





                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->





    

   <?php
    include("footer.php");
   ?>