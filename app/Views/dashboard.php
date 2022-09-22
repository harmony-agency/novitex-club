<!DOCTYPE html>
<html lang="fa">
  <head>
      <title>باشگاه مشتریان نویتکس</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/harmony.css" />
    <link rel="stylesheet" href="assets/css/main.css?ver=1.0.7" />
    <link rel="stylesheet" href="assets/css/responsive.css?ver=1.0.6" />
    <link href="assets/css/plugins.css" rel="stylesheet" />
    <link href="assets/css/Custom.css" rel="stylesheet" />
    <!-- Google Tag Manager - Head -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W7SG8TM');</script>
<!-- End Google Tag Manager -->
  </head>
  <body id="MainMaster">
<!-- Google Tag Manager (noscript) - Body -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7SG8TM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

      <div id="divMain">
        <div id="one-page" class="one-page">
          <div id="trans-bg" class="trans-bg">
            <div class="morph-wrap">
              <svg
                class="morph"
                width="1400"
                height="770"
                viewBox="0 0 1400 770"
              >
                <path
                  fill="#fff"
                  d="M 262.9,252.2 C 210.1,338.2 212.6,487.6 288.8,553.9 372.2,626.5 511.2,517.8 620.3,536.3 750.6,558.4 860.3,723 987.3,686.5 1089,657.3 1168,534.7 1173,429.2 1178,313.7 1096,189.1 995.1,130.7 852.1,47.07 658.8,78.95 498.1,119.2 410.7,141.1 322.6,154.8 262.9,252.2 Z"
                />
              </svg>
            </div>
          </div>
          <div id="amazingslider-wrapper-1" class="amazingslider-wrapper">
<div class="container text-center"><a href="<?= site_url('logout') ?>" style="color: #fff;">خروج</a></div>
            <div id="amazingslider-1" class="amazingslider">
              <!-- profile -->
              <section id="profile">
                <div class="container">
                  <div class="content">
<h1> به بزرگترین چالش اینستاگرامی خوش آمدید! </h1>
<div class="avatar">
                      <img src="./assets/images/avatar-default.png" alt="" />
                    </div>
                     <h2 class="instagram">  <?= session()->get('instagram') ?> <i class="fab fa-instagram"></i></h2>
                    <div class="info">
                      <div class="phoneNumber" style="color: #fff !important;">
                         <?= session()->get('mobile') ?>
                        <i class="fas fa-phone-alt"></i>
                      </div>

                    </div>
<p class="description">شما تاکنون <span id="score"><?=  $score;  ?> </span> امتیاز ثبت نام را دریافت کردید</p>

<div class="box-content">
    <p>برای  شرکت در مسابقات <span> پیج اینستاگرام</span> ما را دنبال کنید</p>
                                <a href="https://instagram.com/novitex.co?igshid=YmMyMTA2M2Y=" class="btn btn-info" target="_blank">
                              ورود به اینستاگرام
                            </a>
                        
                    </div>
<div class="box-form">
    <div class="row">
        <div class="col-md-6">
            <p class="title">امتیاز ثبت نام</p>
<p>در صورتي كه امتياز ثبت نام شما صفر می‌باشد با وارد کردن کد معرف می‌توانید
    <span> ۲ امتیاز</span> دریافت کنید.(با دنبال کردن پیج اینستاگرام و تبليغات فضاي وب و مجازى ما از کدهای معرف مطلع شوید)</p>
        </div>
                <div class="col-md-6">
                    <form
                            id="referralCode"
                            method="POST"
                            action="javascript:void(0)"
                          >
                          <div class="form-group">
                              <input
                                placeholder="کد معرف"
                                type="text"
                                class="form-control"
                                name="referral_code"
                                id="referral_code"
                              />
                            </div>

                            <button type="submit" class="btn btn-success">
                              ثبت کد معرف
                            </button>
          
                          </form>
                          <div class="result-code"></div>
                          </div>

                          </div>
   </div>



   <div class="box-form-pic">
    <div class="row">
        <div class="col-md-6">
        <div class="img-upload">

            <p class="title">آپلود تصویر استوری</p>
            <p>برای دریافت امتیاز این مرحله، عکس استوری که پیج نویتکس را در آن تگ کرده ایید در این قسمت بارگزاری کنید.</p>
            <form
                            id="picStory"
                            method="POST"
                            action="javascript:void(0)"
                            enctype="multipart/form-data"
                          >
                          <div class="form-group">

                          <div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="fileName">انتخاب فایل </div>
    <div class="file-select-name" id="noFile">فایلی انتخاب نشده</div> 
    <input type="file" name="pic_story" id="pic_story"   accept=".jpg,.gif,.png">
  </div>
