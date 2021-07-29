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

    if (empty($_POST['flat_no'])) {
        echo "<script>alert('ادخل رقم الشقة ')</script>";
    } elseif (empty($_POST['rent_month'])) {
        echo "<script>alert('ادخل سعر ايجار الشهر')</script>";
    } elseif (empty($_POST['address'])) {
        echo "<script>alert('ادخل العنوان  ')</script>";
    }
    elseif (empty($_POST['flat_details'])) {
        echo "<script>alert('ادخل  وصف الشقة')</script>";
    }  else {
    if (isset($_POST['insert']) == true) {      // إختبار العملية

        $banner=$_FILES['fileToUpload']['name']; 
        $expbanner=explode('.',$banner);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());                       //upload img 
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="photos/".$bannername;
      
        
            $flat_no = $_POST['flat_no'];                   // تعريف المتغيرات
            $rent_month = $_POST['rent_month'];
            $address = $_POST['address'];
            $flat_details = $_POST['flat_details'];

          
          

            $myqry = "INSERT INTO `flat` 
            (`flat_no`, `address`, `rent_month`, `flat_details`, `img`)
             VALUES 
             ($flat_no, '$address','$rent_month', '$flat_details' ,'$bannerpath');";

           // $myqry = "INSERT INTO `flat` ( `flat_no`, `rent_month`, `address`, `flat_details`, `img`)
             //VALUES ($flat_no, $rent_month, '$address', '$flat_details' , $bannerpath);";

            if (mysqli_query($conn, $myqry) === true) {       
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$bannerpath) ;             // إختبار نجاح الاضافة
                echo "<script>alert('تم إضافة شقة')</script>";
                echo "<script>window.location='addFlat.php'</script>";
            } else {
             echo "<script>alert('رقم الشقة مسجل من قبل')</script>";
               echo "<script>window.location='addFlat.php'</script>";
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
                       <h2 class="text-title text-center">إضافة شقة</h2>
                    

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6">
                                    
                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="numer" name="flat_no" class="form-control mb-30" placeholder="رقم الشقة">
                                </div>

                                

                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="number" name="rent_month" class="form-control mb-30" placeholder="سعر إيجار الشهر للشقة">
                                </div>

                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="address" class="form-control mb-30" placeholder="العنوان">
                                </div>

                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="flat_details" class="form-control mb-30" placeholder="وصف الشقة "></textarea>
                                </div>
                                
                                </div>

                                
                            <div class="col-md-6 relative">
                                
                            <div class="input-file-container">  
                            <input type="file" class="input-file" name="fileToUpload" id="fileToUpload" name="img">
                            <label tabindex="0" for="my-file" class="input-file-trigger">إضافة صورة للشقة </label>
                            </div>
                        
                             <img id="image_upload_preview" src="img/no.png" style="width: 100%;height: 72%;border-radius: 10px;" alt="your image" />
                            
                          </div>
                          <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit" name="insert" class="btn roberto-btn mt-15">إضافة الشقة</button>
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