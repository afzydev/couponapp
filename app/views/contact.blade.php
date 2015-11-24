@extends('layouts.main')
@section('pageTitle')
{{$pageTitle}}
@stop

@section('content')
    <!-- //////////////////////////////////
//////////////PAGE CONTENT///////////// 
////////////////////////////////////-->

    <div class="container">
        <div class="row row-wrap">
            
            <div class="span9">
                <form name="contactForm" id="contact-form" class="contact-form" method="post" action="http://remtsoy.com/tf_templates/koupon/includes/mail/index.html">
                    <fieldset>
                        <div class="row-fluid">
                            <label>Name</label>
                            <div class="alert form-alert" id="form-alert-name">Please enter your name</div>
                            <input class="span12" id="name" type="text" placeholder="Enter Your name here" />
                        </div>
                        <div class="row-fluid">
                            <label>Email</label>
                            <div class="alert form-alert" id="form-alert-email">Please enter your valid E-mail</div>
                            <input class="span12" id="email" type="text" placeholder="You E-mail Address" />
                        </div>
                        <div class="row-fluid">
                            <label>Message</label>
                            <div class="alert form-alert" id="form-alert-message">Please enter message</div>
                            <textarea class="span12" id="message" placeholder="Your message"></textarea>
                        </div>
                        <div class="alert alert-success form-alert" id="form-success">Your message has been sent successfully!</div>
                        <div class="alert alert-error form-alert" id="form-fail">Sorry, error occured this time sending your message</div>
                        <button id="send-message" type="submit" class="btn btn-primary">Send Message</button>
                    </fieldset>
                </form>
            </div>
            <div class="span3">
                <h5>Contact Info</h5>
                <p>Nisl eu nisl euismod tristique odio tellus ridiculus litora tempor vulputate natoque tellus pretium fringilla cum egestas in pretium lorem</p>
                <ul class="list">
                    <li><i class="icon-map-marker"></i> Location: Mountain View, CA 94043</li>
                    <li><i class="icon-phone"></i> Phone: 555-555-555</li>
                    <li><i class="icon-envelope"></i> E-mail: <a href="#">mail@domain.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="gap gap-small"></div>
    </div>


    <!-- //////////////////////////////////
//////////////END PAGE CONTENT///////// 
////////////////////////////////////-->
@stop