</div>

                            </div>
                            <label for="pic_story" class="form-label">حداکثر حجم : 2مگابایت</label>
                            <label for="pic_story" class="form-label">فرمت مجاز  : jpg,png,gif</label>

                            <button type="submit" class="btn btn-success">
                               ارسال تصویر 
                            </button>
          
                          </form>
                          <div class="result-pic-story"></div>
</div>
        </div>


                          <div class="col-md-6">
                            <div class="img-upload">
            <p class="title">آپلود تصویر نقاشی</p>
            <p>برای ارسال نقاشی خود، روی دکمه اپلود بزنید و عکس نقاشی را بارگزاری کنید.</p>
            <form
                            id="picPaint"
                            method="POST"
                            action="javascript:void(0)"
                            enctype="multipart/form-data"
                          >
                          <div class="form-group uploadFile">
                          <div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="fileName">انتخاب فایل </div>
    <div class="file-select-name" id="noFile">فایلی انتخاب نشده</div> 
    <input type="file" name="pic_paint" id="pic_paint"   accept=".jpg,.gif,.png">
  </div>
</div>


                            </div>
                            <label for="pic_paint" class="form-label">حداکثر حجم : 2مگابایت</label>
                            <label for="pic_story" class="form-label">فرمت مجاز  : jpg,png,gif</label>

                            <button type="submit" class="btn btn-success">
                               ارسال تصویر 
                            </button>
          
                          </form>
                          <div class="result-pic-paint"></div>
</div>
        </div>

                          </div>
   </div>
   
   <div class="box-score">
       <p class="title">امتیاز پست های مسابقات</p>
       <p>شما تا <span>مهرماه 14۰۰</span> با شرکت در مسابقات گوناگون ما در پیج اینستاگرام میتوانید امتیاز خود را ارتقا دهید. تمامی پست مسابقات در اینجا نیز به روز رسانی خواهد شد و<span> با کلیک روی آن میتوانید با مطالعه کپشن هر پست، در آن مسابقه شرکت کنید</span>.</p>
   
   <div class="row">
       <div class="col-md-4">
           <div class="box-pic">
               <p class="title">امتیاز لایک پست اینستاگرام</p>
<p> به پستی که از زمان شروع کمپین تا انتهای کمپین بالاترین لایک را داشته باشد به همه افرادی که اون پست را لایک کردن، <span> ۵ امتیاز</span> داده خواهد شد پس با لایک کردن همه پست‌ها شانس گرفتن این ۵ امتیاز را خواهید داشت.</p>
           </div>
           <img class="img-fluid" src="assets/images/score/insta-social.jpg" />
           <div class="des"></div>
       </div>
           <div class="col-md-4">
                <div class="box-pic">
                    <a href="https://www.instagram.com/p/Cf8TAYDI0L1/?igshid=YmMyMTA2M2Y" target="_blank"> <img class="img-fluid" src="assets/images/score/post-1.jpg" /></a>
               </div>
                                   <p class="score-insta">2 امتیاز</p>

             </div>

                        <div class="col-md-4">
                <div class="box-pic">
                   <a href="https://www.instagram.com/tv/CgG4vYRIep2/?igshid=YmMyMTA2M2Y" target="_blank"> <img class="img-fluid" src="assets/images/score/post-2.jpg" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>
             
                        <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/p/CgPC_GyINak/?igshid=YmMyMTA2M2Y" target="_blank">  <img class="img-fluid" src="assets/images/score/post-3.jpg" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>

             
                                     <div class="col-md-4">
                <div class="box-pic">
                    <a href="https://www.instagram.com/p/CgwSZ9soZqQ/?igshid=YmMyMTA2M2Y" target="_blank"> <img class="img-fluid" src="assets/images/score/post-4.jpg" /></a>

               </div>
                                                       <p class="score-insta">1 امتیاز</p>

             </div>
                                   <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/reel/ChCxSzfIWlN/?igshid=YmMyMTA2M2Y" target="_blank">   <img class="img-fluid" src="assets/images/score/post-5.jpg" /></a>

               </div>
                                                       <p class="score-insta">1 امتیاز</p>

             </div>
             
                                                <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/reel/ChCxSzfIWlN/?igshid=YmMyMTA2M2Y" target="_blank">   <img class="img-fluid" src="assets/images/score/post-6.png" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>
             
                                                             <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/p/ChXiOr7MvQE/?igshid=NmNmNjAwNzg=" target="_blank">   <img class="img-fluid" src="assets/images/score/post-7.jpg" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>
             
                                                                          <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/p/Chj3m-TIh5l/?igshid=NmNmNjAwNzg=" target="_blank">   <img class="img-fluid" src="assets/images/score/post-8.jpg" /></a>

               </div>
                                                       <p class="score-insta">چند امتیاز</p>

             </div>
             
                                                                          <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/p/Chpks-9op8W/?igshid=NmNmNjAwNzg=" target="_blank">   <img class="img-fluid" src="assets/images/score/post-9.jpg" /></a>

               </div>
                                                       <p class="score-insta">1 امتیاز</p>

             </div>
             
                                                                          <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/p/Chy6eOXIkRf/?igshid=NmNmNjAwNzg=" target="_blank">   <img class="img-fluid" src="assets/images/score/post-10.jpg" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>
             
                                                                                       <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/reel/Ch7INIXIelL/?igshid=NmNmNjAwNzg=" target="_blank">   <img class="img-fluid" src="assets/images/score/post-11.jpg" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>
             
                                                                                       <div class="col-md-4">
                <div class="box-pic">
                <a href="https://www.instagram.com/reel/CiFa2THo_no/?igshid=NmNmNjAwNzg=" target="_blank">   <img class="img-fluid" src="assets/images/score/post-12.jpg" /></a>

               </div>
                                                       <p class="score-insta">3 امتیاز</p>

             </div>
             
             
             
   </div>
