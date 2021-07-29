<?php

 
include("header.php");
include('config.php');  // إستدعاء ملف الاتصال
include('conn.php');

include('database_connection.php');

if($_SESSION['user_type']!=='admin')
{
    echo "<script> window.location.href='index.php'; </script>";
}
 


if($_SERVER["REQUEST_METHOD"] == "POST") {           // إختبار دالة الإرسال

    if (empty($_POST['title'])) {
        echo "<script>alert('ادخل عنوان الفعالية ')</script>";
    } elseif (empty($_POST['body'])) {
        echo "<script>alert('وصف الفالية')</script>";
    }  else {
    if (isset($_POST['insert']) == true) {              // إختبار العملية

            $title = $_POST['title'];                   // تعريف المتغيرات
            $body = $_POST['body'];

            $banner=$_FILES['fileToUpload']['name']; 
        $expbanner=explode('.',$banner);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());                       //upload img 
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="photos/".$bannername;
      
        


            $myqry = "INSERT INTO `event` (`title`, `body`, `img`)
             VALUES ('$title','$body', '$bannerpath');";

            if (mysqli_query($conn, $myqry) === true) {  
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$bannerpath) ;                  // إختبار نجاح الاضافة
                echo "<script>alert('تم إضافة فعالية')</script>";
                echo "<script>window.location='addEvent.php'</script>";
            } else {
                echo $conn->error;
                // echo "<script>alert('لم يتم إضافة الفعالبة')</script>";
                // echo "<script>window.location='addEvent.php'</script>";
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
                       <h2 class="text-title text-center">إضافة فعالية</h2>
                    

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6">
                                    
                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="title" class="form-control mb-30" placeholder="عنوان الفعالية">
                                </div>

                                

                                

                                

                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="body" class="form-control mb-30" placeholder="وصف الفعالية "></textarea>
                                </div>
                                
                                </div>






                                
                            <div class="col-md-6 relative">
                                
                            <div class="input-file-container">  
                            <input type="file" class="input-file" id="fileToUpload" type="img" name="fileToUpload">
                            <label tabindex="0" for="my-file" class="input-file-trigger">إضافة صورة  </label>
                            </div>
                        
                             <img id="image_upload_preview" src="img/no.png" style="width: 100%;height: 72%;border-radius: 10px;" alt="your image" />
                            
                          </div>
                          <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit" name="insert" class="btn roberto-btn mt-15">إضافة </button>
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
include('footer.php');
?>