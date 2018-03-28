<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form class="contact2-form login-form" method="POST">
                <span class="contact2-form-title">
                    <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
                         style="max-width: 10%; border-right: 1px solid #000; padding-right: 5px;">
                    Submissão
                    <h6>Logo IMC</h6>
                </span>

                <?php
                if ($registro) {
                    if ($cpfExistente) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Um aluno com esse CPF ou matrícula já foi cadastrado!
                        </div>
                        <?php
                    } else {
                        if ($cadastroSucesso) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                Cadastro realizado com sucesso!
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Houve um erro ao cadastrar!
                            </div>
                            <?php
                        }
                    }
                }
                ?>

                <div class="wrap-input2 validate-input" data-validate="A matrícula é necessária">
                    <input class="input2" type="number" value="<?php echo $cpfExistente['matricula'] ?>"
                           name="matricula">
                    <span class="focus-input2" data-placeholder="MATRICULA"></span>
                </div>

                <div class="wrap-input2 validate-input" data-validate="A senha é necessária">
                    <input class="input2" type="password" value="<?php echo $cpfExistente['nome'] ?>" name="password">
                    <span class="focus-input2" data-placeholder="SENHA"></span>
                </div>


                <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <button class="contact2-form-btn">
                            LOGIN
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>