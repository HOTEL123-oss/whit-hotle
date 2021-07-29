<?php

include("header.php");

include('config.php');


$message = '';
if($_SERVER['REQUEST_METHOD']=='POST'){

    

    $comp_or_pro = $_POST['comp_or_pro'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    if(isset($_POST["send"]))
    {

    $insert = "insert into `contact` ( `id` , `name` , `phone`,`email`,`comp_or_pro`)
               VALUES (NULL ,'$name', '$phone','$email','$comp_or_pro');";
              

               if($database->query($insert)===true){

                    $message = "<label class='text-center text-success'> تم  بنجاح </label>";
                    
                      
                }else{

                    $message = "<label style='color: #a94442'>لم  يتم الارسال !!</label>";
                }
              
              }

             
}

?>
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area contact-breadcrumb bg-img bg-overlay jarallax" style="background-image: url(img/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center mt-100">
                        <h2 class="page-title">التواصل معنا</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">التواصل معنا</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="google-maps-contact-info">
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>رقم الجوال</h4>
                            <p>(249) 99-323-2322</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>العنوان</h4>
                            <p>الخرطوم المنشية , شارع اوماك , شارع النيل .</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>اوقات العمل</h4>
                            <p class="text-success">دائما</p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>البريد الالكتروني</h4>
                            <p>info.tayson@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7686.011263083565!2d32.5865854689266!3d15.59134797667429!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf8531752b7ef267a!2z2KfZhNio2LHYrCDYp9mE2KPYqNmK2LYgV2hpdGUgVG93ZXI!5e0!3m2!1sar!2s!4v1577162224283!5m2!1sar!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>                </div>
            </div>
        </div>
    </section>

    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">

                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>للتواصل معنا</h6>
                        <h2>إترك لنا رسالة</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                <h5 class="text-center" ><?php echo $message; ?></h5>

                    <div class="roberto-contact-form">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="name" class="form-control mb-30" placeholder="الاسم كامل">
                                </div>
                                <div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="email" name="email" class="form-control mb-30" placeholder="البريد الالكتروني">
                                </div>
                                <div class="col-12 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="tel" name="phone" class="form-control mb-30" placeholder="رقم الجوال">
                                </div>
                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="comp_or_pro" class="form-control mb-30" placeholder="الرسالة"></textarea>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit"  name="send" class="btn btn-primary btn-lg mt-15">إرسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include('footer.php')

?>