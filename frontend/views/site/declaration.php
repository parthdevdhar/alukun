<?php

use yii\helpers\Url;

$this->title = 'Declaration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-body contact-page web-page">
    <div class="title-section">
        <div class="container">
            <h2 class="common-title">Declaration Of Performance</h2>
        </div>
    </div>
    <div class="container">
        <div class="contact-details" data-aos="fade-up">
            Want to know how your desired product performs? We are proud of your curiosity! Kindly enter
            your information in the form fields and press submit. You will receive your declaration of
            performance ASAP.
        </div>
        <div class="contact-data-section" data-aos="fade-up">
            <div class="contact-data">
                <div class="contact-form" style="width: 100%;">

                    <form class="form" action="#">
                        <div class="form-field">
                            <label for="fname">name:</label><br>
                            <input type="text" id="fname" name="fname" value="">
                        </div>
                        <div class="form-field">
                            <label for="email">Email id:</label><br>
                            <input type="text" id="email" name="email" value="">
                        </div>
                        <div class="form-field">
                            <label for="order">Order-Id:</label><br>
                            <input type="text" id="order" name="text" value="">
                        </div>
                        <div class="form-field">
                            <label for="phone-no">Phone No:</label><br>
                            <input type="text" id="phone-no" name="phone-no" value="">
                        </div>
                        <div class="form-field textarea-field">
                            <label for="phone-no">Question</label><br>
                            <textarea rows="4" name="comment">Enter text here...</textarea>
                        </div>
                        <div class="form-field textarea-field">
                            <input type="checkbox" id="agree" name="agree" value="agree">
                            <label for="agree"> I agree; by filling in this form with my contact details and clicking this box, my contact
                                details and assignment for any further inquiries will be stored permanently. </label>
                        </div>
                        <div class="form-field textarea-field" >Note: This content can be withdrawn at any time by sending an e-mail to info@alukun.com</div>
                        <br>
                        <div class="form-field">
                            <button class="common-button" type="submit" form="form1" value="Submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>