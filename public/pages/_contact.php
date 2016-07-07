<?php

error_reporting(0);

$sent = 0;

$name      = $_POST['full_name'];
$email     = $_POST['email'];
$subject   = join(', ', $_POST['subject']);
$telephone = $_POST['telephone'];
$message   = $_POST['message'];

if ($name != null && $email !== null && $subject !== null && $message !== null)
{
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    $sent = mail('kaihoffmanjazz@gmail.com', "Email from kaihoffman.co.uk: $subject", "Name: $name, Telephone: $telephone\n\nMessage:\n$message", $headers);
}

?>
<div class="hero-box--contact">
    <div class="hero-box--contact__text">
        <div class="container">
            For Kai Hoffman bookings, press and teaching enquiries, <br>
            please contact:
            <a href="mailto:broadreachrecords@gmail.com?subject=Kai Hoffman">Broad&nbsp;Reach&nbsp;Records</a> <br>
            <i class="fa fa-phone"></i> Tel. +44(0)7793 611231.
        </div>
    </div>
</div>

<div class="contact-form">
    <main class="container">

        <h2>Contact Form</h2>

        <?php if ($sent === false) { ?>
            <div class="row">
                <div class="col s12 l10">
                    <div class="card-panel red darken-2">
                        <span class="white-text">The has been an error sending your email. Please try again later.</span>
                    </div>
                </div>
            </div>
        <?php } else if ($sent === true) { ?>
            <div class="row">
                <div class="col s12">
                    Thank you. Your email has been sent.
                </div>
            </div>
        <?php }
        if ($sent === 0 || $sent === false) { ?>
            <p>Use this handy form to contact Kai's agent and Kai:</p>

            <div class="row">
                <form action="/pages/contact" method="post" class="col s12 l10">
                    <div class="row">
                        <div class="input-field col s12 m4 l5">
                            <input id="full_name" name="full_name" type="text" class="validate" value="<?php echo $name; ?>" required>
                            <label for="full_name">Full Name*</label>
                        </div>
                        <div class="input-field col s12 m4 l5">
                            <input id="email" name="email" type="email" class="validate" value="<?php echo $email; ?>"  required>
                            <label for="email">Email address*</label>
                        </div>
                        <div class="input-field col s12 m4 l2">
                            <input id="telephone" name="telephone" type="text" value="<?php echo $telephone; ?>">
                            <label for="telephone">Telephone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select id="subject" name="subject[]"  class="validate" multiple required>
                                <option value="" disabled <?php  echo $subject != null ? 'selected' : '';?>>Choose your subject</option>
                                <option value="General Enquiries" <?php  echo strpos($subject, "General") !== false ? 'selected' : '';?>>General Enquiries</option>
                                <option value="Bookings" <?php  echo strpos($subject, "Bookings") !== false ? 'selected' : '';?>>Bookings</option>
                                <option value="News and Press Relations" <?php  echo strpos($subject, "News") !== false ? 'selected' : '';?>>News and Press Relations</option>
                                <option value="Performance Schedule" <?php  echo strpos($subject, "Performance") !== false ? 'selected' : '';?>>Performance Schedule</option>
                            </select>
                            <label>Subject*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="message" name="message" class="materialize-textarea" required><?php echo $message; ?></textarea>
                            <label for="message">Message:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4"><i>* = required</i></div>
                        <div class="col s12 m8 right-align contact-btns">
                            <input type="reset" value="Clear Form" class="waves-effect waves-light btn">
                            <input type="submit" value="Send Email" class="waves-effect waves-light btn">
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </main>
</div>
