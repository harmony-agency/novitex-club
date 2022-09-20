<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="container" style="margin-top:20px;">

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
            <div id="amazingslider-1" class="amazingslider">
              <section id="profile">
                <div class="container">
                  <div class="content">
                    <div class="avatar">
                      <img src="./assets/images/avatar.png" alt="" />
                    </div>
                    <h2 class="name">فتاح فتوحی</h2>
                    <div class="info">
                      <div class="phoneNumber">
                        09123456789
                        <i class="fas fa-phone-alt"></i>
                      </div>
                      <div class="instagram">
                        FatahFotuhi
                        <i class="fab fa-instagram"></i>
                      </div>
                    </div>
                    <p class="description">شما تاکنون 30 امتیاز دریافت کردید</p>
                  </div>
                </div>
              </section>
            </div>
          </div>
          <div class="content-wrap section view-port" id="section1"></div>
          <div class="content--related"></div>
        </div>
      </div>
      
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Profile</div>
            <div class="panel-body">
                <h3>Hi, <?= $user['name'] ?></h3>
                <hr>
                <p>Email: <?= $user['email'] ?></p>
                <p>Phone No: <?= $user['phone_number'] ?></p>
                <p>Score: <?= $user['score'] ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>