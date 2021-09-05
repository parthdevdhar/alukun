<?php

use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-body contact-page web-page">
    <div class="title-section">
        <div class="container">
            <h2 class="common-title">contact us</h2>
        </div>
    </div>
    <div class="container">
        <div class="contact-details" data-aos="fade-up">

        </div>
        <div class="contact-data-section" data-aos="fade-up">
            <div class="contact-data">
                <div class="contact-form">
                    <h3 class="form-title">let's connect</h3>
                    <div class="data">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    <form class="form" action="#">
                        <div class="form-field">
                            <label for="fname">First name:</label><br>
                            <input type="text" id="fname" name="fname" value="">
                        </div>
                        <div class="form-field">
                            <label for="lname">Last name:</label><br>
                            <input type="text" id="lname" name="lname" value="">
                        </div>
                        <div class="form-field">
                            <label for="email">Email id:</label><br>
                            <input type="text" id="email" name="email" value="">
                        </div>
                        <div class="form-field">
                            <label for="phone-no">Phone No:</label><br>
                            <input type="text" id="phone-no" name="phone-no" value="">
                        </div>
                        <div class="form-field textarea-field">
                            <label for="phone-no">comment</label><br>
                            <textarea rows="4" name="comment">Enter text here...</textarea>
                        </div>
                        <div class="form-field">
                            <input type="checkbox" id="agree" name="agree" value="agree">
                            <label for="agree"> I agree to the Terms and Conditions</label>
                        </div>
                        <div class="form-field">
                            <button class="common-button" type="submit" form="form1" value="Submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="contact-content">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2499.5148654541636!2d7.633542115759041!3d51.209590379587375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b949bbbe28f63f%3A0xc78dda5f244d5c5b!2sGartenstra%C3%9Fe%2049%2C%2058511%20L%C3%BCdenscheid%2C%20Germany!5e0!3m2!1sen!2sin!4v1601794989462!5m2!1sen!2sin" width="290" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.783730508273!2d8.427679915298526!3d49.996664027839415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd9ed6c0eb6827%3A0xd5aa78cbca757641!2sDanziger%20Str.%203%2C%2065428%20R%C3%BCsselsheim%20am%20Main%2C%20Germany!5e0!3m2!1sen!2sin!4v1621354515009!5m2!1sen!2sin" width="290" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <div class="details">
                        <div class="location contact-details-data">
                            <h4 class="contact-title"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20" height="20" fill="#fff" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path d="M256,0C156.011,0,74.667,81.344,74.667,181.333c0,96.725,165.781,317.099,172.843,326.443    c1.984,2.667,5.163,4.224,8.491,4.224c3.328,0,6.507-1.557,8.491-4.224c7.061-9.344,172.843-229.717,172.843-326.443    C437.333,81.344,355.989,0,256,0z M256,277.333c-52.928,0-96-43.072-96-96c0-52.928,43.072-96,96-96s96,43.072,96,96    C352,234.261,308.928,277.333,256,277.333z"></path>
                                </svg></h4>
                            <div class="contact-data">
                                <div class="link">Danziger Str. 3, 65428 &nbsp;</div><br>
                                <div class="link">Rüsselsheim am Main</div>
                            </div>
                        </div>
                        <div class="call-details">
                            <div class="phone contact-details-data">
                                <h4 class="contact-title"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20" height="20" fill="#fff" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                        <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594    c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448    c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813    C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"></path>
                                    </svg></h4>
                                <a href="tel:061316366781" class="contact-data link">06131-6366781</a>
                            </div>
                        </div>
                        <div class="email contact-details-data">
                            <h4 class="contact-title"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20" height="20" fill="#fff">
                                    <polygon points="339.392,258.624 512,367.744 512,144.896   "></polygon>
                                    <polygon points="0,144.896 0,367.744 172.608,258.624   "></polygon>
                                    <path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"></path>
                                    <path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"></path>
                                </svg></h4>
                            <div class="contact-data">
                                <a href="mailto:info@alukun.com" class="link">info@alukun.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>