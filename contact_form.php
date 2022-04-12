
    <div class="container trenner_contact" style="background: linear-gradient(rgba(0, 0, 0, 0.8),rgba(0, 0, 0, 0.8)), url('<?php echo get_stylesheet_directory_uri(); ?>/images/bg_contact.png') center;">
      <div class="row content">
        <div class="title">
          <h2>
            <?php
              if(isset($contact_title)){
                echo $contact_title;
              }
              else{
                echo "Jetzt kostenlos beraten:";
              }
            ?>
          </h2>
        </div>
        <div class="description"><p>Fragen kostet nichts! Zögere nicht, das Kontaktformular zu benutzen oder mir eine Mail zu schreiben:<br><br>
          <a href="mailto:DIRECTOR - DOP - FILMMAKER
?subject=Kontakt über Webseite"><?php echo get_option('contact_email'); ?></a></p></div>
          
        <div class="contact_name"><?php echo get_option('contact_name'); ?></div>
        <div class="contact_title">DIRECTOR - DOP - FILMMAKER
</div>    
      </div>

      <div class="row contact_form">
        <form id="contact-form" method="post" action="contact_send.php" role="form" novalidate="true">

          <div class="messages"></div>

          <div class="controls">

            <div class="form_names">

              <div class="form-group">
                <label for="form_name">Vorname *</label>
                <input id="form_name" type="text" name="name" class="form-control" placeholder="Max" required="required" data-error="Firstname is required.">
                <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
                <label for="form_lastname">Nachname *</label>
                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Mustermann" required="required" data-error="Lastname is required.">
                <div class="help-block with-errors"></div>
              </div>

            </div>

            <div class="form_contacts">

              <div class="form-group">
                <label for="form_email">Email *</label>
                <input id="form_email" type="email" name="email" class="form-control" placeholder="max@provider.de" required="required" data-error="Valid email is required.">
                <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
                <label for="form_phone">Telefon</label>
                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="0123 456 798 0">
                <div class="help-block with-errors"></div>
              </div>

            </div>

            <div class="row">
              <div class="form-group">
                <label for="form_message">Nachricht *</label>
                <textarea id="form_message" name="message" class="form-control" placeholder="Sehr geehrte Damen und Herren, ..." rows="5" required="required" data-error="Please,leave us a message."></textarea>
                <div class="help-block with-errors"></div>
              </div>
            </div>






            <div class="row form_checkboxes form-group">

              <div class="checkbox_datenschutz"><input class="form_checkbox" type="checkbox" id="datenschutz" name="datenschutz" required="required" data-error="Bitte Datenschutz akzeptieren">
                <label for="datenschutz">Ich erkläre mich mit der Datenspeicherung und -bearbeitung für meine Anfrage einverstanden und möchte von Ihnen kontaktiert werden. Informationen zum Datenschutz und Ihrem rWiderrufsrecht finden Sie <a href="datenschutz.php">hier</a>.</label>*
                
                <div class="help-block with-errors"></div>

              </div>


              <div class="g-recaptcha" data-sitekey="6LfcSroZAAAAAGy-_-cLKlIus4rvIdQ4PdU7y_Za">
                
              </div>
            
            </div>               

            <div class="row">
              <button type="submit" class="btn btn-send btn-block disabled" value="Send message">Absenden</button>
            </div>

            <div class="row">
              <p class="text-muted"><strong>*</strong> Eingabe erforderlich.</p>
            </div>
          </div>

        </form>
      </div>  

    </div>

