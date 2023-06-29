$(document).ready(function() {
    $('#password-lock').click(function() {
        if ($('#password').attr('type') === 'password') {
            $('#password').attr('type', 'text');
            $(this).attr('class', 'fa-regular fa-eye');
            $('#password').attr('placeholder', 'Jeanne220+Vampire');
        } else {
            $('#password').attr('type', 'password');
            $(this).attr('class', 'fa-regular fa-eye-slash');
            $('#password').attr('placeholder', '*****************');
        }
    });

    $('#do-later').change(function() {
        var elementIds = ['#cc-number', '#cc-cvv', '#cc-expire'];
        const elementPlace = ['1234 5678 9012 3456', '123', '2020 / 02'];
        if ($(this).is(':checked')) {
            elementIds.forEach(function(elementId) {
                $(elementId).prop('disabled', true);
                $(elementId).val('');
                $(elementId).prop('placeholder', '');
            });
        } else {
            var i = 0;
            elementIds.forEach(function(elementId) {
                $(elementId).prop('disabled', false);
                $(elementId).val('');
                $(elementId).prop('placeholder', elementPlace[i]);
                i++;
            });
        }
    });

    function creditCardMask() {
        var num = $(this).val().replace(/\D/g, '');
        var formattedNum = '';
        const chunkSize = 4;

        for (var i = 0; i < num.length; i += chunkSize) {
            var chunk = num.substring(i, i + chunkSize);
            formattedNum += chunk + ' ';
        }

        $(this).val(formattedNum.trim());

        if (num.length > 12) {
            $(this).prop('maxlength', 19);
            $(this).val($(this).val().slice(0, 19));
        } else {
            $(this).prop('maxlength', 16); 
        }

    } $('#cc-number').keyup(creditCardMask);

    $('#cc-cvv').on('input', function() {
        var cvv = $(this).val().trim();
        
        if (cvv.length > 3) {
            $(this).val(cvv.slice(0, 3));
    }
    });

    function expireDateMask() {
        var date = $(this).val().replace(/\D/g, '');
        var formattedDate = '';
        const delimiter = ' / ';
        const year = date.substring(0, 4);
        const month = date.substring(4, 6);

        if (year) {
            formattedDate += year;
            if (year.length === 4) {
                formattedDate += delimiter;
            }
        }

        if (month) {
            formattedDate += month;
            if (month.length === 2) {
                formattedDate += '';
            }
        }

        $(this).val(formattedDate);
        
        if (date.length > 3) {
            $(this).prop('maxlength', 9);
            $(this).val(date.slice(0, 6));
            $(this).val(year + delimiter + month)
        } else {
            $(this).prop('maxlength', 6);
        }

    } $('#cc-expire').keyup(expireDateMask);


    $('#email').on('input', function() {
        var email = $(this).val();
        if (email == '') {
            $('.form-email-warning').css('display', 'none');
        } else {
            var pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
            if (!pattern.test(email)) {
                $('.form-email-warning').css('display', 'block');
            } else {
                $('.form-email-warning').css('display', 'none');
            }
        }
    });

    $('#password').on('input', function() {
        var password = $(this).val();
        if (password == '') {
            $('.form-password-warning').css('display', 'none');
        } else {
            var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()_=\-+[\]{}"\\|';:,.\/<>?])[A-Za-z\d~!@#$%^&*()_=\-+[\]{}"\\|';:,.\/<>?]{8,}$/;
            if (!pattern.test(password)) {
                $('.form-password-warning').css('display', 'block');
            } else {
                $('.form-password-warning').css('display', 'none');
            }
        }
    });

    $('#showToastBtn').click(function() {
        showCustomToast();
    });
    
    function showCustomToast() {
        var toast = $('#toasted');
        toast.addClass('show-toast');
      
        setTimeout(function() {
            toast.addClass('fade-out-toast');
            setTimeout(function() {
                toast.removeClass('show-toast');
                toast.removeClass('fade-out-toast');
            }, 1000);
        }, 1500);
    }
});