(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input2').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })

    /*==================================================================
    [ MASKS ] */
    $('.validate-input input[name="cpf"]').mask("000.000.000-00");


    /*==================================================================
    [ Validate ]*/
    var matricula = $('input[name="matricula"]');
    var nome = $('.validate-input input[name="nome"]');
    var curso = $('select[name="curso"]');
    var cpf = $('.validate-input input[name="cpf"]');
    var email = $('.validate-input input[name="email"]');
    var password = $('input[name="password"]');

    matricula.keypress(function () {
        $(this).val(this.value.substring(0, 11));
    });
    matricula.change(function () {
        $(this).val(this.value.substring(0, 11));
    });
    /** LOGIN SECTION **/

    $('.login-form').on('submit', function (event) {
        var check = true;

        if (matricula.val().trim() == '') {
            showValidate(matricula);
            check = false;
        }

        if (password.val().trim().length <= 0) {
            showValidate(password);
            check = false;
        }

        if (!check)
            event.preventDefault();

    });


    $('.login-form .input2').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });


    $('.validate-form').on('submit', function () {
        var check = true;

        if (matricula.val().trim() == '') {
            showValidate(matricula);
            check = false;
        }

        if (nome.val().trim() == '') {
            showValidate(nome);
            check = false;
        }

        if (curso.val().trim() == '') {
            showValidate(curso);
            check = false;
        }

        if (cpf.val().trim().length != 14) {
            showValidate(cpf);
            check = false;
        }

        if (email.val().trim() == '' || email.val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check = false;
        }

        if (!check)
            event.preventDefault();
    });


    $('.validate-form .input2').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }


})(jQuery);