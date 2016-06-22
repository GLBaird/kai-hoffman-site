<!-- MODAL UNDER CONSTRUCTION -->
<div id="construction" class="modal">
    <div class="modal-content">
        <h4>New Kai Hoffman Site</h4>
        <hr>
        <p>Welcome to my brand new site. Currently it is still under construction, and will be finished within the&nbsp;next&nbsp;few&nbsp;weeks.</p>
        <p>For now, enjoy my new home page and check back soon to see my exciting&nbsp;new&nbsp;content.</p>
        <p style="font-family: 'LasVegasOT-Fabulous', cursive; font-size: 3em; margin: 0 0 0 5%; line-height: 1em">&nbsp;Best wishes,<br>&nbsp;&nbsp;Kai</p>
    </div>
    <div class="modal-footer">
        <a href="javascript:$('#construction').closeModal()" class=" modal-action modal-close waves-effect waves-green btn-flat">Okay</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
//            $('#construction').openModal();
        }, 3000);
    });

    $('a[href="#"]').click(function(e){ e.preventDefault(); $('#construction').openModal(); });
</script>

<style scoped>
    #construction {
        background-image: url('images/blueprint.png');
        background-repeat: no-repeat;
        background-size: 150px;
        background-position: 98% 10%;
        background-color: white;
    }

    #construction .modal-content {
        margin-right: 180px;
    }

    @media screen and (max-width: 799px) {
        #construction {
            background-image: url('images/blueprint-fade.png');
            max-height: 90%;
        }

        #construction h4 {
            font-size: 1.2em;
        }

        #construction .modal-content {
            margin-right: inherit;
        }
    }
</style>