<p class="des-buttom">امتیازی که در هر بخش کسب کردید در آخر کمپین برای شما ثبت و به شما نمایش داده می‌شود</p>

   </div>
                    </div>
                </div>
              </section>

              <!-- condition -->
              <section id="condition" class="condition-profile" style="display:none">
                <div class="container">
                  <div class="content">

                    <h2>شرایط شرکت در مسابقه</h2>
<p>
    مهلت مسابقه تا مهرماه ادامه دارد و در هر بازه زمانی كه وارد پيج اينستاگرام شوید مي توانيد از طريق هايلات اين كمپين در تمامی مسابقات شركت كنيد.
                          <br />
                          پاسخ مسابقات در انتهای کمپین در پیج اینستاگرام ما منتشر
                          خواهد شد.
                          <br />
                          امتیازات شما هر دو هفته یکبار به روزرسانی می‌شود.
                          <br />
                          شانس شما در قرعه کشی با افزایش امتیازات بیشتر خواهد شد.
                          <br />
                          مسابقات در پیج اینستاگرام
                          <a
                            href="https://instagram.com/novitex.co?igshid=YmMyMTA2M2Y="
                            target="_blank"
                          >
                            novitex.co
                          </a>
                          منتشر خواهد شد و توضیحات هر مسابقه در کپشن همان پست اعلام
                          می‌شود.
                          <br />
                          در پايان كمپين پستى كه بيشترين لايك را دارد، مشخص شده و
                          برای افرادى كه ان پست را لايك كرده اند امتياز جداگانه در
                          نظر گرفته ميشود (با لایک کردن همه ی پست ها، شانس خود را
                          بالا ببرید)
                        </p>
                  </div>
                </div>
              </section>

              <!-- footer -->
              <footer>
                <div class="copyright">
                  <a
                    href="https://harmony.agency/?utm_source=designbyharmony&amp;utm_medium=badge&amp;utm_campaign=novitex-landing"
                    target="_blank"
                  >
                    <span class="hover-company desktop">
                      <img
                        src="assets/images/harmony-name.png"
                        loading="lazy"
                        alt=""
                      />
                    </span>
                    <img
                      class="logo desktop"
                      src="assets/images/harmony.png"
                      loading="lazy"
                      alt=""
                    />
                    <span class="hover-company desktop">Design by</span>
                    <img
                      src="assets/images/harmonyLogo.png"
                      alt=""
                      class="mobile"
                    />
                  </a>
                </div>
              </footer>
            </div>
          </div>
          <div class="content-wrap section view-port" id="section1"></div>
          <div class="content--related"></div>
        </div>
      </div>



    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/harmony.js?ver=1.0.3"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/anime.js"></script>
    <script src="assets/js/bg-morph.js"></script>
  </body>
</html>
