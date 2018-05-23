<?php
if (!empty($_SESSION['servidor'])) {
    ?>
    <span class="contact2-form-title" style="padding-bottom: 0!important;">
        <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
             style="max-width: 6%; border-right: 1px solid #000; padding-right: 5px;">
        Votação
        <h6>Logo IMC</h6>
    </span>
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <?php
            if ($votou) {
                echo '<div class=\'alert alert-warning\' role=\'alert\'>
                        <h4>Você já votou, obrigado pela participação!</h4>
                      </div>';
            }
            ?>
        </div>
    </div>

    <div class="tz-gallery">
        <div class="row">
            <?php
            echo listLogos($alunos, $votou);
            ?>
        </div>
    </div>

    <?php
} else {
    ?>
    <br>
    <span class="contact2-form-title" style="padding-bottom: 0!important;">
        <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
             style="max-width: 6%; border-right: 1px solid #000; padding-right: 5px;">
        Votação
        <h6>Logo IMC</h6>
    </span>

    <?php
    if ($msg) {
        echo '<div class=\'alert alert-success\' role=\'alert\' style="text-align: center;">
                <h4>' . $msg . '</h4>
              </div>';
    }
    ?>

    <div class="tz-gallery">
        <div class="row">
            <form action="vote" method="POST"
                  onsubmit="if ($('input[name=\'ciap\']').val() === '' || $('input[name=\'nome\']').val() === '' ) { event.preventDefault(); alert('Preencha todos os campos!'); return false; }">
                <div class="col-md-12 form-group">
                    <input type="number" name="usuario" placeholder="SIAPE" class="form-control">
                </div>
                <div class="col-md-12 form-group">
                    <input type="password" name="password" placeholder="SENHA" class="form-control">
                </div>
                <div class="col-md-12" style="text-align: center;">
                    <button class="btn btn-primary" style="height: 40px; width: 130px;">VER LOGOS</button>
                </div>
            </form>
        </div>
    </div>
    <?php
}
?>
