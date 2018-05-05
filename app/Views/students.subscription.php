<div class="bg-contact2" style="background-image: url('<?php echo frontendPath(); ?>images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form class="contact2-form validate-form" method="POST">
                <span class="contact2-form-title">
                    <img src="<?php echo frontendPath(); ?>images/efei.gif" alt="UNIFEI"
                         style="max-width: 10%; border-right: 1px solid #000; padding-right: 5px;">
                    Inscrições
                    <h6>Curso de design de logotipos</h6>
                    <h6>Inscrições até 2 maio</h6>
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

                if ($retaFinal) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Corra, restam menos de 10 vagas!
                    </div>
                    <?php
                }

                if (!$finalizado) {
                    ?>

                    <div class="wrap-input2 validate-input" data-validate="A matrícula é necessária">
                        <input class="input2" type="number" value="<?php echo $cpfExistente['matricula'] ?>"
                               name="matricula">
                        <span class="focus-input2" data-placeholder="MATRICULA"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="O nome é necessário">
                        <input class="input2" type="text" value="<?php echo $cpfExistente['nome'] ?>" name="nome">
                        <span class="focus-input2" data-placeholder="NOME"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Um email válido é necessário">
                        <input class="input2" type="text" value="<?php echo $cpfExistente['email'] ?>" name="email">
                        <span class="focus-input2" data-placeholder="EMAIL"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="O seu curso é necessário"
                         style="border-bottom: none!important;">
                        <select class="custom-select" name="curso">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($courses as $course) {
                                if ($course['csId'] == $cpfExistente['curso'])
                                    echo '<option value="' . $course['csId'] . '" SELECTED>' . $course['csDescricao'] . '</option>';
                                else
                                    echo '<option value="' . $course['csId'] . '" >' . $course['csDescricao'] . '</option>';
                            }
                            ?>
                        </select>
                        <span class="focus-input2" data-placeholder="CURSO" style="margin-top: -15px"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Um CPF válido é necessário">
                        <input class="input2" type="text" value="<?php echo $cpfExistente['cpf'] ?>" name="cpf">
                        <span class="focus-input2" data-placeholder="CPF"></span>
                    </div>

                    <div class="wrap-input2 validate-input"
                         data-validate="Para continuar, ceda os direitos de uso ao IMC"
                         style="border-bottom: 0!important;">
                        <input type="checkbox">
                        Concordo em ceder os direitos autorais do logotipo ao Instituto de Matemática e Computação
                    </div>

                    <div class="container-contact2-form-btn">
                        <div class="wrap-contact2-form-btn">
                            <div class="contact2-form-bgbtn"></div>
                            <button class="contact2-form-btn">
                                CADASTRAR
                            </button>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <h3 style="text-align: center;">Obrigado, inscrições finalizadas!</h3>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>