<?php

use yii\helpers\Url;

$html = '';
$back = '';
if (strpos(@$site_data['background'], 'uploads') !== false) {
    $path = dirname(__DIR__) . "/../../uploads/" . @explode("uploads/", $site_data['background'])[1];
    $mime = mime_content_type($path);
    if (strstr($mime, "image/")) {
        $bb = $site_data['background'];
        $back = 'url("' . $site_data['background'] . '") no-repeat 0 0';
    }
}
if (strpos(@$site_data['banner'], 'uploads') !== false) {
    $path = dirname(__DIR__) . "/../../uploads/" . @explode("uploads/", $site_data['banner'])[1];

    $mime = @mime_content_type($path);
    if (strstr($mime, "video/")) {
        $html = "<video width='100%' height='100%' controls><source src='" . $site_data['banner'] . "' type=" . $mime . "></video>";
    } else if (strstr($mime, "image/")) {
        $html = "<img src='" . $site_data['banner'] . "'  alt='' class='img-fluid'>";
    }
} else {
    $html = $site_data['banner'];
}
?>
<div class="content-body">
    <div class="main-slider">
        <?php foreach ($banner as $b) { ?>
            <div class="slider-item">
                <img class="" src="<?= Url::home(true); ?>uploads/slider/<?= $b->banner_img ?>" alt="slider">
                <?php if ($b->btn_link || $b->description) { ?>
                    <div class="container">
                        <div class="carousel-content">
                            <?php echo $b->description;
                            if ($b->btn_link)
                                echo '<a class="common-button animated" href="' . $b->btn_link . '" data-animation-in="fadeInUp">' . $b->btn_title . '</a>';
                            ?>

                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

    <div class="services-section">
        <div class="container">
            <div class="services-list" data-aos="fade-up">
                <div class="services-item">
                    <div class="services-details">
                        <img class="image" src="<?= Url::home(true); ?>theme/images/window.svg" onClick="location.href=''" style="cursor:pointer">
                        <h4 class="name">Window</h4>
                    </div>
                </div>
                <div class="services-item">
                    <div class="services-details">
                        <img class="image" src="<?= Url::home(true); ?>theme/images/interior-door.png" onClick ="location.href='/shop/interior-door/9'" style="cursor:pointer">
                        <h4 class="name">Interior/Exterior Door</h4>
                    </div>
                </div>
                <div class="services-item">
                    <div class="services-details">
                        <img class="image" src="<?= Url::home(true); ?>theme/images/balcony.png" onClick="location.href='/shop/balcony/-terrasse-door/13'" style="cursor:pointer">
                        <h4 class="name">Balcony/Terras Door</h4>
                    </div>
                </div>
                <div class="services-item">
                    <div class="services-details">
                        <img class="image" src="<?= Url::home(true); ?>theme/images/pergola.png" onClick="location.href='/shop/pergola/8'" style="cursor:pointer">
                        <h4 class="name">Pergola</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p style="text-align: center; color: white; background-color: red;">NOTE: Due to the present Pandamic, our showrooms are currently closed for visitors. Enquiries can only be made via email or telephone. </p>
    <div class="buy-windows-section">
        <div class="container">
            <div class="windows-details" data-aos="fade-up">
                <div class="windows-data">
                    <h2 class="common-title">Don't Think, buy!</h2>
                    <div class="data">
                        Alukun's selection of Windows and Doors make the best first impression. Add character and style to your home using your choice of modern or traditional windows and doors. Don't let your budget become a barrier to achieving your dream home. Alukun caters to Low, Medium, and High budget clients by using manufacturers from all over Europe. 
                    </div>
                    <div class="data">
                        The home construction and remodelling industry is changing. People are not only focused on Energy saving, but they are focused on investing their resources wisely. AluKun offers you, as the buyer in charge, a range of selection in windows and doors to fit your needs. With significant technological advancements, we offer you several PVC and Aluminum windows and doors for your home. Our handpicked manufacturers are leaders and pioneers in the world of secure, durable, and reliable systems.
                    </div>
                    <div class="data">
                        Our windows and doors will bring any home or business to life, from innovative Refined sashes to our range of high-quality composite security entrance doors. Our goal is to inspire homeowners to find the products that suit their needs. Products are manufactured and designed to meet the high standards and security that homeowners nowadays expect for their homes.
                    </div>
                    <h2>Glazing</h2>
                    <div class="data">
                        The glassing used in Windows, Balcony doors and Terras doors are from one of Europe’s leading glass manufacturers. In order to provide our clients with the best quality possible, AluKun uses architectural glass assortment in: flat glass, patterned glass, laminated glass and coated glass. The technical data is according to: Daylight Properties (EN 410), Solar Energy Properties (EN 410), Thermal Conductivity (EN 673) and Sound Insulation Value (EN 12758).
                    </div>
                    <div class="data">
                        Clients who do not find what they are looking for can feel free to send in a request. Perhaps a particular door model, colour, lock system? The answer is just one question away.
                    </div>
                </div>
                <div class="windows-type">
                    <div class="window" data-aos="fade-up">
                        <div class="image">
                            <img src="<?= Url::home(true); ?>theme/images/winter-garden-01.png">
                        </div>
                        <div class="data">
                            <h4 class="name">Wintergarden</h4>
                            <!--<div class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero velit</div>-->
                            <a class="link" href="#">know more</a>
                        </div>
                    </div>
                    <div class="window" data-aos="fade-up">
                        <div class="image">
                            <img src="<?= Url::home(true); ?>theme/images/roller-shutter-door.png">
                        </div>
                        <div class="data">
                            <h4 class="name">Roller Shutter</h4>
                            <!--<div class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero velit</div>-->
                            <a class="link" href="#">know more</a>
                        </div>
                    </div>
                    <div class="window" data-aos="fade-up">
                        <div class="image">
                            <img src="<?= Url::home(true); ?>theme/images/open-window.svg">
                        </div>
                        <div class="data">
                            <h4 class="name">Extra</h4>
                            <!--<div class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero velit</div>-->
                            <a class="link" href="#">know more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="want-tab-section">
        <div class="container">
            <div class="title-section">
                <h2 class="common-title" data-aos="fade-up">Enjoy Online Purchasing Now!</h2>
                <div class="description" data-aos="fade-up">
                    <p>Purchasing home improvement items online can be daunting. However, it can save you a lot of time and money for your project. Purchase now at your convenience while enjoying better prices and variety. This way you will have more control over delivery. Enjoy the process of not having crowds or pressure. To facilitate this process, AluKun has made online purchasing a 5 - step ordering process.</p>
                </div>
            </div>
            <div class="tab-section">
                <ul class="nav nav-tabs" role="tablist" data-aos="fade-up">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab"><span class="Number">1</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span class="Number">2</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><span class="Number">3</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"><span class="Number">4</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab"><span class="Number">5</span></a>
                    </li>
                </ul><!-- Tab panes -->
                <div class="tab-content" data-aos="fade-up">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="tab-data">
                            <div class="image">
                                <img src="<?= Url::home(true); ?>theme/images/Select.webp" alt="image">
                            </div>
                            <div class="description">
                                <h2 class="common-title">Selection</h2>
                                <div class="detail">
                                    People intend to focus more on the character of their homes represented by their front doors. However, interior doors are just as important. Internal doors can often be a let-down to the overall finish. But, it certainly does not always have to be that way. AluKun offers several refined and aesthetically appealing interior doors to meet your acquired taste. Complement your front door with sophisticated interior doors.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="tab-data">
                            <div class="image">
                                <img src="<?= Url::home(true); ?>theme/images/cart.webp" alt="image">
                            </div>
                            <div class="description">
                                <h2 class="common-title">Address</h2>
                                <div class="detail">
                                    Fill in the delivery address
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                        <div class="tab-data">
                            <div class="image">
                                <img src="<?= Url::home(true); ?>theme/images/packing.webp" alt="image">
                            </div>
                            <div class="description">
                                <h2 class="common-title">Terms and Conditions</h2>
                                <div class="detail">
                                    Agree to terms and conditions
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-4" role="tabpanel">
                        <div class="tab-data">
                            <div class="image">
                                <img src="<?= Url::home(true); ?>theme/images/payment.webp" alt="image">
                            </div>
                            <div class="description">
                                <h2 class="common-title">Payment</h2>
                                <div class="detail">
                                    Complete payment
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-5" role="tabpanel">
                        <div class="tab-data">
                            <div class="image">
                                <img src="<?= Url::home(true); ?>theme/images/shipping.webp" alt="image">
                            </div>
                            <div class="description">
                                <h2 class="common-title">Shipment</h2>
                                <div class="detail">
                                    Await shipment
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="config-btn" data-aos="fade-up">
                    <a href="<?= Url::to(['//dconfig']); ?>" class="common-button">Configure Here</a>
                </div>
            </div>
        </div>
    </div>

    <div class="security-section">
        <div class="container">
            <div class="security-content">
                <div class="security-description">
                    <div class="data">
                        <h2 class="common-title" data-aos="fade-up">Pergolas for the ulimate outdoor living spaces</h2>
                        <div class="description" data-aos="fade-up">
                            If you are the type of person who enjoys outdoor living, owning a pergola might be your best investment. AluKun’s pergolas are more than a tangible item; they offer unique experiences. A pergola can easily be moved to one side with the push of a button. This gives you a completely open space above your terrace in no time. Allowing you to experience the ultimate outdoor feeling regardless of the weather. Pergola systems are perfectly resistant to various weather conditions and offer you shade on sunny days and shelter on rainy days. In other words, they offer protection against the sun, snow, wind, rain, and other elements. This ensures you an extraordinary quality of outdoor living. The design of the panels is developed using the latest in technology. You can choose which pergola systems fit your needs the best with the choice between; tilt pergola system and retracting system. It’s all about your acquired taste! Don’t wait any longer; owning your first pergola system is at the click of a button.
                        </div>
                    </div>
                    <img src="<?= Url::home(true); ?>theme/images/Pergola.jpeg" alt="banner-image" data-aos="fade-up">
                </div>
            </div>
            <div class="type-security">
                <div class="type-content">
                    <h2 class="common-title" data-aos="fade-up">Fire Resistent Door</h2>
                    <div class="description" data-aos="fade-up">
                        <p>Are you shopping for your business or on the search for a new fire-resistant door? We offer nothing but this best from the leading manufacturer. The KALE EI2 90 - E 120 fire door may be just what you are looking for.</p>

                        <p>KALE EI2 90 - E 120 FİRE-DOOR TECHNİCAL SPECIFICATION</p>

                        LEAF:
                        <ul>
                            <li>The wing plate is 65mm thick with a thickness of 0,90 mm on both surfaces.</li>
                            <li>Double-layer special fire-resistant sealant and 150 kg / m³ density stone wool are used.</li>
                            <li>There are two fixed safety shafts to prevent mechanical stresses.</li>
                        </ul>

                        GENERAL FEATURES:
                        <ul>
                            <li> All doors are double sealed and have an outside dust seal and hot smoke seal inside.</li>
                            <li> Hot smoke seal expands at 75 degrees and provides sealing.</li>
                            <li>In the exterior doors, all ball joints are made of galvanised, interior doors are made of galvanised, and frame sheets are made of CCRS 1110 quality steel sheets.</li>
                            <li>Door surface is covered with electrostatic powder paint.</li>
                            <li>Thermal expansion gaps max. 5mm.</li>
                            <li>Two-piece adjustable door frame details.</li>
                            <li>Possibility of selection with a panic bar or door handle.</li>
                            <li>Standard color Ral 7035.</li>
                        </ul>
                        <p>Accredited EFECTIS has been tested and certified according to TS EN 1634-1: 2014 standard in ERA laboratories.</p>
                        <a href="javascript:void(0);" class="readmore-link"></a>
                    </div>
                    <img src="<?= Url::home(true); ?>theme/images/firedoor.jpg" alt="image" data-aos="fade-up">
                </div>
                <div class="type-content">
                    <h2 class="common-title" data-aos="fade-up">Seeing you happy in our goal!</h2>
                    <div class="description" data-aos="fade-up">
                        At AluKun, you are not just a number. You are our priority! Our goal is to make your next home, our business project, an enjoyable experience. Our sales representatives are readily available to meet your needs and answer your specific questions.
                        <a href="javascript:void(0);" class="readmore-link"></a>
                    </div>
                    <img src="<?= Url::home(true); ?>theme/images/girloncall.jpg" alt="image" data-aos="fade-up">
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-section">
        <div class="container">
            <h2 class="common-title" data-aos="fade-up">Our Customer Says</h2>
            <div class="testimonial-slider" data-aos="fade-up">
                <?php foreach ($testi as $t) {
                    $star = '';
                    $s = '<i class="fa fa-star" style="color:#ffc107;"></i>';
                    for ($i = 0; $i < $t->star; $i++) {
                        $star .= $s;
                    }
                ?>
                    <div class="testimonial-data">
                        <div class="testimonial-item">
                            <div class="image">
                                <img src="<?= yii::$app->lib->img($t->img); ?>" alt="image">
                            </div>
                            <div class="details" data-animation-in="fadeInUp">
                                <div class="data"><?= $t->text ?></div>
                                <div class="name">- <?= $t->name; ?></div>
                                <div class="name"><?= $star ?></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="gallery-section">
        <div class="container">
            <h2 class="common-title" data-aos="fade-up">Our Gallery</h2>
            <div class="gallery-slider" data-aos="fade-up">
                <?php
                foreach ($gallery as $g) {
                ?>
                    <div class="gallery-item">
                        <a data-caption="" data-fancybox="images" href="<?= Yii::$app->lib->img($g->id); ?>">
                            <img src="<?= Yii::$app->lib->img($g->id); ?>" alt="" class="img-fluid"></a>
                        <img class="zoom" src="<?= Url::home(true); ?>theme/images/zoom-in.svg">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="features-section">
        <div class="container">
            <div class="features-list" data-aos="fade-up">
                <div class="features-item">
                    <div class="features-data">
                        <div class="icon">
                            <img src="<?= Url::home(true); ?>theme/images/transport.png">
                        </div>
                        <div class="details">
                            <div class="sub-name">Fast</div>
                            <div class="name">Delivery</div>
                            <a class="link common-button" href="<?= Url::to(['//delivery']); ?>">more info</a>
                        </div>
                    </div>
                </div>
                <div class="features-item">
                    <div class="features-data">
                        <div class="icon">
                            <img src="<?= Url::home(true); ?>theme/images/portrait-call-center-agent.jpg">
                        </div>
                        <div class="details">
                            <div class="sub-name">Always Good</div>
                            <div class="name">To Advidse</div>
                            <a class="link common-button" href="<?= Url::to(['//comingsoon']); ?>">more info</a>
                        </div>
                    </div>
                </div>
                <div class="features-item">
                    <div class="features-data">
                        <div class="icon">
                            <img src="<?= Url::home(true); ?>theme/images/Made in Europe.png">
                        </div>
                        <div class="details">
                            <div class="sub-name">Made In</div>
                            <div class="name">Europe</div>
                            <a class="link common-button" href="<?= Url::to(['//comingsoon']); ?>">more info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>