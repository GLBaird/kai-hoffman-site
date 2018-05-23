<div class="hero-box--gigs">
    <div class="row">
        <div class="col m6 quote-text">
            <i class="fa fa-quote-left superscript-left"></i>
            <span style="font-size: 2em">There is no denying that Hoffman has a very special voice: rich, super smooth and full of old time sparkle... It is a joy to listen to&nbsp;her&nbsp;sing.</span>
            <i class="fa fa-quote-right superscript-right"></i> <br>
            <i>BROADWAY BABY</i>
        </div>
    </div>
</div>
<main class="container">
    <h2>Gigs <?php echo date("Y"); ?></h2>
    <p>Here is a summary of Kai's shows in various guises - from duo to six-piece Kombo, cabaret and concerts.</p>
    <div class="row">
        <div class="col s12 l5 hide-on-med-and-down gig-side-image">

        </div>
        <div class="col s12 l7">
            <ul class="collection gig-list">
            <?php $gigs = $pageData['list'];
            foreach ($gigs as $gig) { ?>

                <li class="collection-item avatar gig-list-item">
                    <a href="<?php echo $gig['link'] ?>" target="_blank" title="More information" class="gig-list-item--link">
                        <img src="images/icon-<?php echo $gig['icon']; ?>.png" alt="place holder" class="circle <?php echo $gig['color']; ?>">
                        <span class="title"><?php echo $gig['venue']; ?></span>
                        <p><?php echo $gig['date']; ?> <br>
                            <?php echo $gig['time']; ?>
                        </p>
                        <a href="#map-modal" data-map='<?php echo $gig['mapRef']; ?>' class="secondary-content map-link waves-effect waves-light modal-trigger" title="View location in Google Maps">
                            <img src="/images/map-icon.png" alt="Google Maps" width="50px">
                        </a>
                    </a>
                </li>

            <?php } ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l4">
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/OZK65xRDr30?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <p>The luckiest girl alive album show-reel - Kai Hoffman Kombo</p>
        </div>
        <div class="col s12 l4">
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/H1y4Ym7bLrg?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <p>Do it while you can showreel - Kai Hoffman Quartet</p>
        </div>
        <div class="col s12 l4">
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/CBUZkUwVl50?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <p>Thank You Ella show-reel - Kai Hoffman Trio </p>
        </div>
    </div>
</main>

<!-- Modal Structure -->
<div id="map-modal" class="modal">
    <div class="modal-content">
        <h4>Map Information</h4>
        <p id="map-area"></p>
    </div>
    <div class="modal-footer">
        <a href="javascript:" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
