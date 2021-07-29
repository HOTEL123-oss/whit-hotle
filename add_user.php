<?php


include("header.php");
include('config.php');
include('database_connection.php');

if($_SESSION['user_type']!=='admin')
{
    echo "<script> window.location.href='index.php'; </script>";
}


$message = '';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    if(isset($_POST["reg"]))
    {
    if($password !== $con_password ) {
        $message = "<label style='color: #a94442' class='text-center'>كلمة المرور غير متطابقة </label>";
    }else{
    $insert = "insert into `users` ( `user_id`,`email`,`password`,`name`,`user_type`)
               VALUES (NULL , '$email', '$password', '$name', '$user_type');";

              if($database->query($insert)===true){
                $message = "<label class='text-success'>تمت إضافة المستخدم</label>";
              }else{
                $message = "<label style='color: #a94442'>المستخدم مسجل من قبل </label>";
                }
              }
            }
        }

?>



 
    <section class="roberto-about-us-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms">
                       <h1 class="text-title text-center">إضافة مستخدم</h1>
                       <h5 class="text-center" ><?php echo $message; ?></h5>


            <div class="row">
                <div class="col-md-12" style="margin-top: 15px;">

                    <div class="roberto-contact-form">
                        <form action="#" method="post" >
                            <div class="row">

                            <div class="col-md-6">
                                <div class="wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="name" class="form-control mb-30" placeholder="الاسم كامل">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="wow fadeInUp" data-wow-delay="100ms">
                                    <input type="email" name="email" class="form-control mb-30" placeholder="البريد الالكتروني">
                                </div>
                            </div>

                            

                            

                            <div class="col-md-12">
                                <div class="wow fadeInUp" data-wow-delay="100ms">
                                    <label>تحديد نوع المستخدم </label>
                                    <select class="form-control mb-30" name="user_type">
                                        <option value="admin">مدير</option>
                                        <option value="reception">موظف استقبال</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="wow fadeInUp" data-wow-delay="100ms">
                                    <input type="password" name="password" class="form-control mb-30" placeholder="كلمة المرور">
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="wow fadeInUp" data-wow-delay="100ms">
                                    <input type="password" name="con_password" class="form-control mb-30" placeholder="تأكيد كلمة المرور">
                                </div>
                            </div>



                               
                           
                          <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                 <button type="submit" name="reg" class="btn btn-primary btn-lg mt-15">إضافة</button>
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
    
<?php
include('footer.php'); 
?>
